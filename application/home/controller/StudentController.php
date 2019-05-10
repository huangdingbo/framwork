<?php
/**
 * 学生模块控制器类
 * 学生管理模块通常包括:查询,更新,添加,删除
 * 模型根据数据表建立,控制器根据模块创建
 * 所以一个控制器要完成一个模块的功能
 */

class StudentController extends Controller
{

    public function indexAction(){

        $model = new StudentModel();

        $data = $model->getData();

       return $this->render('student_list',[
           'data'=>$data
       ]);
    }
}
