<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 16:53
 */

namespace app\admin\validate;


class HomeText extends BaseValidate
{
    protected $rule = [
        'title' => 'require',
        'desc' => 'require',
        'img_id'=>'require'
    ];
    protected $message = [
        'title.require' => '名称不能为空',
        'desc.require' => '描述不能为空',
        'img_id.require' => '请上传图标',

    ];
    protected $scene = [

    ];
}