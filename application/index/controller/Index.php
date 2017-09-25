<?php
namespace app\index\controller;

use think\Controller;
use think\Config; //配置文件类
use think\Env; //环境变量类
use think\Request; //请求对象
use think\Db;
use app\index\model\User; //user 模型

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

    public function dbtest()
    {
        $rs = Db::query('select * from tp5_user where username=?',['chenyw']);
        //$rs = Db::execute('insert into tp5_user (username , password) value (?,?)',['bob','123456789']);
        //$rs = Db::execute('insert into tp5_user (username , password) value (:username,:password)',['username'=>'vava','password'=>'888888888']);
        //dump($rs);
    }


    public function modeltest()
    {
        $rs = User::get(1);
        $rs = User::where('id',2)->find();



        // $user = new User();

        // for ($i=0; $i < 10 ; $i++) { 
        //     $data[] = [
        //         'username' => 'chenyw'.$i,
        //         'password' => md5('123456'.$i),
        //         'email'    => 'chenyw'.$i.'@126.com'
        //     ];
        // }
        // $rs = $user->saveAll($data);
        // foreach ($rs as $k => $v) {
        //     dump($v->toArray());
        // }
        // dump($rs);  

        // $res = $user->save(
        //     ['username'=>'chen'],
        //     function($query){
        //         $query->where('username','chenyw1');
        //     }
        // );


        // $res = $user->save(
        //     ['username'=>'cywcyw','password'=>'123456','email'=>'cctv@126.com']
        // );

        // $res = $user->save(
        //     ['password'=>'123456','email'=>'cctv@163.com'],
        //     function($query){
        //         $query->where('username','cywcyw');
        //     }
        // );

        //$res = $user->where('username','like','%chen%')->delete();
        $user = User::get(96);
        // 软删除
        $res = $user->delete();
        //User::destroy();

        dump($res);


    }



}
