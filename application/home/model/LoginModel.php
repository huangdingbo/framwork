<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 2019/2/22
 * Time: 19:09
 */

class LoginModel extends QueryBuild
{
    public function validate($email,$password){
        $result = (new QueryBuild())
            ->select('*')
            ->from('user')
            ->where("email="."'".$email."'"." and password="."'".$password."'")
            ->one();

        return $result;
    }
}