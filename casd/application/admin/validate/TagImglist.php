<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:35
 */

namespace app\admin\validate;


class TagImglist extends BaseValidate
{
    protected $rule = [
        'title' => 'require',
        'img_id'=>'require'
    ];
    protected $message = [
        //'title.max' => '标题最大不能超过100个字符',
        'title.require' => '名称不能为空',
        'img_id.require'=>'请上传图片'
    ];
    protected $scene = [

    ];
}