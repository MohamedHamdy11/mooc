<?php
/**
 * Created by PhpStorm.
 * User: محمد حمدى
 * Date: 7/22/20
 * Time: 10:42 AM
 */

class usersController extends controller
{

    private $usersModel;


    public function __construct($usersModel)
    {
        $this->usersModel = $usersModel;
    }


    public function usersLogin()
    {

        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = hashPasswords($_POST['password']);

            if($this->usersModel->login($username,$password))
            {
                $_SESSION['user'] = $this->usersModel->getUserData();
                echo 'welcome user';
            }
            else
            {
                $this->setControllerErrors($this->usersModel->getErrors());
                include(VIEWS.'/front/login.html');
            }

        }
        else
        {
            //form
            include(VIEWS.'/front/login.html');
        }
    }
}