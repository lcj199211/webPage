<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/22
 * Time: 11:11
 */

namespace app\admin\validate;


class HomeImg extends BaseValidate
{
    protected $rule = [
        'img_id' => 'require',
        'url' => 'url'
    ];
    protected $message = [
        'img_id.require' => '请上传图片',
        'url.url' => '不是有效的url'
    ];
    protected $scene = [

    ];
}