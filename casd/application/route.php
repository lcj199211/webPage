<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//后台路由
Route::get('admin/index', 'admin/index/index');
Route::get('admin/login', 'admin/login/index');
Route::get('admin/edit/:id', 'admin/admin/edit');

Route::rule('admin/picture','admin/base/picture','POST');
Route::rule('admin/delImage','admin/base/delImage','POST');
Route::rule('admin/delTextImgs','admin/base/delTextImgs','POST');

Route::get('admin/category', 'admin/category/index');
Route::get('admin/category/edit/:id', 'admin/Category/edit');
Route::get('admin/category/del/:id', 'admin/Category/del');
Route::get('admin/getCategory', 'admin/category/getCategoryList');

Route::get('admin/single', 'admin/single/index');
Route::get('admin/getSingle', 'admin/single/getSingleList');
Route::get('admin/single/edit/:id', 'admin/single/edit');
Route::get('admin/single/del/:id', 'admin/single/del');

Route::get('admin/pictureList', 'admin/pictureList/index');
Route::get('admin/getPictureList', 'admin/pictureList/getPictureList');
Route::get('admin/pictureList/edit/:id', 'admin/pictureList/edit');
Route::get('admin/pictureList/del/:id', 'admin/pictureList/del');

Route::get('admin/timeLine', 'admin/timeLine/index');
Route::get('admin/getTimeLine', 'admin/timeLine/getTimeLine');
Route::get('admin/timeLine/edit/:id', 'admin/TimeLine/edit');
Route::get('admin/timeLine/del/:id', 'admin/TimeLine/del');

Route::get('admin/tags', 'admin/tags/index');
Route::get('admin/gettags', 'admin/tags/getTags');
Route::get('admin/tags/edit/:id', 'admin/tags/edit');
Route::get('admin/tags/del/:id', 'admin/tags/del');

Route::get('admin/details', 'admin/Details/index');
Route::get('admin/getDetails', 'admin/Details/getDetails');
Route::get('admin/details/edit/:id', 'admin/Details/edit');
Route::get('admin/details/del/:id', 'admin/Details/del');

Route::get('admin/TagImgList', 'admin/TagImgList/index');
Route::get('admin/getTagImgList', 'admin/TagImgList/getTagImgList');
Route::get('admin/TagImgList/edit/:id', 'admin/TagImgList/edit');
Route::get('admin/TagImgList/del/:id', 'admin/TagImgList/del');

Route::get('admin/News', 'admin/News/index');
Route::get('admin/getNewsList', 'admin/News/getNewsList');
Route::get('admin/News/edit/:id', 'admin/News/edit');
Route::get('admin/News/del/:id', 'admin/News/del');

Route::get('admin/recruit', 'admin/Recruit/index');
Route::get('admin/getRecruitList', 'admin/Recruit/getRecruitList');
Route::get('admin/recruit/edit/:id', 'admin/Recruit/edit');
Route::get('admin/recruit/del/:id', 'admin/Recruit/del');

Route::get('admin/banner', 'admin/Banner/index');
Route::get('admin/getBannerList', 'admin/Banner/getBannerList');
Route::get('admin/banner/edit/:id', 'admin/Banner/edit');
Route::get('admin/banner/del/:id', 'admin/Banner/del');

Route::get('admin/homeText', 'admin/HomeText/index');
Route::get('admin/getHomeTextList', 'admin/HomeText/getHomeTextList');
Route::get('admin/homeText/edit/:id', 'admin/HomeText/edit');
Route::get('admin/homeText/del/:id', 'admin/HomeText/del');

Route::get('admin/homeImg', 'admin/homeImg/index');
Route::get('admin/system', 'admin/system/index');
//前台

Route::get('/','index');

Route::get('/single', 'index/single/index');

Route::get('/tag_list', 'index/TagList/index');

Route::get('/article', 'index/article/index');

Route::get('/img_list', 'index/imgList/index');

Route::get('/course', 'index/course/index');

Route::post('index/sendMail', 'index/TagList/sendMail');