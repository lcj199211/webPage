<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 提样式版本号
 */
function autoVersion($file) {
    $url = config('view_replace_str');
    foreach ($url as $k=>$v){
        $url = $v;
    }
    $file = $url.$file;
    if( file_exists($_SERVER['DOCUMENT_ROOT'].$file) ) {
        $ver = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
    } else {
        $ver = 1;
    }
    return $file . '?v=' . $ver;
}

/**
 * 提取字符串中图片url地址
 * @param type $str
 * @return type
 */
function getImgs($str) {
    //$reg = '/((http|https):\/\/)+(\w+\.)+(\w+)[\w\/\.\-]*(jpg|gif|png)/';
    $reg ="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
    $matches = array();
    preg_match_all($reg, $str, $matches);
//    foreach ($matches[0] as $value) {
//        $data[] = get_file($value);
//    }
    return $matches[1];
}