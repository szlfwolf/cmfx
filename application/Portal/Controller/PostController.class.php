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
		
		$this->theme(C('DEFAULT_THEME'))->display("post");
	}
	
	public function article(){
		$this->display("article");
	}
	
	public function post_article(){
		if(IS_POST){
			$this->display(":post");
		}
	}
	
}
