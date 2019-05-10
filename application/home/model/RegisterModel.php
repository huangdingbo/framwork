<?php
/**
 * Created by PhpStorm.
 * User: huang
 * Date: 2019/2/22
 * Time: 19:49
 */

class RegisterModel extends QueryBuild
{
    public function insertData($username,$password,$email){
        $result = (new QueryBuild())
            ->setTable('user')
            ->addData([
                'username' => $username,
                'password' => $password,
                'email' => $email
            ])
            ->insert();
        if (!$result){
            return false;
        }

        return true;
    }
}