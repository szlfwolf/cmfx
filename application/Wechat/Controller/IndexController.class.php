<?php
namespace Wechat\Controller;
use Think\Controller;
class IndexController extends Controller{
    public function index(){
        hook('wechat',array('type'=>'connect'));
    }
}