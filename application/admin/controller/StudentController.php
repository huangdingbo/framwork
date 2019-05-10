<?php
/**
 * 学生模块控制器类
 * 学生管理模块通常包括:查询,更新,添加,删除
 * 模型根据数据表建立,控制器根据模块创建
 * 所以一个控制器要完成一个模块的功能
 */

class StudentController
{
    public function listAllAction()
    {
        //实例化模型,获取数据

        $data = (new QueryBuild())
            ->select('*')
            ->from('student')
            ->all();
//        print_r($data);return;
        //加载视图文件
        require './application/home/view/student_list.php';
    }

    public function infoAction($id=1)
    {
        $id = isset($_GET['id'])?$_GET['id']:$id;
        //实例化模型,获取数据
        $stu = new StudentModel();
        $data = $stu -> get($id);

        //加载视图
        require './application/home/view/student_info.php';
    }
}
