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

	protected $posts_model;
	protected $term_relationships_model;
	protected $terms_model;
	
	function _initialize() {
		parent::_initialize();
		$this->posts_model = D("Portal/Posts");
		$this->terms_model = D("Portal/Terms");
		$this->term_relationships_model = D("Portal/TermRelationships");
	}
	
	//文章内页
	public function index() {
		
		$this->theme(C('DEFAULT_THEME'))->display(":post");
	}
	
	public function article(){
		if(sp_is_user_login())
		{
			$this->display("article");
		}else{
			
			$_SESSION['login_http_referer'] = U('Post/article');
			//$this->error("请先登录！", $redirect, 1);
			$this->redirect(U('user/login/index'));
		}
		
	}
	
	public function post_article(){
		if(IS_POST){
			$posts_model = D("Portal/Posts");
			$_POST['post']['post_date']=date("Y-m-d H:i:s",time());
			$_POST['post']['post_author']=sp_get_current_userid();
			
			dump(I("post.title"));
			$article=I("post.post");
			
			$article['post_title']='a title';//htmlspecialchars_decode($_POST['title']);
			$article['post_content']='content'; //htmlspecialchars_decode($_POST['content']);
			$result=$this->posts_model->add($article);
			if ($result) {
				$this->redirect(U('article/index'),array("id"=>$result["id"]));
				
			}
		}
	}
	
}
