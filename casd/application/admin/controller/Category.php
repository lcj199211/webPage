<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/6
 * Time: 14:26
 */

namespace app\admin\controller;

class Category extends Base
{
    public function index(){

        return view('category');
    }

    public function add(){
        $categoryM = model('Category');
        $categoryRes = $categoryM->getTopCategory();
        $this->assign('categoryRes',$categoryRes);
        return view('add');
    }

    public function edit($id){
        $categoryRes = model('Category')->getEditCategory($id);
        $categorys = model('Category')->getTopCategory();
        $this->assign([
            'categoryRes'=>$categoryRes,
            'categorys'=>$categorys
        ]);
        return view('edit');
    }

    //请求导航数据
    public function getCategoryList(){
        $result = model('Category')->getCategory();

        return $result;

    }

    //添加
    public function addData(){
        if (request()->isPost()){
            $data = input('post.');
            $validate = validate('category');
            if(!$validate->check($data)) {
                return $validate->getError();
            }
            $cateM = new \app\admin\model\Category();
            $result = $cateM->addCate($data);
            return $result;
        }
        return '非法请求';
    }
    //修改
    public function editData(){
        if (request()->isPost()){
            $data = input('post.');
            $validate = $this->validate($data,'category.editData');
            if(true !== $validate) {
                return $validate;
            }
            $cateM = new \app\admin\model\Category();
            $result = $cateM->editCate($data);
            return $result;
        }
        return '非法请求';
    }

    //删除
    public function del($id){
        $result = \app\admin\model\Category::destroy($id);
        return $result;
    }


}