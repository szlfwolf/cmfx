<?php
return array(
    'THINK_SDK_WEIXIN' => array(
		'APP_KEY' => 'wxc9a84553478faf66',
		'APP_SECRET' => 'e1fa8811042b0063901451914334d2ea',
		'AUTHORIZE' => 'response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect',
		'CALLBACK' => 'http://host/index.php?g=api&m=oauth&a=callback&type=weixin',
	)
);