<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 9:35
 */

namespace app\admin\validate;


class Banner extends BaseValidate
{
    protected $rule = [
        'title' => 'require',
        'img_id'=>'require',
        'link'=>'url'
    ];
    protected $message = [
        'title.require' => '标题不能为空',
        'img_id.require'=>'请上传图片',
        'link.url'=>'跳转链接不是有效地址'
    ];
    protected $scene = [

    ];
}