<?php
return array(
    'THINK_SDK_WEIXIN' => array(
		'APP_KEY' => 'xxxxxxxx',
		'APP_SECRET' => '7xxxxxxxxxxxxxxxxx',
		'AUTHORIZE' => 'response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect',
		'CALLBACK' => 'http://host/index.php?g=api&m=oauth&a=callback&type=weixin',
	)
);