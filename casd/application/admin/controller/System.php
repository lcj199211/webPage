<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22
 * Time: 16:33
 */

namespace app\admin\controller;


class System extends Base
{
    public function index(){
        $systems = model('System')->find(1);
        $this->assign('systems',$systems);
        return view();
    }

    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $SystemM = new \app\admin\model\System();

            $result = $SystemM->modifySystemData($data);

            return $result;

        }
        return '非法请求';
    }

}