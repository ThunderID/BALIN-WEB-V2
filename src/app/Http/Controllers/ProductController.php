<?php namespace App\Http\Controllers;

use App\API\Connectors\APIProduct;
use App\API\Connectors\APITag;
use App\API\Connectors\APICategory;

use Response, Input, Collection, Session, BalinMail, Route, App, Cache;

/**
 * Used for Product Controller
 * 
 * @author agil
 */
class ProductController extends BaseController 
{	
	protected $controller_name 						= 'product';

	function __construct()
	{
		parent::__construct();

		$this->page_attributes->title 				= 'BALIN.ID';
		$this->page_attributes->source 				= 'products.';
		$this->page_attributes->breadcrumb			=	[
															'Produk' 	=> route('balin.product.index'),
														];
		$this->take 								= 12;
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
	public function index()
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

		if(Input::has('categories'))
		{
			$categories	= Input::get('categories');
		}

		//1. Get Navbar Category
		$APICategory	= new APICategory;
		$category 		= Cache::remember('category_all', 20, function()use($APICategory) 
			{
				return $APICategory->getIndex();
			;
			});

		//2. Get All Filters based on category
		$APITag			= new APITag;
		$tag 			= Cache::remember('tag_category_'.implode('_', $categories), 20, function()use($APITag, $categories) 
			{
				return $APITag->getIndex([
											'search' 	=> 	['categories' => $categories],
											'sort' 		=> 	[
																'path'	=> 'asc',
															],
										]);
			});

		//3. Product Filter Based
		$filters					= null;
		$activesearch				= [];

		//3a. categories
		//for api
		$search['categories']		= $categories;

		//for ui
		foreach ($search['categories'] as $key => $value) 
		{
			$keys 					= [];
			if (!in_array($value, ['pria', 'wanita'])) 
			{
				$activesearch[]		= ['value' => strtolower('Category: ' . str_replace('-', ' ', $value)), 'slug' => $value, 'type' => 'categories'];
			}
			
			$keys 					= array_merge(explode('-', $value), $keys);
		}

		$keys_final_modified 		= implode(' ', array_unique($keys));
		$searchresult 				= ucwords($keys_final_modified);


		//3b. tags
		if(Input::has('tags'))
		{
			$keys 					= [];
			//for api
			$search['tags']			= Input::get('tags');
		
			//for api
			foreach ($search['tags'] as $key => $value) 
			{
				$activesearch[]		= ['value' => strtolower(preg_replace('/ /', ': ', str_replace('-', ' ', $value), 1)), 'slug' => $value, 'type' => 'tags'];
				$keys 				= array_merge(explode('-', $value), $keys);
			}

			$keys_final_modified 	= implode(' ', array_unique($keys));
			$searchresult 			= $searchresult.' '.ucwords($keys_final_modified);
		}
	
		//3c. sorting
		if (Input::has('sort'))
		{
			//for api
			$sort 					= [$sort_item[0] => $sort_item[1]];
			//for ui
			$sort_item 				= explode('-', Input::get('sort'));

			$searchresult 			= $searchresult.' diurutkan berdasarkan '.$sort_item[0].' '.$sort_item[1];
		}
		else
		{
			//for api
			$sort					= ['name' => 'asc'];
		}

		//3d. Check page
		$page 						= 1;
		if (Input::has('page'))
		{
			$page 					= Input::get('page');
			$searchresult 			= $searchresult.' halaman '.$page;
		}

		//3e. API Product
		$APIProduct 				= new APIProduct;
		$product 					= Cache::remember('product_index_'.$searchresult, 20, function()use($APIProduct, $search, $sort, $page) 
			{
				return $APIProduct->getIndex([
												'search' 	=> $search,
												'sort' 		=> $sort,
												'take'		=> 12,
												'skip'		=> ($page - 1) * 12,
											]);
			});

		// //4. Recommended cart
		// $recommend 					= $this->getRecommendation();

		// //5. get balin
		// $balin 						= $this->getBalin();

		//6. Not Found
		if($product['data']['count'] == 0)
		{
			App::abort(404);
		}

		$offer['data']['data']		= [];
		if(!count($product['data']['data']))
		{
			$offer 					= Cache::remember('product_offer'.http_build_query($categories[0]), 20, function()use($APIProduct, $categories) 
			{
				return $APIProduct->getIndex([
												'search' 	=> $categories[0],
												'sort' 		=> ['newest' => 'desc'],
												'take'		=> 3,
												'skip'		=> 0,
											]);
			});
		}

		//7. Color chart
		$color_chart		= $this->getcolorchart();
		
		foreach ($tag['data']['data'] as $k => $v)
		{
			if (isset($v['tag']) && (strtolower($v['tag']['slug'])=='warna'))
			{
				$tag['data']['data'][$k]['code']	= (isset($color_chart[strtolower($v['name'])]) ? $color_chart[strtolower($v['name'])] : '#000');
			}
		}

		//8. Paginator
		$paging 			= $this->paginate(route('balin.product.index'), $product['data']['count'], $page);

		//9. Breadcrumb
		$breadcrumb			= 	[
									'Produk' => route('balin.product.index')
								];

		if($page > 1)
		{
			$breadcrumb['Halaman '.$page]	= route('balin.product.index', ['page' => $page]);
		}

		//10. Metas
		$metas	= 	[
						'og:type' 			=> 'website', 
						'og:title' 			=> 'BALIN.ID', 
						'og:description' 	=> 'Produk Batik Modern ' . $page . ' '.$searchresult,
						'og:url' 			=> $this->balin['info']['url']['value'],
						'og:image' 			=> $this->balin['info']['logo']['value'],
						'og:site_name' 		=> 'balin.id',
						'fb:app_id' 		=> \Config::get('fb_app.id'),
					];

		//11. Generate view
		$this->page_attributes->subtitle	= 'Produk Batik Modern ' . $page .' '. $searchresult;
		$datas								= 	[
													'offer' 			=> $offer['data']['data'],
													'product' 			=> $product['data']['data'],
													'type'				=> $categories[0],
													'tag'				=> $tag['data']['data'],
													'linked_search'		=> $categories,
													'active_search'		=> $activesearch	
												];

  		return view($this->base_path_view . 'products.index')
					->with('breadcrumb', $breadcrumb)
					->with('page_title', $this->page_attributes->title)
					->with('page_subtitle', $this->page_attributes->subtitle)
					->with('data', $datas)
					->with('balin', $this->balin)
					->with('recommend', $this->recommend)
					->with('metas', $metas)
					->with('category', $category['data']['data'])
					->with('paging_from', $paging['paginate_item_from'])
					->with('paging_to', $paging['paginate_item_to'])
					->with('paging', $paging['paging'])
					;
	}

	/**
	 * function to generate view and display spesific product of balin
	 * 
	 * @return view, redirect route
	 */
	public function show($slug = null)
	{
		//1. Get Navbar Category
		$APICategory	= new APICategory;
		$category 		= Cache::remember('category_all', 20, function()use($APICategory) 
			{
				return $APICategory->getIndex();
			;
			});

		//2. Check product
		$APIProduct		= new APIProduct;
		$product		= $APIProduct->getIndex([
								'search' 	=> 	[
													'slug' 	=> $slug,
												],
							]);

		$type			= 'pria';

		if($product['status'] != 'success')
		{
			$this->errors	= $product['message'];
		}
		elseif($product['data']['count'] < 1)
		{
			$this->errors	= 'Tidak ada data.';
		}
		else
		{
			$categories		= $product['data']['data'][0]['categories'];
			$slugs			= [];

			foreach ($categories as $key => $value) 
			{
				$slugs[]	= $value['slug'];

				if(str_is('pria*', $value['slug']) )
				{
					$type	= 'pria';
				}
				else
				{
					$type	= 'wanita';
				}
			}

			//3. Get Related product
			$search			= 	[
									'categories' 	=> $slugs,
									'notid' 		=> $product['data']['data'][0]['id'],
								];

			$related 		= Cache::remember('product_related_'.http_build_query($search), 20, function()use($APIProduct, $search) 
			{
				return $APIProduct->getIndex([
												'search' 	=> $search,
												'sort' 		=> ['name' => 'asc'],
												'take'		=> 12,
												'skip'		=> 0,
											]);
			});


			if(!count($related['data']['data']))
			{
				$search		= 	[
									'categories' 	=> $type,
									'notid' 		=> $product['data']['data'][0]['id'],
								];

				$related	= Cache::remember('product_related_'.http_build_query($search), 20, function()use($APIProduct, $search) 
				{
					return $APIProduct->getIndex([
													'search' 	=> $search,
													'sort' 		=> ['name' => 'asc'],
													'take'		=> 12,
													'skip'		=> 0,
												]);
				});
			}

			// //4. Recommended cart
			// $recommend		= $this->getRecommendation();

			// //5. get balin
			// $balin			= $this->getBalin();
		
			$carts			= Session::get('carts');

			//6. breadcrumb
			$breadcrumb		= 	
				[	
					ucwords($type)	=> route('balin.product.index', ['categories' => [$type]]),
					$product['data']['data'][0]['name'] => route('balin.product.show', $product['data']['data'][0]['slug'])
				];

			//7. generate View
			$this->page_attributes->subtitle = $product['data']['data'][0]['name'];
			$datas		= 	[
								'product' 	=> $product,
								'related'	=> $related['data']['data'],
								'carts'		=> $carts,
								'type' 		=> $type,
							];

				$metas	= 	[
								'og:type' 			=> 'website', 
								'og:title' 			=> 'BALIN.ID', 
								'og:description' 	=> $this->page_attributes->subtitle,
								'og:url' 			=> $this->balin['info']['url']['value'],
								'og:image' 			=> $this->balin['info']['logo']['value'],
								'og:site_name' 		=> 'balin.id',
								'fb:app_id' 		=> \Config::get('fb_app.id'),
							];


  			return view($this->base_path_view . 'products.show')
					->with('breadcrumb', array_merge($breadcrumb))
					->with('page_title', $this->page_attributes->title)
					->with('page_subtitle', $this->page_attributes->subtitle)
					->with('data', $datas)
					->with('balin', $this->balin)
					->with('recommend', $this->recommend)
					->with('related', $related)
					->with('metas', $metas)
					->with('category', $category['data']['data'])
					;
		}

		return $this->generateRedirectRoute('balin.product.index');
	}
}