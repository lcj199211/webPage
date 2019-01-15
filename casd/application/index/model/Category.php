<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 16:22
 */

namespace app\index\model;

class Category extends BaseModel
{
    protected $field = true;//过滤


    //获取所有导航并自动第一级跳转
    public function getCategory()
    {
        $result = $this->where('pid',0)->select();
        foreach ($result as $k=>$v){
            //获取顶级栏目第一级跳转
            if ($v['type'] == 2){
                $result[$k]['tags_id'] = Tags::where('category_id','=',$v['id'])->value('id');
            }

            $children = $this->where('pid',$v['id'])->select();
            //获取二级栏目第一级跳转
            foreach ($children as $k2=>$v2){
                if ($v2['type'] == 2){
                    $children[$k2]['tags_id'] = Tags::where('category_id','=',$v2['id'])->value('id');
                }
            }

            if($children){
                $result[$k]['children']=$children;
            }else{
                $result[$k]['children']=0;
            }
        }

        return $result;
    }

    //获取当前导航位置数据
    public function getCategoryData($category_id){
        $result = self::where('id',$category_id)->find();
        $arr = [];
        if ($result['pid'] != 0){
            $arr[] = self::field('id,name,type,pid')->where('id',$result['pid'])->find();
            $arr[] = $result;
            return $arr;
        }
        return $result;
    }

    //获取当前导航类型
    public function getCategoryType($category_id){
        $result = $this->where('id',$category_id)->value('type');
        return $result;
    }

    //获取属于新闻栏目的id
    public static function getTypeNewsId($category_id){
        $result =self::where('id',$category_id)->value('id');
        return $result;
    }

}