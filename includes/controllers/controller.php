<?php


class controller
{

    public function checkPermission($groupId)
    {
        if(isset($_SESSION['user']['user_group'])&&  $_SESSION['user']['user_group'] != $groupId)
        {

            if($_SESSION['user']['user_group'] == 1)  //admin
            {
                header('LOCATION:../admin');
            }
            elseif($_SESSION['user']['user_group'] == 2)  //instructor
            {
                header('LOCATION:../instructor');
            }
            elseif($_SESSION['user']['user_group'] == 3)  //student
            {
                header('LOCATION:../student');
            }
            exit;
        }
        else
        {

            if(!isset($_SESSION['user']['user_group']))
            {
                header('LOCATION:login.php');
                exit;
            }

        }


    }


    public function setControllerErrors($errors)
    {
        $_SESSION['errors'] = $errors;
    }


    public function getControllerErrors()
    {
        if(isset($_SESSION['errors']) && count($_SESSION['errors'])>0)
        {
            $errors = $_SESSION['errors'];
            $HTMLerror = '<ul>';
            foreach($errors as $error)
            {
                $HTMLerror .= "<li>$error</li>";
            }
            $HTMLerror .= '</ul>';

            $_SESSION['errors'] = [];
            return $HTMLerror;
        }

        return null;
    }

}