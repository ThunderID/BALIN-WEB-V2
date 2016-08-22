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
		$this->page_attributes->breadcrumb			= [];
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

		//temporary data
		$datas['sliders']						= 	[
														0 => ['thumbnail' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln1.jpg', 'image_xs' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln1.jpg', 'image_sm' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln1.jpg', 'image_md' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln1.jpg', 'image_lg' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln1.jpg', 'value' => json_encode(['button' => ['slider_button_url' => '']])],
														1 => ['thumbnail' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln2.jpg', 'image_xs' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln2.jpg', 'image_sm' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln2.jpg', 'image_md' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln2.jpg', 'image_lg' => 'http://drive.thunder.id/file/public/4/10/2016/08/19/14/bln2.jpg', 'value' => json_encode(['button' => ['slider_button_url' => '']])],
													];

		$shop_by_style								= 	[
														0 => ['thumbnail' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'image_xs' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'image_sm' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'image_md' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'image_lg' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'value' => json_encode(['action_url' => '', 'caption' => 'Preepy', 'position' => 1])],
														1 => ['thumbnail' => 'http://www.batikkeris.co.id/image/news/%5E8F2E8B3213C5031673D73DB47B26A14B0E32F2E6DCEE0ECFBA%5Epimgpsh_fullsize_distr.jpg', 'image_xs' => 'http://www.batikkeris.co.id/image/news/%5E8F2E8B3213C5031673D73DB47B26A14B0E32F2E6DCEE0ECFBA%5Epimgpsh_fullsize_distr.jpg', 'image_sm' => 'http://www.batikkeris.co.id/image/news/%5E8F2E8B3213C5031673D73DB47B26A14B0E32F2E6DCEE0ECFBA%5Epimgpsh_fullsize_distr.jpg', 'image_md' => 'http://www.batikkeris.co.id/image/news/%5E8F2E8B3213C5031673D73DB47B26A14B0E32F2E6DCEE0ECFBA%5Epimgpsh_fullsize_distr.jpg', 'image_lg' => 'http://www.batikkeris.co.id/image/news/%5E8F2E8B3213C5031673D73DB47B26A14B0E32F2E6DCEE0ECFBA%5Epimgpsh_fullsize_distr.jpg', 'value' => json_encode(['action_url' => '', 'caption' => 'Nineties Chauffeur', 'position' => 2])],
														2 => ['thumbnail' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/12357933_408625009347745_1792439978_n.jpg', 'image_xs' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/12357933_408625009347745_1792439978_n.jpg', 'image_sm' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/12357933_408625009347745_1792439978_n.jpg', 'image_md' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/12357933_408625009347745_1792439978_n.jpg', 'image_lg' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/12357933_408625009347745_1792439978_n.jpg', 'value' => json_encode(['action_url' => '', 'caption' => 'BALIN Gift', 'position' => 3])],
														3 => ['thumbnail' => 'http://drive.thunder.id/file/public/4/1/2015/12/06/04/a700A0300.jpg', 'image_xs' => 'http://drive.thunder.id/file/public/4/1/2015/12/06/04/a700A0300.jpg', 'image_sm' => 'http://drive.thunder.id/file/public/4/1/2015/12/06/04/a700A0300.jpg', 'image_md' => 'http://drive.thunder.id/file/public/4/1/2015/12/06/04/a700A0300.jpg', 'image_lg' => 'http://drive.thunder.id/file/public/4/1/2015/12/06/04/a700A0300.jpg', 'value' => json_encode(['action_url' => '', 'caption' => 'Hairness The Power', 'position' => 4])],
														4 => ['thumbnail' => 'http://zalora-media-live-id.s3.amazonaws.com/product/21/76711/1.jpg', 'image_xs' => 'http://zalora-media-live-id.s3.amazonaws.com/product/21/76711/1.jpg', 'image_sm' => 'http://zalora-media-live-id.s3.amazonaws.com/product/21/76711/1.jpg', 'image_md' => 'http://zalora-media-live-id.s3.amazonaws.com/product/21/76711/1.jpg', 'image_lg' => 'http://zalora-media-live-id.s3.amazonaws.com/product/21/76711/1.jpg', 'value' => json_encode(['action_url' => '', 'caption' => 'Working Lady', 'position' => 5])],
													];

		foreach ($shop_by_style as $key => $value) {
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


		$datas['new_release']					= 	[
														0 => ['name' => 'Dress Wanita Gantara', 'price' => 399000, 'promo_price' => 0, 'slug' => 'dress-wanita-gantara', 'thumbnail' => 'http://zalora-media-live-id.s3.amazonaws.com/product/93/22121/1.jpg'],
														1 => ['name' => 'Atasan Wanita Akasa', 'price' => 299000, 'promo_price' => 0, 'slug' => 'atasan-wanita-akasa', 'thumbnail' => 'http://zalora-media-live-id.s3.amazonaws.com/product/68/74511/1.jpg'],
														2 => ['name' => 'Kemeja Pria Anuradha', 'price' => 349000, 'promo_price' => 299000, 'slug' => 'kemeja-pria-anuradha', 'thumbnail' => 'http://zalora-media-live-id.s3.amazonaws.com/product/51/24021/1.jpg'],
														3 => ['name' => 'Kemeja Pria Cendric', 'price' => 349000, 'promo_price' => 0, 'slug' => 'kemeja-pria-cendric', 'thumbnail' => 'http://zalora-media-live-id.s3.amazonaws.com/product/03/05711/1.jpg'],
													];

		$datas['instagram']						= 	[
														0 => ['thumbnail' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12354067_1682481895329676_870122315_n.jpg', 'image_xs' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12354067_1682481895329676_870122315_n.jpg', 'image_sm' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12354067_1682481895329676_870122315_n.jpg', 'image_md' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12354067_1682481895329676_870122315_n.jpg', 'image_lg' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12354067_1682481895329676_870122315_n.jpg', 'value' => json_encode(['action' => ''])],
														1 => ['thumbnail' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12357831_479815148886661_1267031752_n.jpg', 'image_xs' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12357831_479815148886661_1267031752_n.jpg', 'image_sm' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12357831_479815148886661_1267031752_n.jpg', 'image_md' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12357831_479815148886661_1267031752_n.jpg', 'image_lg' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12357831_479815148886661_1267031752_n.jpg', 'value' => json_encode(['action' => ''])],
														2 => ['thumbnail' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12317888_572084146290875_1268795990_n.jpg', 'image_xs' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12317888_572084146290875_1268795990_n.jpg', 'image_sm' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12317888_572084146290875_1268795990_n.jpg', 'image_md' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12317888_572084146290875_1268795990_n.jpg', 'image_lg' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/12317888_572084146290875_1268795990_n.jpg', 'value' => json_encode(['action' => ''])],
														3 => ['thumbnail' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'image_xs' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'image_sm' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'image_md' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'image_lg' => 'https://scontent-sit4-1.cdninstagram.com/t51.2885-15/e35/10004113_500590986732860_868342938_n.jpg', 'value' => json_encode(['action' => ''])],
													];

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

		$this->page_attributes->source 				=  $this->page_attributes->source . 'index';

		return $this->generateView();
	}
}