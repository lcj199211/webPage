<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 16:58
 */

namespace app\admin\model;


class Recruit extends BaseModel
{
//    public function item(){
//        return $this->hasOne('tag','id','tag_id')->field('id,name');
//    }
    //添加数据
    public function addRecruit($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有数据并分页
    public function getRecruitData($page,$limit){
        $count=$this->count('id');
        $result = $this->page($page,$limit)->select();
        foreach ($result as $k=>$v){
            if ($v['tag_id'] == 0){
                $v['name']= '未选择';
            }else{
                $nameData = Tags::getTagID($v['tag_id']);
                $v['name'] = $nameData['title'];
            }
        }
        $arr = [
            'count'=>$count,
            'data'=>$result
        ];
        return $arr;
    }

    //检测当前提交的tagid是否存在所属详情
    public function verificationTagsID($tag_id){
        $result = $this->where('tag_id',$tag_id)->field('id')->find();
        return $result;
    }

    //根据当前id获取详情数据
    public function getOneRecruitData($id){

        $result = $this->where('id',$id)->find();

        return $result;
    }

    //修改

    public function modifyRecruitData($data){
        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

    //删除当前招聘
    public function delRecruitData($id){
        $result = self::destroy($id,true);

        return $result;
    }
}