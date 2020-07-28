<?php
/**
 * Created by PhpStorm.
 * User: محمد حمدى
 * Date: 7/12/20
 * Time: 10:56 AM
 */

class usersModel extends model
{

    /**
     * add new user
     * @param $dataArray
     * @return bool
     */
    public function addUser($dataArray)
    {
        if(System::Get('db')->Insert('users',$dataArray))
            return true;

        $this->setError(' error adding user , '.System::Get('db')->getDBErrors());
        return false;

    }

    /**
     * update user
     * @param $id
     * @param $dataArray
     * @return bool
     */
    public function updateUser($id,$dataArray)
    {
        if(System::Get('db')->Update('users',$dataArray,"WHERE `user_id`=$id"))
            return true;

        $this->setError(' error updateing user , '.System::Get('db')->getDBErrors());
        return false;


    }

    /**
     * delete user
     * @param $id
     * @return bool
     */
    public function deleteUser($id)
    {
        if(System::Get('db')->Delete('users',"WHERE `user_id`=$id"))
            return true;

        $this->setError(' error delete user , '.System::Get('db')->getDBErrors());
        return false;

    }

    /**
     * get all users
     * @param string $extra
     * @return array
     */

    public function getUsers($extra='')
    {
        System::Get('db')->Execute("SELECT `users`.*,`users_groups`.`group_name` FROM `users` LEFT JOIN `users_groups` ON `users`.`user_group` = `users_groups`.`group_id` $extra");
        if(System::Get('db')->AffectedRows()>0)
            return System::Get('db')->GetRows();

        System::Get('db')->getDBErrors();
        return [];
    }

    /**
     * get user by id
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        $users = $this->getUsers("WHERE `user_id`=$id");

        return $users[0];

    }


    /**
     * get Users By Group
     * @param $groupId
     * @param string $extra
     * @return array
     */
    public function getUsersByGroup($groupId,$extra='')
    {
        return $this->getUsers("WHERE `user_id`=$groupId $extra");

    }

    /**
     * search users by keyword
     * @param $keyword
     * @return array
     */
    public function searchUsers($keyword)
    {
        return $this->getUsers("WHERE `users`.`username` LIKE '%$keyword%' OR `users`.`email` LIKE '%$keyword%'");

    }


    public function login($username,$password)
    {
        $users= $this->getUsers("WHERE `users`.`username`='$username' AND `users`.`password`='$password' LIMIT 1");

        if(count($users)>0)
        {
            $this->userData = $users[0];
            return true;
        }

        $this->setError('invalid username or password');
        return false;
    }


    public function getUserData()
    {
        return $this->userData;
    }




}