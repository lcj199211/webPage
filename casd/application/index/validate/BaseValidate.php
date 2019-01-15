<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 8:51
 */

namespace app\index\validate;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
//    public function goCheck(){
//        //获取http传入参数
//        $request = Request::instance();
//        $params = $request->param();
//        $result = $this->batch()->check($params);//验证以及批量验证
//        if (!$result){
//         return $this->error;
//        }else{
//            return true;
//        }
//    }
}