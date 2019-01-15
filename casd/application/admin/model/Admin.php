<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 10:53
 */
namespace app\admin\model;

class Admin extends BaseModel
{
    public function getLogin($data){
        $user = self::where('username','=',$data['username'])->find();
        return $user;
    }

    public function getUser($id){

        $data = self::find($id);

        return $data;
    }

    public function userModify($data){
        $resultUser = self::find($data['id']);
        if ($data['password']){
            $data['password'] = md5($data['password']);
        }else{
            $data['password']=$resultUser['password'];
        }
        $result = self::where('id','=',$data['id'])->update(['password'=>$data['password']]);
        if ($result === false){
            return false;
        }
        return true;
    }
}