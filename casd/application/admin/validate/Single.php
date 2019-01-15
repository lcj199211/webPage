<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 16:53
 */

namespace app\admin\validate;


class Single extends BaseValidate
{
    protected $rule = [
        'title' => 'require|max:100',
        'subtitle' => 'require|min:3',
        'desc' => 'require|max:250'
    ];
    protected $message = [
        'title.max' => '标题最大不能超过100个字符',
        'title.require' => '标题不能为空',
        'subtitle.require' => '副标题不能为空',
        'desc.require' => '单页描述不能为空',
        'subtitle.min' => '副标题最小3个字符',
        'desc.max' => '单页描述最大不能超过250个字符'
    ];
    protected $scene = [
        'editData'  =>  ['name'=>'require|max:5']
    ];
}