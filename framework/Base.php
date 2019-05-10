<?php
/**
 * 框架基础类
 * 完成以下功能:
 * 1.读取配置 2.自动加载 3.请求分发
 */

class Base
{
    //调用run方法即可完成所有操作
    public function run()
    {
        $this -> loadConfig();  //加载配置
        $this -> registerAutoLoad(); //注册自动加载
        $this -> getRequestParams(); //获取请求参数
        $this -> dispatch();  //请求分发
    }

    private function loadConfig()
    {
        //使用全局变量保存配置
        $GLOBALS['config'] = require './application/config/config.php';
    }

    /**
     * 用户自定义自动加载方法
     * @param $className
     */
    public function userAutoload($className)
    {
        //定义基本类列表
        $baseClass = [
            'Model' => './framework/Model.php',
            'Db' => './framework/Db.php',
            'QueryBuild' => './framework/QueryBuild.php',
            'Controller' => './framework/Controller.php',
        ];
        //依次判断基础类,模型类,控制器类
        if (isset($baseClass[$className])) {
            require $baseClass[$className];  //加载模型基类
        } elseif (substr($className,-5)=='Model') {
            require './application/'.PLATFORM.'/model/'.$className.'.php';
        } elseif (substr($className,-10)=='Controller') {
            require './application/'.PLATFORM.'/controller/'.$className.'.php';
        }

    }

    /**
     * 注册自动加载方法
     */
    private function registerAutoLoad()
    {
        spl_autoload_register([$this, 'userAutoload']);
    }

    /**
     * 获取请求参数
     */
    private function getRequestParams()
    {
        //当前平台
        $defPlate = $GLOBALS['config']['app']['default_platform'];
        $p = isset($_GET['p'])?$_GET['p']:$defPlate;
        define('PLATFORM', $p);

        //当前控制器
        $defController = $GLOBALS['config'][PLATFORM]['default_controller'];
        $c = isset($_GET['c'])?ucwords($_GET['c']):$defController;
        define('CONTROLLER', $c);

        //当前方法
        $defAction = $GLOBALS['config'][PLATFORM]['default_action'];
        $a = isset($_GET['a'])?ucwords($_GET['a']):$defAction;
        define('ACTION', $a);
    }

    private function dispatch()
    {
        //实例化控制器
        $controllerName = CONTROLLER.'Controller';
        $controller = new $controllerName();

        //调用当前方法
        $actionName = ACTION.'Action';
        $controller -> $actionName();
    }


}