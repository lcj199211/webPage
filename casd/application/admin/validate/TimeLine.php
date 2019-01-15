<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 16:17
 */

namespace app\admin\validate;


class TimeLine extends BaseValidate
{
    protected $rule = [
        'title' => 'require',
        'desc' => 'require',
        'subtitle'=>'require'
    ];
    protected $message = [
        //'title.max' => '标题最大不能超过100个字符',
        'title.require' => '标题不能为空',
        'desc.require' => '描述不能为空',
        'subtitle.require'=>'副标题不能为空'
    ];
    protected $scene = [

    ];
}