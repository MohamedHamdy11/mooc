<?php

class coursesLessonsCommentsModel extends model
{

    /**
     * add comment
     * @param $dataArray
     * @return bool
     */
    public function addComment($dataArray)
    {
        if(System::Get('db')->Insert('courses_lessons_comments',$dataArray))
            return true;

        $this->setError(' error adding comment , '.System::Get('db')->getDBErrors());
        return false;
    }


    /**
     * update comment by id
     * @param $id
     * @param $dataArray
     * @return bool
     */
    public function updateComment($id,$dataArray)
    {
        if(System::Get('db')->Update('courses_lessons_comments',$dataArray,"WHERE `comment_id`=$id"))
            return true;

        $this->setError(' error updateing comment , '.System::Get('db')->getDBErrors());
        return false;
    }


    /**
     * delete comment by id
     * @param $id
     * @return bool
     */
    public function deleteComment($id)
    {
        if(System::Get('db')->Delete('courses_lessons_comments',"WHERE `comment_id`=$id"))
            return true;

        $this->setError(' error delete comment , '.System::Get('db')->getDBErrors());
        return false;
    }


    /**
     * get all comments
     * @param string $extra
     * @return array
     */
    public function getComments($extra='')
    {
        System::Get('db')->Execute("SELECT `courses_lessons_comments`.*,`users`.`username` FROM `courses_lessons_comments` LEFT JOIN `users` ON `courses_lessons_comments`.`comment_user`=`users`.`user_id` $extra");

        if(System::Get('db')->AffectedRows()>0)
            return System::Get('db')->GetRows();

        return [];
    }


    /**
     * get comment by id
     * @param $id
     * @return array|mixed
     */
    public function getComment($id)
    {
        $lessons = $this->getComments("WHERE `courses_lessons_comments`.`comment_id`=$id");

        if(count($lessons)>0)
            return $lessons[0];

        return [];
    }

}