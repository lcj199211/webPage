<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:35
 */

namespace app\index\validate;


class SendMail extends BaseValidate
{
    protected $rule = [
        'name' => 'require',
        'contact'=>'require',
        'contents'=>'require'
    ];
    protected $message = [
        'name.require' => '请输入您的名字',
        'contact.require' => '请输入您的联系方式',
        'contents.require' => '请输入内容'
    ];
    protected $scene = [

    ];
}