<?php namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;

use App\API\API;
use App\API\Connectors\APIProduct;
use App\API\Connectors\APIUser;
use App\API\Connectors\APIConfig;
use Route, Session, Cache, Input, Redirect;

abstract class BaseController extends Controller
{
	protected $page_attributes;
	protected $errors;
	protected $take 				= 10;
	protected $token_public;
	protected $token_private;
	protected $color_chart;

	function __construct() 
	{
		$this->errors 				= new MessageBag();
		$this->page_attributes 		= new \Stdclass;

		$api_url 					= '/oauth/client/access_token';
		$api_data 					= 	[
											'grant_type'	=> 'client_credentials',
											'client_id'		=> env('CLIENT_ID'),
											'client_secret'	=> env('CLIENT_SECRET'),
										];
		$api 						= new API;
		$result 					= json_decode($api->post($api_url, $api_data),true);

		// Get success API token
		if ($result['status'] == "success")
		{
			Session::set('API_token_public', $result['data']['token']['token']);
			Session::set('API_token', $result['data']['token']['token']);
		}
		else
		{
			\App::abort(503);
		}

  		//generate balin information
  		$APIConfig 									= new APIConfig;
		
		$config 									= $APIConfig->getIndex([
														'search' 	=> 	[
																			'default'	=> 'true',
																		],
														'sort' 		=> 	[
																			'name'	=> 'asc',
																		],
														]);

		$balin 										= $config['data'];

		unset($balin['info']);
		foreach ($config['data']['info'] as $key => $value) 
		{
			$balin['info'][$value['type']]			= $value;
		}

		$this->balin 								= $balin;

		//base layout
		$this->layout 								= view('web_v2.page_templates.layout');

		//detect mobile or desktop
		$Mobile_Detect 								= new mobile_detect;
		if($Mobile_Detect->isMobile() == true || $Mobile_Detect->isTablet() == true)
		{
			$this->base_path_view 					= view('web_v2.mobile');
		}else{
			$this->base_path_view 					= view('web_v2.desktop');
		}
	}

	public function generateView()
  	{
  		//require
  		if (!isset($this->page_attributes->breadcrumb)){ $this->page_attributes->breadcrumb = []; }
  		if (!isset($this->page_attributes->title)){ $this->page_attributes->title = null; }
  		if (!isset($this->page_attributes->subtitle)){ $this->page_attributes->subtitle = null; }
  		if (!isset($this->page_attributes->data)){ $this->page_attributes->data = null; }
  		if (!isset($this->page_attributes->paginator)){$this->page_attributes->paginator = null;}
  		if (!isset($this->page_attributes->type_form)){$this->page_attributes->type_form = null;}
  		if (!isset($this->page_attributes->metas)){$this->page_attributes->metas = null;}
  		if (!isset($this->page_attributes->controller_name)){$this->page_attributes->controller_name = null;}

  		if (!Session::has('carts') || is_null(Session::get('carts')) || empty(Session::get('carts'))) 
  		{
  			if (!Session::has('whoami'))
  			{
  				$APIProduct 					= new APIProduct;
  				$recommend 						= $APIProduct->getIndex([
  														'search' 	=> 	[
  																			'name' 	=> Input::get('q'),
  																			'recommended' => 0,
  																		],
  														'sort' 		=> 	[
  																			'name'	=> 'asc',
  																		],
  														'take'		=> 2,
  														'skip'		=> '',
  													]);
  			}
  			else
  			{
  				Session::set('API_token', Session::get('API_token_private'));

				$APIProduct 					= new APIProduct;
				$recommend 						= $APIProduct->getIndex([
														'search' 	=> 	[
																			'name' 	=> Input::get('q'),
																			'recommended' => Session::get('whoami')['id'],
																		],
														'sort' 		=> 	[
																			'name'	=> 'asc',
																		],
														'take'		=> 2,
														'skip'		=> '',
													]);
  			}
  		}
  		else
  		{
  			$recommend 			= [];
  		}

  		$balin 					= $this->balin;
  		
		//paginator
  		$paging					= $this->page_attributes->paginator;

		//initialize view
		dd($this->base_path_view);
  		$this->layout 			= view($this->base_path_view . $this->page_attributes->source, compact('paging'))
									->with('breadcrumb', $this->page_attributes->breadcrumb)
									->with('page_title', $this->page_attributes->title)
									->with('page_subtitle', $this->page_attributes->subtitle)
									->with('data', $this->page_attributes->data)
									->with('balin', $balin)
									->with('recommend', $recommend)
									->with('metas', $this->page_attributes->metas)
									->with('controller_name', $this->page_attributes->controller_name)
									->with('type', $this->page_attributes->type_form)
									;

  		//optional data
  		if (isset($this->page_attributes->search))
  		{
  			$this->layout 		= $this->layout->with('searchResult', $this->page_attributes->search);
  		}

  		// return view
		return $this->layout;		
	}

	public function generateRedirectRoute($to = null, $parameter = null)
	{
		if (count($this->errors) == 0)
		{
			return Redirect::route($to, $parameter)
					->with('msg', $this->page_attributes->success)
					->with('msg-type', 'success');
		}
		else
		{
			return Redirect::back()
					->withInput(Input::all())
					->withErrors($this->errors)
					->with('type', isset($parameter['type']) ? $parameter['type'] : null );

		}
	}

	public function paginate($route = null, $count = null, $current = null)
	{
		//README
		//$route : route current page. $route = route('admin.product.index')
		//$count : number of data. $count = count($data)
		//$current : current page. $current = input::get($page)

		$this->page_attributes->paginator 			= new LengthAwarePaginator($count, $count, $this->take, $current);
	    $this->page_attributes->paginator->setPath($route);
	}

	public function getcolorchart()
	{
		$color_chart 			= file_get_contents('color_chart.txt');
		$lines					= explode(PHP_EOL, $color_chart);  

		foreach ($lines as $key => $value) 
		{
			$color 				= explode(',', $value);

			$this->color_chart[$color[0]] 	= str_replace('n', '\n', $color[1]);
		}

		return $this->color_chart;
	}
}
