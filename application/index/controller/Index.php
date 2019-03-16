<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 10:01
 */

namespace app\index\controller;

use think\Db;
use app\index\controller\Common;
class Index extends Common {


    //首页
    public function index(){
        return $this->view->fetch();
    }

    //在线 报价
    public function online_quote(){
        return $this->view->fetch();
    }

/* todo 自我诊断     */
   //自我诊断
    public function self_diagnosis(){
        return $this->view->fetch();
    }

    //新闻列表
    public function self_diagnosis_list(){
        return $this->view->fetch();
    }

    //新闻详情
    public function self_diagnosis_new(){
        return $this->view->fetch();
    }



}