<?php
namespace app\index\controller;

use think\Controller;
use think\Config; //配置文件类
use think\Env; //环境变量类
use think\Request; //请求对象

class Index extends Controller
{

    public function index(Request $request)
    {
        //dump($request->param()); //输出所有 参数
        $data = [
            'code' => '200',
            'res' => [
                'name' => 'chen',
                'age' => '18'
            ]
        ];

        $datatype = $request->get('type'); // 设置输出数据格式
        if ( !in_array( $datatype, ['json','xml'] ) ) {
            $datatype = 'json';
        }
        Config::set( 'default_return_type' , $datatype );
        return  $data;

    }

    public function test($id)
    {
    	//var_dump( Config::has('controller') );
    	//var_dump( config('?controller') );
    	
    	dump($_ENV);
    	dump(Env::get('database_host','default')); //没有就输出 默认值default

    	//dump($_SERVER);

        dump( $id );
    }

    public function viewtest()
    {
        $this->assign('name','chen');
        // $this->view->key = 'value';
        // return view('index');
        return $this->fetch('index', 
            ['key'  => 'value',
            'key2' => 'value2'],
            ['NAME'=>'chenYw']
            );
    }
}
