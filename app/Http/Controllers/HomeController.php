<?php namespace App\Http\Controllers;

use App\API\Connectors\APIProduct;
use Session, Config;

class HomeController extends BaseController 
{	
	protected $controller_name 						= 'home';

	function __construct()
	{
		parent::__construct();

		Session::set('API_token', Session::get('API_token_public'));

		$this->page_attributes->title 				= 'BALIN.ID';
		$this->page_attributes->source 				= 'home.';
		$this->page_attributes->breadcrumb			=	[];
		$this->take 								= 20;
	}

	/**
	 * display home
	 *
	 * @return view
	 */
	public function index()
	{
		//get data
		$APIProduct 							= new APIProduct;
		$datas['batik_wanita'] 					= $APIProduct->getIndex([
														'search' 	=> 	[
																			'recommended' => (Session::has('whoami') ? Session::get('whoami')['id'] : 0),
																			'tags' => ['wanita'],
																		],
														'sort' 		=> 	[
																			'name'	=> 'asc',
																		],
														'take'		=> 4,
														'skip'		=> '',
													]);

		$datas['batik_pria'] 					= $APIProduct->getIndex([
														'search' 	=> 	[
																			'recommended' => (Session::has('whoami') ? Session::get('whoami')['id'] : 0),
																			'tags' => ['pria'],
																		],
														'sort' 		=> 	[
																			'name'	=> 'asc',
																		],
														'take'		=> 4,
														'skip'		=> '',
													]);

		$datas['all'] 							= $APIProduct->getIndex([
														'search' 	=> 	[
																			'recommended' => (Session::has('whoami') ? Session::get('whoami')['id'] : 0),
																		],
														'take'		=> 4,
														'skip'		=> 0,
													]);		

		$this->page_attributes->metas 			= 	[
														'og:type' 			=> 'website', 
														'og:title' 			=> 'BALIN.ID', 
														'og:description' 	=> 'Fashionable and Modern Batik',
														'og:url' 			=> $this->balin['info']['url']['value'],
														'og:image' 			=> $this->balin['info']['logo']['value'],
														'og:site_name' 		=> 'balin.id',
														'fb:app_id' 		=> Config::get('fb_app.id'),
													];

		$this->page_attributes->controller_name		= $this->controller_name;
		$this->page_attributes->subtitle 			= 'Fashionable and Modern Batik';
		$this->page_attributes->data				= $datas;
		if(isset($this->balin['banners']))
		{
			$this->page_attributes->data['banners']	= $this->balin['banners'];
		}
		else
		{
			$this->page_attributes->data['banners']	= 	[
															'left_banner' => ['image_lg' => '', 'value' => json_encode(['button' => ['banner_button_url' => '']])],
															'right_banner' => ['image_lg' => '', 'value' => json_encode(['button' => ['banner_button_url' => '']])],
															'full_banner' => ['image_lg' => '', 'value' => json_encode(['button' => ['banner_button_url' => '']])],
														];
		}

		$this->page_attributes->source 				=  $this->page_attributes->source . 'index';

		return $this->generateView();
	}
}