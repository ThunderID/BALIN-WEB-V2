<?php namespace App\Http\Controllers;

use App\API\Connectors\APIProduct;
use App\API\Connectors\APITag;
use App\API\Connectors\APICategory;

use Response, Input, Collection, Session, BalinMail, Route;

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

		if(Session::has('whoami'))
		{
			Session::put('API_token', Session::get('API_token_private'));
		}
		else
		{
			Session::put('API_token', Session::get('API_token_public'));
		}

		$this->page_attributes->title 				= 'BALIN.ID';
		$this->page_attributes->source 				= 'web_v2.pages.product.';
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
		//1. Check filter
		$filters 									= null;
		$search 									= [];

		//1a. Filter of name
		if(Input::has('q'))
		{
			$search 								= 	['name'		=> Input::get('q')];
			$filters 								= 	[
															'name' 	=> 	Input::get('q')
														];
		}
		
		//1b. Filter of category
		if(Input::has('category'))
		{
			$search['categories']					= Input::get('category');
		}

		//1c. Filter of tag
		if(Input::has('tag'))
		{
			$search['tags']							= Input::get('tag');
		}

		//1d. Filter of label
		if(Input::has('label'))
		{
			$search['labelname']					= Input::get('label');
		}

		//1e. Filter for sorting
		if (Input::has('sort'))
		{
			$sort_item 							= explode('-', Input::get('sort'));
			$sort 								= [$sort_item[0] => $sort_item[1]];
		}
		else
		{
			$sort								= ['name' => 'asc'];
		}

		//1f. Get filter remove
		$searchresult 							= [];
		$index 									= '';
		foreach (Input::all() as $key => $value) 
		{
			if(in_array($key, ['tag', 'label', 'category', 'q']))
			{
				$query_string 					= Input::all();
				unset($query_string['page']);
				unset($query_string[$key]);
				$searchresult[$value]			= route('balin.product.index', $query_string);
				$index 							= $index.' '.$value;
			}
		}

		//2. Check page
		if (is_null(Input::get('page')))
		{
			$page 									= 1;
		}
		else
		{
			$page 									= Input::get('page');
		}

		//3. Get data from API
		//3a. API Product
		$APIProduct 								= new APIProduct;

		$product 									= $APIProduct->getIndex([
															'search' 	=> 	$search,
															'sort' 		=> 	$sort,
															'take'		=> $this->take,
															'skip'		=> ($page - 1) * $this->take,
														]);

		//3b. API Category
		$API_category 								= new APICategory;
		$get_api_category							= $API_category->getIndex([
															'search' 	=> 	[],
															'sort' 		=> 	[
																				'path'	=> 'asc',
																			],
														]);
		//3c. API Tag
		$API_tag 									= new APITag;
		$get_api_tag								= $API_tag->getIndex([
															'search' 	=> 	[],
															'sort' 		=> 	[
																				'path'	=> 'asc',
																			],
														]);

		$color_chart 								= $this->getcolorchart();
		
		foreach ($get_api_tag['data']['data'] as $k => $v)
		{
			if (isset($v['tag']) && (strtolower($v['tag']['slug'])=='warna'))
			{
				$get_api_tag['data']['data'][$k]['code']	= (isset($color_chart[strtolower($v['name'])]) ? $color_chart[strtolower($v['name'])] : '#000');
			}
		}

		//3e. Manage data in collection
		$collection_category						= new Collection;
		$collection_category->add($get_api_category['data']['data']);

		$collection_tag 							= new Collection;
		$collection_tag->add($get_api_tag['data']['data']);

		$category 									= $collection_category->sortBy('name')->all();
		$tag 										= $collection_tag->sortBy('name')->all();

		//4. Generate paginator
		$this->paginate(route('balin.product.index'), $product['data']['count'], $page);

		//5. Generate breadcrumb
		$breadcrumb										= 	[
																'Produk' => route('balin.product.index')
															];

		if(Input::has('page') && Input::get('page') > 1)
		{
			$breadcrumb['Halaman '.Input::get('page')]	= route('balin.product.index', ['page' => Input::get('page')]);
		}

		$this->page_attributes->breadcrumb			= array_merge($this->page_attributes->breadcrumb, $breadcrumb);

		//6. Generate view
		$this->page_attributes->search 				= $searchresult;
		$this->page_attributes->subtitle 			= 'Produk Batik Modern '.$index.' '.(Input::has('page') ? 'Halaman '.Input::get('page') : '');
		$this->page_attributes->controller_name 	= $this->controller_name;
		$this->page_attributes->data				= 	[
															'product' 	=> $product,
															'tag'		=> $tag,
															'category'	=> $category
														];

		$this->page_attributes->source 				=  $this->page_attributes->source . 'index';

		return $this->generateView();
	}

	/**
	 * function to generate view and display spesific product of balin
	 * 
	 * @return view, redirect route
	 */
	public function show($slug = null)
	{
		//1. Check product
		$API_product 							= new APIProduct;
		$product 								= $API_product->getIndex([
														'search' 	=> 	[
																			'slug' 	=> $slug,
																		],
													]);
		if($product['status'] != 'success')
		{
			$this->errors						= $product['message'];
		}
		elseif($product['data']['count'] < 1)
		{
			$this->errors 						= 'Tidak ada data.';
		}
		else
		{
			//2. Get Related product
			$related 								= $API_product->getIndex([
															'search' 	=> 	[
																				'name' 	=> Input::get('q'),
																				'notid' => $product['data']['data'][0]['id'],
																			],
															'sort' 		=> 	[
																				'name'	=> 'asc',
																			],																		
															'take'		=> 4,
														]);	

			$carts 									= Session::get('carts');

			//breadcrumb
			$breadcrumb								= 	[	
															'Produk' 							=> route('balin.product.index'),
															$product['data']['data'][0]['name'] => route('balin.product.show', $product['data']['data'][0]['slug'])
														];
			//generate View
			$this->page_attributes->subtitle 		= $product['data']['data'][0]['name'];
			$this->page_attributes->controller_name = $this->controller_name;
			$this->page_attributes->data			= 	[
															'product' 	=> $product,
															'related'	=> $related,
															'carts'		=> $carts,
														];

			$this->page_attributes->breadcrumb		= array_merge($this->page_attributes->breadcrumb, $breadcrumb);
			$this->page_attributes->source 			=  $this->page_attributes->source . 'show';

			return $this->generateView();
		}

		return $this->generateRedirectRoute('balin.product.index');
	}
}