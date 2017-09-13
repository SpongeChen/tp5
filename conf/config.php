<?php

use think\Env;

return [
	'app_emai'        => 'chen_yw@126.com',

	'app_status'      => Env::get('app_status'), //不同环境的配置项 

	'auto_bind_module' => true, // 自动绑定，入口文件 自动访问对应同名模块

	'show_error_msg' => true, // 显示错误信息(调试阶段)
];