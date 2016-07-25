<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController;
/**
 * 文章列表
*/
class PostController extends HomebaseController {

	//文章内页
	public function index() {
		$this->display(":post");
	}
	
	public function nav_index(){
		$navcatname="文章分类";
		$datas=sp_get_terms("field:term_id,name");
		$navrule=array(
				"action"=>"List/index",
				"param"=>array(
						"id"=>"term_id"
				),
				"label"=>"name");
		exit(sp_get_nav4admin($navcatname,$datas,$navrule));
		
	}
	
}
