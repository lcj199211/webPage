<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 16:53
 */

namespace app\admin\validate;


class Recruit extends BaseValidate
{
    protected $rule = [
        'title' => 'require',
        'desc' => 'require'
    ];
    protected $message = [
        'title.require' => '职位名称不能为空',
        'desc.require' => '职位描述不能为空'
    ];
    protected $scene = [

    ];
}