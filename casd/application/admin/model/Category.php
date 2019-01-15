<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 16:22
 */

namespace app\admin\model;

class Category extends BaseModel
{
    protected $field = true;

    public function getTypeAttr($value)
    {
        $status = [1=>'单页栏目',2=>'列表栏目',3=>'图片列表',4=>'下拉导航',5=>'普通导航',6=>'时间线'];
        return $status[$value];
    }


    public function addCate($data)
    {
        $data['keywords'] = str_replace('，', ',', $data['keywords']);
        $result = self::save($data);
        return $result;
    }

    public function editCate($data)
    {
        $data['keywords'] = str_replace('，', ',', $data['keywords']);
        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

    public function stateControl($data)
    {
        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }


    //获取顶级导航
    public function getTopCategory()
    {

        $result = self::where([
            'pid'=>'0',
            'type'=>'4'
        ])->field('id,name')->order('id asc')->select();

        return $result;
    }

    //获取所有导航

    public function getCategory()
    {
        $result = $this->select();
        return $this->sort($result);
    }

    //导航排序
    public function sort($data, $pid = 0)
    {
        static $arr = array();
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                if ($v['pid'] == 0){
                    $v['level'] = '顶级栏目';
                }else{
                    $v['level'] = '二级栏目';
                    $v['name'] = '|----'.$v['name'];
                }

                $this->sort($data, $v['id']);
            }
        }
        return $arr;
    }
    //根据id查询当前导航栏
    public function getEditCategory($id){
        $result = $this->find($id);
        return $result;
    }

    //根据type来查询相关数据
    public function getTypeData($type){
        $result = $this->where('type','=',$type)->select();
        return $result;
    }

    //根据类型绑定栏目的id查询所属栏目
    public static function getCategoryID($categoryID){
        $result = self::where('id',$categoryID)->field('name')->find();
        return $result;
    }
}