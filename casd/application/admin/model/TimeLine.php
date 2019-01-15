<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 16:17
 */

namespace app\admin\model;


class TimeLine extends BaseModel
{
    //添加数据
    public function addTimeLineRes($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有数据并分页
    public function getTimeLine($page,$limit){
        $count=$this->count('id');
        $result = $this->page($page,$limit)->select();
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
    public function getTimeLineData($id){

        $result = $this->where('id',$id)->find();

        return $result;

    }

    //检测当前提交的栏目id是否存在所属内容
    public function verificationCategoryID($category_id){
        $result = $this->where('category_id',$category_id)->field('id')->find();
        return $result;
    }

    //修改

    public function modifyTimeLineData($data){

        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }
}