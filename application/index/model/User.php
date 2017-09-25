<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete; //软删除 

class User extends Model
{
 	use SoftDelete; //软删除 
	// protected $autoWriteTimestamp = true; //自动录入时间
	// protected $createTime = 'create_at'; // 修改字段名
	// protected $updateTime = 'update_at'; // 修改字段名
	 protected $deleteTime = 'delete_at'; // 删除时间


	protected $insert = ['create_at'];
	protected $update = ['updated_at'];
    //
    public function getSexAttr($val)
    {
    	switch ($val) {
    		case '1':
    			return "男";
    			break;
    		case '2':
    			return "女";
    			break;
    		default:
    			return "未知";
    			break;
    	}
    }

    /**
     * $data 所有数据
     */
    public function setPasswordAttr($val,$data)
    {
    	return md5($val.$data['email']);
    }

	public function setCreateAtAttr($val)
    {
    	return date('Y-m-d H:i:s');
    }

    public function setUpdatedAtAttr($val)
    {
    	return date('Y-m-d H:i:s');
    }

    public function setDeleteAtAttr($val)
    {
    	return date('Y-m-d H:i:s');
    }


}
