<?php namespace App\Http\Controllers;

use App\API\Connectors\APIProduct;
use Session, Config, Input;

class HomeController extends BaseController 
{	
	protected $controller_name 						= 'home';

	function __construct()
	{
		parent::__construct();

		Session::set('API_token', Session::get('API_token_public'));

		$this->page_attributes->title 				= 'BALIN.ID';
		$this->page_attributes->source 				= 'home.';
		$this->page_attributes->breadcrumb			= [];
		$this->take 								= 20;
		$this->premium 								= env('BALIN_RELEASE_PREMIUM', true);
	}

	/**
	 * display home
	 *
	 * @return view
	 */
	public function index()
	{
		//get data
		$APIProduct 								= new APIProduct;
		$sort										= ['name' => 'asc'];
		$page 										= 1;

		if(Session::has('whoami'))
		{
			if(Session::get('whoami')['gender']=='male')
			{
				$categories[] 						= 'pria';
			}
			else
			{
				$categories[] 						= 'wanita';
			}

			if($this->premium)
			{
				$linked_search 						= ['categories' => $categories, 'tags' => ['fabric-premium-cotton']];
			}
			else
			{
				$linked_search 						= ['categories' => $categories];
			}

			$product 								= $APIProduct->getIndex([
															'search' 	=> $linked_search,
															'sort' 		=> $sort,
															'take'		=> 4,
															'skip'		=> 0,
														]);
		}
		else
		{
			if($this->premium)
			{
				$linked_search 						= ['tags' => ['fabric-premium-cotton']];
			}
			else
			{
				$linked_search 						= [];
			}

			$product 								= $APIProduct->getIndex([
															'search' 	=> $linked_search,
															'sort' 		=> $sort,
															'take'		=> 4,
															'skip'		=> 0,
														]);
		}

		//temporary data
		$datas['sliders']							= 	$this->balin['sliders'];

		$shop_by_style								= 	$this->balin['banners'];

		foreach ($shop_by_style as $key => $value) 
		{
			if($value['type']=='banner')
			{
				$tmp 										= json_decode($value['value'],true);
				$datas['shop_by_style'][$tmp['position']]	= 	[
																	'images' 	=> 	[
																						'thumbnail'		=> $value['thumbnail'],
																						'image_xs'		=> $value['image_xs'],
																						'image_sm'		=> $value['image_sm'],
																						'image_md'		=> $value['image_md'],
																						'image_lg'		=> $value['image_lg'],
																					],
																	'action_url'=> $tmp['action_url'],
																	'caption'	=> $tmp['caption'],
																	'position'	=> $tmp['position'],
																];
			}
			else
			{
				$datas['instagram'][]				= 	$value;
			}
		}

		$datas['new_release']					= 	$product['data']['data'];
		$datas['linked_search']					= 	$linked_search;

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
		$this->page_attributes->data['premium']		= $this->premium;

		$this->page_attributes->source 				= $this->page_attributes->source . 'index';

		return $this->generateView();
	}


	/**
	 * function to generate view and display products of balin
	 * 
	 * 1. Check filter
	 * 2. Check page
	 * 3. Get data from API
	 * 4. Generate paginator
	 * 5. Generate breadcrumb
	 * 6. Generate view
	 * @return view
	 */
	public function notfound()
	{
		$APIProduct 								= new APIProduct;
		$sort										= ['name' => 'asc'];
		$page 										= 1;

		if(Session::has('whoami'))
		{
			if(Session::get('whoami')['gender']=='male')
			{
				$categories[] 						= 'pria';
				$type 								= 'pria';
			}
			else
			{
				$categories[] 						= 'wanita';
				$type 								= 'wanita';
			}

			if($this->premium)
			{
				$linked_search 						= ['categories' => $categories, 'tags' => ['fabric-premium-cotton']];
			}
			else
			{
				$linked_search 						= ['categories' => $categories];
			}

			$product 								= $APIProduct->getIndex([
															'search' 	=> $linked_search,
															'sort' 		=> $sort,
															'take'		=> 4,
															'skip'		=> 0,
														]);
		}
		else
		{
			if($this->premium)
			{
				$linked_search 						= ['tags' => ['fabric-premium-cotton']];
			}
			else
			{
				$linked_search 						= [];
			}

			$product 								= $APIProduct->getIndex([
															'search' 	=> $linked_search,
															'sort' 		=> $sort,
															'take'		=> 4,
															'skip'		=> 0,
														]);

			$type 									= explode('0', Input::get('categories')[0])[0];
		}

		//6. Generate view
		$this->page_attributes->subtitle 			= 'Produk Batik Modern';
		$this->page_attributes->controller_name 	= $this->controller_name;
		$this->page_attributes->data				= 	[
															'offer' 			=> $product['data']['data'],
															'linked_search' 	=> $linked_search,
															'type'				=> $type,
														];

		$this->page_attributes->source 				=  $this->page_attributes->source . '404';

		return $this->generateView();
	}
}