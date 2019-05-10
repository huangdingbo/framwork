<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 2019/2/22
 * Time: 19:38
 */

class RegisterController extends Controller
{
    public function indexAction(){
        if (@$_POST['username'] && @$_POST['password'] && @$_POST['email']){

            $model = new RegisterModel();

            $result = $model->insertData($_POST['username'],$_POST['password'],$_POST['email']);

            if ($result){
                return $this->redirect(['p'=>'home','c'=>'login','a'=>'index']);
            }
        }

        return $this->render('register');
    }
}