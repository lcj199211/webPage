<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 16:53
 */

namespace app\admin\validate;


class News extends BaseValidate
{
    protected $rule = [
        'title' => 'require|max:300',
        'desc' => 'require|max:250',
        //'img_id'=>'require'
    ];
    protected $message = [
        'title.max' => '标题最大不能超过30个字符',
        'title.require' => '标题不能为空',
        'desc.require' => '描述不能为空',
        //'img_id.require' => '请上传图片',
        'desc.max' => '描述最大不能超过250个字符'
    ];
    protected $scene = [
    ];
}