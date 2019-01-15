<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 16:53
 */

namespace app\admin\validate;


class Category extends BaseValidate
{
    protected $rule = [
        'name' => 'unique:category|require|max:5',
        'keywords' => 'require|max:50',
        'desc' => 'require|max:200'
    ];
    protected $message = [
        'name.max' => '栏目名称最大不能超过5个字符',
        'name.require' => '栏目名称不能为空',
        'name.unique' => '栏目名称不能重复',
        'keywords.require' => '栏目关键词不能为空',
        'desc.require' => '栏目描述不能为空',
        'keywords.max' => '栏目关键词最大不能超过50个字符',
        'desc.max' => '栏目描述最大不能超过200个字符'
    ];
    protected $scene = [
        'editData'  =>  ['name'=>'require|max:5']
    ];
}