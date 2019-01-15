<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 16:53
 */

namespace app\admin\validate;


class Details extends BaseValidate
{
    protected $rule = [
        'title' => 'require'
    ];
    protected $message = [
        'title.require' => '标题不能为空'
    ];
    protected $scene = [

    ];
}