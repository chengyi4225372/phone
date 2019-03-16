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
       if($act == 'brands'){
           $data = array(
                   'id'=>'1',
                   'name'=>'phone',
           );
           echo json_encode($data);
           exit();
       }else if($act == 'models' && $brand != '' ){
           $data = array(
               '0'=>'phone11',
               '1'=>'sanxing'
           );
           echo json_encode($data);
           exit();
       }else{
           $data = ['0'=>'111','1'=>'222'];
           echo json_encode($data);
           exit();
       }
    }


}