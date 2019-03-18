<?php

namespace app\index\controller;

use think\Controller;
use service\FileService;
use think\Db;

class Common extends Controller {

//    protected $where = array('status' => 1, 'is_deleted' => 0);
    public $member = 'store_member';
    public $buy = 'store_buy';
    public $tmall = 'store_tmall';
    public $platform = 'store_platform';
    public $cate = 'store_cate';
    public $district = 'store_district';
    public $consultant = 'system_user';
    public $news_cate = 'news_cate';
    public $article = 'news_article';
    public $interview = 'news_interview';
    public $user = 'system_user';
    public $banner = 'banner';
    public $problem_cate = 'problem_cate';
    public $news_problem = 'news_problem';
    public $page = 'single_page';
    public $problem = 'news_problem';
    
    public function initialize() {
       //菜单栏
        $lists = Db::name('list')->select();
        $this->assign('lists',$lists);
        //合作伙伴
        $partners = Db::name('partner')->select();
        $this->assign('partners',$partners);
        //底部管我们
        $gywms = Db::name('banner')->where('status',2)->select();
        $this->assign('gywms',$gywms);
        $helps = Db::name('banner')->where('status',3)->select();
        $this->assign('helps',$helps);
        $articles = Db::name('new')->order('id desc')->limit(5)->select();
        $this->assign('articles',$articles);
        //手机型号
        $phone = Db::name('phone_pai')->select();
        $this->assign('phone',$phone);
        //手机模型

    }

    public function is_header(){
         $act = input('post.act');
         if($act == 'brands'){
             $phone = Db::name('phone_pai')->field('id ,pai')->select();
             $arr = json_encode($phone);
             echo $arr;
             exit();
         }

    }
}
