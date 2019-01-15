<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:35
 */

namespace app\admin\validate;


class PictureList extends BaseValidate
{
    protected $rule = [
        'title' => 'require',
        'desc' => 'require|max:250',
        'img_id'=>'require'
    ];
    protected $message = [
        //'title.max' => '标题最大不能超过100个字符',
        'title.require' => '名称不能为空',
        'desc.require' => '描述不能为空',
        'desc.max' => '描述最大不能超过250个字符',
        'img_id.require'=>'请上传图片'
    ];
    protected $scene = [

    ];
}