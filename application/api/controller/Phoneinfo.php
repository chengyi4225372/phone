<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 14:58
 */
namespace  app\api\controller;

use think\Controller;
use think\Db;

class Phoneinfo extends Controller
{
    public function index(){
       $act = input('post.act');
       $brand =input('post.brand');
       $model =input('post.model');
       $state = input('post.state');
     if($act =='brands'){  //品牌
         $phone = Db::name('phone_pai')->field('id ,pai')->select();
         $phone = json_encode($phone);
         echo $phone;
         exit();
     }else if($act =='models' && $brand !=''){ //品牌对应型号
         $pid   = Db::name('phone_pai')->where('pai',$brand)->value('id'); //查询品牌id
         $phone = Db::name('phone_models')->where('pid',$pid)->field('id,models')->select();
         echo json_encode($phone);
         exit();
     }else if($act =='issues'&& $brand !=='' || $model!=''){ //诊断类型
           $zhen = Db::name('zhen_title')->field('id ,names')->order('sort desc')->limit(3)->select();
           $zhen = json_encode($zhen);
           echo $zhen;
           exit();
     }else if($act =='state'){ //地区
         $state = Db::name('state')->field('id,names')->select();
         $state =json_encode($state);
         echo $state;
         exit();
     } else if($act== 'stores' && $state!=''){
           $sid = Db::name('state')->where('names',$state)->value('id');
           $store = Db::name('store')->where('sid',$sid)->select();
           $store = json_encode($store);
           echo $store;
           exit();
     }else {
        echo json_encode('请求数据异常！');
        exit();
     }



    }


}