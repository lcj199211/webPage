<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 15:59
 */

namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;

class Admin extends Base
{

    public function edit($id){
        $adminM = new AdminModel();
        $adminUser = $adminM->getUser($id);
        $this->assign('adminUser',$adminUser);
        return view();
    }

    /**
     * 修改密码
     * @return boolean
     */
    public function editUser(){
        $data=(input('post.'));
        if (request()->isPost()){
            $adminM = new AdminModel();
            $result = $adminM->userModify($data);
            if ($result){
                $loginC = new Login();
                $loginC->loginOut();
                return $result;
            }
            return $result;
        }

        return '非法请求';

    }

}