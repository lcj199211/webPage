<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 10:54
 */
namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class BaseModel extends Model
{
    //开启软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';

}