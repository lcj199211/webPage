<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 11:12
 */

namespace app\admin\model;


class Tags extends BaseModel
{
    protected $field = true;


    //添加数据
    public function addTagsRes($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有数据并分页
    public function getTags($page,$limit){
        $count=$this->count('id');
        $result = $this->page($page,$limit)->order('category_id desc')->select();
        //return $result;
        foreach ($result as $k=>$v){
            if ($v['category_id'] == 0){
                $v['name']= '未选择';
            }else{
                $nameData = Category::getCategoryID($v['category_id']);
                $v['name'] = $nameData['name'];
            }
        }
        $arr = [
            'count'=>$count,
            'data'=>$result
        ];
        return $arr;
    }

    //根据当前id获取数据
    public function getTagsData($id){

        $result = $this->where('id',$id)->find();
        return $result;
    }

    //修改

    public function modifyTagsData($data){

        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

    //删除当前内容
    public function delTagsData($id){
        $result = self::destroy($id,true);
        return $result;
    }

    //根据type来查询相关数据
    public function getTypeData($type){
        $result = $this->where('type','=',$type)->select();
        return $result;
    }

    //根据类型绑定的tagid查询所属栏目
    public static function getTagID($tagID){
        $result = self::where('id',$tagID)->field('title')->find();
        return $result;
    }

}