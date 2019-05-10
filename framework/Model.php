<?php
/**
 * 公共模型类
 * 完成数据为连接和一些公共方法
 */

class Model
{
    protected $db = null;  //数据库连接对象

    public $data = null;  //当前表中数据

    public function __construct($dataBase = '')
    {   
        if ($dataBase) {
            $GLOBALS['config']['db']['dbname'] = $dataBase;
        }
       
        $this->init();  //完成数据库连接
    }

    private function init()
    {
         // var_dump($GLOBALS['config']['db']);
        //用自定义连接配置覆盖默认参数
        $this->db = Db::getInstance($GLOBALS['config']['db']);
    }


}