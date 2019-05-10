<?php
/**
 * 应用配置文件
 * 使用数组格式
 */
return [
    //数据库配置
    'db' => [
        'user' => 'root',  //用户名称
        'pass' => '123',  //用户密码
        'dbname'=>'edu',   //默认数据库名称
    ],

    //整体配置
    'app' => [
        'default_platform'=> 'home', //默认分组
    ],

    //前台配置
    'home' => [
        'default_controller' => 'Site', //默认控制器
        'default_action' => 'index', //默认操作方法
    ],

    //后台配置
    'admin' => [
        'default_controller' => 'Site', //默认控制器
        'default_action' => 'index', //默认操作方法
    ],

];

