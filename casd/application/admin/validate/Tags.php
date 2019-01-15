<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 11:12
 */

namespace app\admin\validate;


class Tags extends BaseValidate
{
    protected $rule = [
        'title' => 'require',
        'subtitle' => 'require'
    ];
    protected $message = [
        //'title.max' => '标题最大不能超过100个字符',
        'title.require' => '名称不能为空',
        'subtitle.require' => '副标题不能为空'
    ];
    protected $scene = [

    ];
}