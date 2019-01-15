<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/4
 * Time: 18:00
 */

namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;

class Login
{
    public function index(){
        return view('login');
    }
    /**
     * 登录方法
     * @return array
     */
    public function login(){
        if (request()->isPost()){
            $data = input('post.');
            $Admin = new AdminModel();
            $user = $Admin->getLogin($data);

            if ($user){
                if ($user['password'] == md5($data['password'])) {
                    session('username', $user['username']);
                    session('uid', $user['id']);
                    return ['state' => 1];
                }
                return ['state' => '用户名或密码错误'];
            }
            return ['state' => '用户名或密码错误'];
        }
        return  ['state' => '非法请求'];
    }
    /**
     * 退出登录方法
     * @return boolean
     */
    public function loginOut(){
        session(null);
        return true;
    }

}