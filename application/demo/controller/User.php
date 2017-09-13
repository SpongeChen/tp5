<?php

namespace app\demo\controller;

use think\Controller;
use think\Request;
use app\common\controller\User as commonUser;

class User extends commonUser
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function showIndex()
    {
        return $this->index();
    }
}
