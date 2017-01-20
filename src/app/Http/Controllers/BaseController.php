<?php namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\MessageBag;

use App\API\API;
use App\API\Connectors\APIProduct;
use App\API\Connectors\APIUser;
use App\API\Connectors\APIConfig;
use App\API\Connectors\APICategory;
use Route, Session, Cache, Input, Redirect, Carbon;

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
		set_time_limit(0);
		
		$this->errors 				= new MessageBag();
		$this->page_attributes 		= new \Stdclass;

		//1. Set access token
		$whoami 					= ['id' => 0];
		if(!Session::has('API_token') || Session::get('API_expired_token') < Carbon::now()->format('Y-m-d H:i:s'))
		{
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
				Session::set('API_expired_token', Carbon::parse('+ 90 minutes')->format('Y-m-d H:i:s'));
			}
			else
			{
				Session::flush();
				
				\App::abort(503);
			}

			if(Session::has('API_token_private'))
			{
				Session::flush();

				return Redirect::route('balin.get.login')->withErrors(['Waktu login Anda sudah expire, silahkan login lagi.']);
			}
		}
		elseif(Session::has('API_token_private'))
		{
			$whoami 				= ['id' => Session::get('whoami')['id']];
  			Session::set('API_token', Session::get('API_token_private'));
		}

		//2. Set base layout
		$this->layout 				= view('web_v2.page_templates.layout');

		$Mobile_Detect 				= new mobile_detect;
		if($Mobile_Detect->isMobile() == true && $Mobile_Detect->isTablet() == false)
		{
			$this->base_path_view 	= 'web_v2.mobile.';
		}
		else
		{
			$this->base_path_view 	= 'web_v2.desktop.';
		}

		//3. get balin value
		$this->balin 				= Cache::remember('config_balin', 20, function()
			{
				return $this->getBalin();
			});
		
		//4. get recommendation
		$this->recommend 			= Cache::remember('recommendation_'.http_build_query($whoami), 20, function()
			{
				return $this->getRecommendation();
			});

		//5. default metas
		$this->page_attributes->metas	= 	[
												'og:type' 			=> 'website', 
												'og:title' 			=> 'BALIN.ID', 
												'og:description' 	=> 'Fashionable and Modern Batik',
												'og:url' 			=> $this->balin['info']['url']['value'],
												'og:image' 			=> $this->balin['info']['logo']['value'],
												'og:site_name' 		=> 'balin.id',
												'fb:app_id' 		=> \Config::get('fb_app.id'),
											];
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
					->with('msg-type', 'danger')
					->with('type', isset($parameter['type']) ? $parameter['type'] : null );

		}
	}

	public function paginate($route = null, $count = null, $current = null)
	{
		//README
		//$route : route current page. $route = route('admin.product.index')
		//$count : number of data. $count = count($data)
		//$current : current page. $current = input::get($page)

		$this->page_attributes->paginator = new LengthAwarePaginator($count, $count, $this->take, $current);
	    $this->page_attributes->paginator->setPath($route);

	    // get item from to
	    $paginate 									= $this->page_attributes->paginator;
	    $paginate_item_from 						= ($paginate->currentPage()-1)*($paginate->perPage()+1);
	    $paginate_item_to 							= ($paginate->currentPage())*($paginate->perPage());

	    if ($paginate_item_from == 0)
	    {
	    	$paginate_item_from						= 1;
	    }

	    if ($paginate_item_to > $paginate->total())
	    {
	    	$paginate_item_to 						= $paginate->total();	
	    }
	    

	    return ['paginate_item_from' => $paginate_item_from, 'paginate_item_to' => $paginate_item_to, 'paging' => $paginate];
	}

	public function getRecommendation()
	{
		$user_id			= 0;
		if(Session::has('whoami'))
		{
			$user_id 		= Session::get('whoami')['id'];
		}
		
		$recommend 			= [];

		if (!Session::has('carts') || is_null(Session::get('carts')) || empty(Session::get('carts'))) 
  		{
  			$APIProduct 					= new APIProduct;
			$recommend 						= $APIProduct->getIndex([
													'search' 	=> 	[
																		'name' 	=> Input::get('q'),
																		'recommended' => $user_id,
																	],
													'sort' 		=> 	[
																		'name'	=> 'asc',
																	],
													'take'		=> 2,
													'skip'		=> '',
												]);
		}

		return $recommend;
	}

	public function getBalin()
	{
  		$APIConfig 								= new APIConfig;
		
		$config 								= $APIConfig->getIndex([
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

		return $balin;
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

	public function generateView()
  	{
  		if (!isset($this->page_attributes->type_form)){$this->page_attributes->type_form = null;}
  		
		//initialize view
  		$this->layout 			= view($this->base_path_view . $this->page_attributes->source)
									->with('breadcrumb', $this->page_attributes->breadcrumb)
									->with('page_title', $this->page_attributes->title)
									->with('page_subtitle', $this->page_attributes->subtitle)
									->with('data', $this->page_attributes->data)
									->with('balin', $this->balin)
									->with('recommend', $this->recommend)
									// ->with('category', $category['data']['data'])
									->with('metas', $this->page_attributes->metas)
									->with('type', $this->page_attributes->type_form)
									->with('veritrans_option', env('VERITRANS_OPTION', true))
									;
  		// return view
		return $this->layout;		
	}

}
