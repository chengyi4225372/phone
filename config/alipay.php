<?php

return [
    /* 支付宝设置 */
    // 收款账号邮箱
    'email' => 'wuchengyx@126.com',
    // 加密key，开通支付宝账户后给予
    'key' => 'g59z9x8i7vdt5i0y7qkg5encrz0bu2af',
    // 合作者ID，支付宝有该配置，开通易宝账户后给予
    'partner' => '2088002972721064',
    //收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
    'seller_id' => '2088002972721064',
    //签名方式
    'sign_type' => strtoupper('MD5'),
    //字符编码格式 目前支持utf-8
    'input_charset' => strtolower('utf-8'),
    // 产品类型，无需修改
    'service' => 'create_direct_pay_by_user',
    // 支付类型 ，无需修改
    'payment_type' => '1',
    'cacert' => '/static/index/alipay/cacert.pem',
//            "qr_pay_mode" => 1, //开启扫码支付
//            "qrcode_width" => 200,//二维码宽度
];
