<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27
 * Time: 16:58
 */

namespace app\admin\model;


class Single extends BaseModel
{
//    public function item(){
//        return $this->hasOne('Category','id','category_id')->field('id,name');
//    }
    //添加数据
    public function addSingle($data)
    {
        $result = self::save($data);
        return $result;
    }

    //获取所有单页数据并分页
    public function getSingleData($page,$limit){
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

    //检测当前提交的栏目id是否存在所属单页
    public function verificationCategoryID($category_id){
        $result = $this->where('category_id',$category_id)->field('id')->find();
        return $result;
    }

    //根据当前单页id获取单页数据
    public function getOneSingleData($id){

        $result = $this->where('id',$id)->find();

        return $result;
    }

    //修改单页

    public function modifySingleData($data){
        $result = self::save($data,['id'=>$data['id']]);
        return $result;
    }

    //删除当前单页和所有图片
    public function delSingleData($id){
        $data = self::where('id',$id)->value('content');
        $imgs = getImgs($data);
        $result = self::destroy($id,true);
        if ($imgs){

            if ($result){
                foreach ($imgs as $k=>$v){
                    $url = strstr($v,'/upload');
                    @unlink($_SERVER['DOCUMENT_ROOT'].$url);
                    Images::where('url',$url)->delete();
                }
            }

            return true;
        }
        return true;
    }
}