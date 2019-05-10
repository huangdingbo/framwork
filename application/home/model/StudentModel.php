<?php
/**
 * Created by PhpStorm.
 * User: peter_zhu
 * Date: 2017/9/29
 * Time: 下午7:05
 */

class StudentModel extends QueryBuild
{
    public function getData(){
        $list = (new QueryBuild())
            ->select('*')
            ->from('student')
            ->all();

        return $list;
    }
}