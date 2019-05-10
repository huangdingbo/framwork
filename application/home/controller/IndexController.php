<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 2019/2/22
 * Time: 18:45
 */

class IndexController extends Controller
{
    public function indexAction(){
        $username = $_GET['username'];

        return $this->render('index',[
            'username' => $username,
        ]);
    }
}