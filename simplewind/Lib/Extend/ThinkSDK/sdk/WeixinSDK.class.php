<?php
/**
 * Created by PhpStorm.
 * User: jeffrey zuo
 * Email: zuoyaofei@icloud.com
 * Date: 2015/8/5
 * Time: 10:57
 */
 
class WeixinSDK extends ThinkOauth {
    /**
     * 获取requestCode的api接口
     * @var string
     */
    protected $GetRequestCodeURL = 'https://open.weixin.qq.com/connect/oauth2/authorize';
 
    /**
     * 获取access_token的api接口
     * @var string
     */
    protected $GetAccessTokenURL = 'https://api.weixin.qq.com/sns/oauth2/access_token';
 
    /**
     * 获取request_code的额外参数,可在配置中修改 URL查询字符串格式
     * @var srting
     */
    protected $Authorize = '';
 
    /**
     * API根路径
     * @var string
     */
    protected $ApiBase = 'https://api.weixin.qq.com/';
 
    /**
     * 抽象方法，在SNSSDK中实现
     * 组装接口调用参数 并调用接口
     */
    public function call($api, $param = '', $method = 'GET', $multi = false)
    {
        /* 微信调用公共参数 */
        $params = array(
            'access_token'       => $this->Token['access_token'],
            'openid'             => $this->openid(),
            'lang'             => 'zh_CN'
        );
        $data = $this->http($this->url($api), $this->param($params, $param), $method);
        return json_decode($data, true);
    }
 
    /**
     * 抽象方法，在SNSSDK中实现
     * 解析access_token方法请求后的返回值
     */
    protected function parseToken($result, $extend)
    {
        $data = json_decode($result, true);
        if($data['access_token'] && $data['expires_in']){
            $this->Token    = $data;
            $data['openid'] = $this->openid();
            return $data;
        } else
            throw new Exception("获取微信 ACCESS_TOKEN 出错：{$result}");
    }
 
    /**
     * 抽象方法，在SNSSDK中实现
     * 获取当前授权用户的SNS标识
     */
    public function openid()
    {
        $data = $this->Token;
        return $data['openid'];
    }
 
    protected function getAppKeyParamName() {
        return "appid";
    }
 
    protected function getAppSecretParamName() {
        return "secret";
    }
}