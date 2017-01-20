<?php namespace App\Http\Controllers;

use App\API\Connectors\APIProduct;
use App\API\Connectors\APICategory;
use Session, Config, Input, Cache;

class HomeController extends BaseController 
{	
	protected $controller_name 						= 'home';

	function __construct()
	{
		parent::__construct();

		Session::set('API_token', Session::get('API_token_public'));

		$this->page_attributes->title 				= 'BALIN.ID';
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
		$categories[0]					= 'wanita';
		if(Session::has('whoami'))
		{
			if(Session::get('whoami')['gender']=='male')
			{
				$categories[0] 			= 'pria';
			}
			else
			{
				$categories[0] 			= 'wanita';
			}
		}

		//1. Get Slider
		$datas['sliders']				= $this->balin['sliders'];
		
		//2. Get Banner & instagram
		foreach ($this->balin['banners'] as $key => $value) 
		{
			if($value['type']=='banner')
			{
				$tmp 										= json_decode($value['value'],true);
				$datas['shop_by_style'][$tmp['position']]	= 	
					[
						'images' 		=> 	
							[
								'thumbnail'		=> $value['thumbnail'],
								'image_xs'		=> $value['image_xs'],
								'image_sm'		=> $value['image_sm'],
								'image_md'		=> $value['image_md'],
								'image_lg'		=> $value['image_lg'],
							],
						'action_url'	=> $tmp['action_url'],
						'caption'		=> $tmp['caption'],
						'position'		=> $tmp['position'],
					];
			}
			else
			{
				$datas['instagram'][]				= 	$value;
			}
		}

		//4. New Release
		$APIProduct 		= new APIProduct;
		$sort				= ['name' => 'asc'];
		$page 				= 1;

		if($this->premium)
		{
			$linked_search 	= ['categories' => $categories, 'tags' => ['fabric-premium-cotton']];
		}
		else
		{
			$linked_search 	= ['categories' => $categories];
		}
	
		$product 			= Cache::remember('new_release_8_0', 20, function()use($APIProduct, $linked_search, $sort) 
				{
					return $APIProduct->getIndex([
													'search' 	=> $linked_search,
													'sort' 		=> $sort,
													'take'		=> 8,
													'skip'		=> 0,
												]);
				;
				});

		$datas['new_release']	= $product['data']['data'];
		$datas['linked_search']	= $linked_search;
		$datas['premium']		= $this->premium;

		//5. Metas
		$metas	= 	[
						'og:type' 			=> 'website', 
						'og:title' 			=> 'BALIN.ID', 
						'og:description' 	=> 'Fashionable and Modern Batik',
						'og:url' 			=> $this->balin['info']['url']['value'],
						'og:image' 			=> $this->balin['info']['logo']['value'],
						'og:site_name' 		=> 'balin.id',
						'fb:app_id' 		=> Config::get('fb_app.id'),
					];

		//6. return View
  		return view($this->base_path_view . 'home.index')
					->with('breadcrumb', $this->page_attributes->breadcrumb)
					->with('page_title', $this->page_attributes->title)
					->with('page_subtitle', 'Fashionable and Modern Batik')
					->with('data', $datas)
					->with('balin', $this->balin)
					->with('recommend', $this->recommend)
					->with('metas', $metas)
						;
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
		$categories[0]			= 'wanita';
		if(Session::has('whoami'))
		{
			if(Session::get('whoami')['gender']=='male')
			{
				$categories[0] 	= 'pria';
			}
			else
			{
				$categories[0] 	= 'wanita';
			}
		}

		//1. Find Product
		if($this->premium)
		{
			$linked_search		= ['categories' => $categories, 'tags' => ['fabric-premium-cotton']];
		}
		else
		{
			$linked_search		= ['categories' => $categories];
		}

		$APIProduct 			= new APIProduct;
		$sort					= ['name' => 'asc'];
		$page 					= 1;

		$product 				= Cache::remember('recommend_0_4'.http_build_query($linked_search), 20, function()use($APIProduct, $linked_search, $sort) 
			{
				return $APIProduct->getIndex([
												'search' 	=> $linked_search,
												'sort' 		=> $sort,
												'take'		=> 4,
												'skip'		=> 0,
											]);
			;
			});

		//2 . Get balin & data
		$datas	= 	[
						'offer' 			=> $product['data']['data'],
						'linked_search' 	=> $linked_search,
						'type'				=> $categories[0],
					];

		$APICategory	= new APICategory;
		$category 		= Cache::remember('category_all', 20, function()use($APICategory) 
			{
				return $APICategory->getIndex();
			;
			});

		//3. Metas
		$metas	= 	[
						'og:type' 			=> 'website', 
						'og:title' 			=> 'BALIN.ID', 
						'og:description' 	=> 'Fashionable and Modern Batik',
						'og:url' 			=> $this->balin['info']['url']['value'],
						'og:image' 			=> $this->balin['info']['logo']['value'],
						'og:site_name' 		=> 'balin.id',
						'fb:app_id' 		=> Config::get('fb_app.id'),
					];

		//4. Generate view
  		return view($this->base_path_view . 'home.404')
					->with('breadcrumb', $this->page_attributes->breadcrumb)
					->with('page_title', $this->page_attributes->title)
					->with('page_subtitle', 'Fashionable and Modern Batik')
					->with('recommend', $this->recommend)
					->with('data', $datas)
					->with('balin', $this->balin)
					->with('metas', $metas)
					->with('category', $category['data']['data'])
						;
	}
}