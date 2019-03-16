<?php

namespace app\index\controller;

use think\Db;

    class Indexss extends Common {
    
    public function index() {
        //banner图
        $banners = Db::name('banner')->where('status',1)->order('sort asc,id desc')->select();
        $this->assign('banners',$banners);
        //商品列表
        $good1s = Db::name('goods')->where('lid',3)->order('id desc')->limit(6)->select();
        foreach ($good1s as $k=>$good1){
            $good1s[$k]['cname'] = Db::name('category')->where('id',$good1['cid'])->value('name');
        }
        $good2s = Db::name('goods')->where('lid',4)->order('id desc')->limit(6)->select();
        foreach ($good2s as $k=>$good2){
            $good2s[$k]['cname'] = Db::name('category')->where('id',$good2['cid'])->value('name');
        }
        $good3s = Db::name('goods')->where('lid',5)->order('id desc')->limit(6)->select();
        foreach ($good3s as $k=>$good3){
            $good3s[$k]['cname'] = Db::name('category')->where('id',$good3['cid'])->value('name');
        }
        $good4s = Db::name('goods')->where('lid',6)->order('id desc')->limit(6)->select();
        foreach ($good4s as $k=>$good4){
            $good4s[$k]['cname'] = Db::name('category')->where('id',$good4['cid'])->value('name');
        }
        $this->assign('good1s',$good1s);
        $this->assign('good2s',$good2s);
        $this->assign('good3s',$good3s);
        $this->assign('good4s',$good4s);
        //场地分类
        $category1s = Db::name('category')->where('lid',3)->select();
        $this->assign('category1s',$category1s);
        $category2s = Db::name('category')->where('lid',4)->select();
        $this->assign('category2s',$category2s);
        $category3s = Db::name('category')->where('lid',5)->select();
        $this->assign('category3s',$category3s);
        $category4s = Db::name('category')->where('lid',6)->select();
        $this->assign('category4s',$category4s);

        //服务团队
        $tuanduis = Db::name('tuandui')->select();
        $this->assign('tuanduis',$tuanduis);

        $is_have = 1;
        $this->assign('is_have',$is_have);
        //服务案例
        $anlis = Db::name('anli')->order('id desc')->limit(3)->select();
        $this->assign('anlis',$anlis);
        $this->assign('title',  Db::name('list')->where('id',1)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',1)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',1)->value('description'));
        return $this->fetch();
    }
    public function comintroduce() {
        $listname = Db::name('list')->where('id',2)->value('name');
        $this->assign('listname',$listname);
        $this->assign('title',  Db::name('list')->where('id',2)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',2)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',2)->value('description'));
        return $this->fetch();
    }

    public function tjone() {
        $listname = Db::name('list')->where('id',3)->value('name');
        $this->assign('listname',$listname);
        $goods = Db::name('goods')->where('lid',3)->order('id desc')->paginate(4);
        $this->assign('goods',$goods);
        //场地分类
        $categorys = Db::name('category')->where('lid',3)->select();
        $this->assign('categorys',$categorys);
        $this->assign('title',  Db::name('list')->where('id',3)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',3)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',3)->value('description'));
        return $this->fetch();
    }
    public function tjtwo() {
        $listname = Db::name('list')->where('id',4)->value('name');
        $this->assign('listname',$listname);
        $goods = Db::name('goods')->where('lid',4)->order('id desc')->paginate(4);
        $this->assign('goods',$goods);
         //场地分类
        $categorys = Db::name('category')->where('lid',4)->select();
        $this->assign('categorys',$categorys);
        $this->assign('title',  Db::name('list')->where('id',4)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',4)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',4)->value('description'));
        return $this->fetch();
    }
    public function tjthree() {
        $listname = Db::name('list')->where('id',5)->value('name');
        $this->assign('listname',$listname);
        $goods = Db::name('goods')->where('lid',5)->order('id desc')->paginate(4);
        $this->assign('goods',$goods);
         //场地分类
        $categorys = Db::name('category')->where('lid',5)->select();
        $this->assign('categorys',$categorys);
        $this->assign('title',  Db::name('list')->where('id',5)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',5)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',5)->value('description'));
        return $this->fetch();
    }
    public function tjfour() {
        $listname = Db::name('list')->where('id',6)->value('name');
        $this->assign('listname',$listname);
        $goods = Db::name('goods')->where('lid',6)->order('id desc')->paginate(4);
        $this->assign('goods',$goods);
         //场地分类
        $categorys = Db::name('category')->where('lid',6)->select();
        $this->assign('categorys',$categorys);
        $this->assign('title',  Db::name('list')->where('id',6)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',6)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',6)->value('description'));
        return $this->fetch();
    }
    public function fwteam() {
        $listname = Db::name('list')->where('id',7)->value('name');
        $this->assign('listname',$listname);
        $tuanduis = Db::name('tuandui')->order('sort asc')->paginate(4);
        $this->assign('tuanduis',$tuanduis);
        $this->assign('title',  Db::name('list')->where('id',7)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',7)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',7)->value('description'));
        return $this->fetch();
    }

    public function anli() {
        $listname = Db::name('list')->where('id',8)->value('name');
        $this->assign('listname',$listname);
        $anlis = Db::name('anli')->order('id desc')->paginate(9);
        $this->assign('anlis',$anlis);
        $this->assign('title',  Db::name('list')->where('id',8)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',8)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',8)->value('description'));
        return $this->fetch();
    }

    public function news() {
        $listname = Db::name('list')->where('id',9)->value('name');
        $this->assign('listname',$listname);
        $news = Db::name('new')->order('id desc')->paginate(8);
        $this->assign('news',$news);
        $this->assign('title',  Db::name('list')->where('id',9)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',9)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',9)->value('description'));
        return $this->fetch();
    }

    public function contact() {
        $listname = Db::name('list')->where('id',10)->value('name');
        $this->assign('listname',$listname);
        $this->assign('title',  Db::name('list')->where('id',10)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',10)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',10)->value('description'));
        return $this->fetch();
    }
    public function tjsearch() {
        $lid = $this->request->param('lid');
        $cid = $this->request->param('cid');
        $listname = Db::name('list')->where('id',$lid)->value('name');
        $this->assign('listname',$listname);
        $goods = Db::name('goods')->where('lid',$lid)->where('cid',$cid)->order('id desc')->paginate(4);
        $this->assign('goods',$goods);
        //场地分类
        $categorys = Db::name('category')->where('lid',$lid)->select();
        $this->assign('categorys',$categorys);
        $this->assign('title',  Db::name('list')->where('id',$lid)->value('title'));
        $this->assign('keywords',  Db::name('list')->where('id',$lid)->value('keywords'));
        $this->assign('description',  Db::name('list')->where('id',$lid)->value('description'));
        if($lid == 3){return $this->fetch('tjone');};
        if($lid == 4){return $this->fetch('tjtwo');};
        if($lid == 5){return $this->fetch('tjthree');};
        if($lid == 6){return $this->fetch('tjfour');};
    }
    public function tjdetail() {
        $id = $this->request->param('id');
        $good = Db::name('goods')->where('id',$id)->find();
        $good['banner'] = explode('|', $good['banner']);
        $hots = Db::name('goods')->order('id desc')->limit(5)->select();
        $this->assign('hots',$hots);
        $this->assign('good',$good);
        return $this->fetch();
    }

    public function teamdetail() {
        $id = $this->request->param('id');
        $listname = Db::name('list')->where('id',7)->value('name');
        $this->assign('listname',$listname);
        $team = Db::name('tuandui')->where('id',$id)->find();
        $this->assign('team',$team);
        return $this->fetch();
    }

    public function anlidetail() {
        $id = $this->request->param('id');
        $listname = Db::name('list')->where('id',8)->value('name');
        $this->assign('listname',$listname);
        $anli = Db::name('anli')->where('id',$id)->find();
        $this->assign('anli',$anli);
        $hots = Db::name('goods')->order('id desc')->limit(5)->select();
        $this->assign('hots',$hots);
        return $this->fetch();
    }

    public function newsdetail() {
        $id = $this->request->param('id');
        $listname = Db::name('list')->where('id',9)->value('name');
        $this->assign('listname',$listname);
        $new = Db::name('new')->where('id',$id)->find();
        $this->assign('new',$new);
        return $this->fetch();
    }

    public function dingzhi() {
        return $this->fetch();
    }

    public function savedz() {
        $dingzhi = $_POST;
        $res = Db::name('dingzhi')->insert($dingzhi);
        if($res){
            echo("<script type='text/javascript'> alert('提交成功，客服稍候与您联系！');window.location.href='index';</script>");
        }else{
            echo("<script type='text/javascript'> alert('提交失败，请重新提交！');window.location.href='dingzhi';</script>");
        }
    }
}
