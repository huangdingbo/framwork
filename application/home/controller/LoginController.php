<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 2019/2/22
 * Time: 18:58
 */

class LoginController extends Controller
{
    public function indexAction(){

        if (@$_POST['email'] != '' && @$_POST['password'] != ''){

           $model = new LoginModel();

           $result = $model->validate($_POST['email'],$_POST['password']);

           if ($result){
               $this->redirect(['p'=>'home','c'=>'index','a'=>'index'],"username={$result['username']}");
           }
        }

        return $this->render('login');

    }
}