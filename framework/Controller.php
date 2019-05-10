<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 2019/2/22
 * Time: 17:08
 */
class Controller{
    //加载视图
    protected function render($view,$data=[]){
        extract($data);

        //当前平台

        $defPlate = $GLOBALS['config']['app']['default_platform'];

        $p = isset($_GET['p'])?$_GET['p']:$defPlate;

        require "./application/".$p."/view/"."$view".".php";
    }

    //跳转
    /*
     *  $this->redirect(['p'=>'home','c'=>'site','a'=>'index']);
     */
    protected function redirect($url,$str=''){
        //当前平台
        $defPlate = $GLOBALS['config']['app']['default_platform'];
        $p = isset($url['p'])?$url['p']:$defPlate;
        $c = $url['c'];
        $a = $url['a'];
        $url = $_SERVER['SCRIPT_NAME']."?p={$p}&c={$c}&a={$a}&$str";
        header("location:{$url}");
    }
}