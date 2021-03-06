<?php
/**
 * Created by PhpStorm.
 * User: محمد حمدى
 * Date: 7/12/20
 * Time: 11:25 PM
 */

class coursesCategoriesModel extends model
{

    /**
     * add new category
     * @param $dataArray
     * @return bool
     */
    public function addCategory($dataArray)
    {
        if(System::Get('db')->Insert('courses_categories',$dataArray))
            return true;

        $this->setError(' error adding category , '.System::Get('db')->getDBErrors());
        return false;
    }


    /**
     * update category
     * @param $id
     * @param $dataArray
     * @return bool
     */
    public function updateCategory($id,$dataArray)
    {
        if(System::Get('db')->Update('courses_categories',$dataArray,"WHERE `category_id`=$id"))
            return true;

        $this->setError(' error updateing category , '.System::Get('db')->getDBErrors());
        return false;

    }

    /**
     * delete Category
     * @param $id
     * @return bool
     */
    public function deleteCategory($id)
    {
        if(System::Get('db')->Delete('courses_categories',"WHERE `category_id`=$id "))
            return true;

        $this->setError(' error deleteing category , '.System::Get('db')->getDBErrors());
        return false;

    }


    /**
     * get categories
     * @param string $extra
     * @return array
     */
    public function getCategories($extra='')
    {
        System::Get('db')->Execute("SELECT `courses_categories`.*,`users`.`username` FROM `courses_categories` LEFT JOIN `users` ON `courses_categories`.`created_by`=`users`.`user_id` $extra");

        if(System::Get('db')->AffectedRows()>0)
            return System::Get('db')->GetRows();

        return [];
    }

    /**
     * get category by id
     * @param $id
     * @return array|mixed
     */
    public function getCategory($id)
    {
        $categories = $this->getCategories("WHERE `category_id`=$id ");

        if(count($categories)>0)
            return $categories[0];

        return [];
    }


}