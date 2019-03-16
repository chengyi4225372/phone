<?php

namespace service;

use think\Db;
use think\db\Query;

class DetailService {

    private static function member() {
        return Db::name('store_member');
    }

    private static function finance_detail() {
        return Db::name('finance_detail');
    }

    public static function write($type, $price, $order_no, $uid, $excuse) {
        $data['order_no'] = $order_no;
        switch ($type) {
            case 1:
                $data['income'] = $price;
                $data['expenditure'] = 0;
                break;
            case 2:
                $data['income'] = 0;
                $data['expenditure'] = $price;
                break;
        }
        $data['balance'] = self::member()->where('id', '=', $uid)->value('amount');
        $data['uid'] = $uid;
        $data['create_at'] = time();
        $data['excuse'] = $excuse;
        return self::finance_detail()->insert($data) !== false;
    }

}
