<?php
class adminCoursesController extends controller 
{
    private $coursesModel;

    public function __construct()
    {
        parent::__construct();
        $this->checkPermission(1);
        $this->coursesModel = new coursesModel();
        
    }


    public function getCourses()
    {
        $cid = (isset($_GET['cid']))? (int)$_GET['cid']:0;
        $uid = (isset($_GET['uid']))? (int)$_GET['uid']:0;

        //get courses from db
        if($cid>0)
            $courses = $this->coursesModel->getCoursesByCategoryId($cid);
        elseif($uid>0)
            $courses = $this->coursesModel->getCoursesByInstructorId($uid);
        elseif($cid>0 && $uid>0)
            $courses = $this->coursesModel->getCourses("WHERE `courses`.`course_instructor`=$uid AND `course_category`=$cid ORDER BY `course_id` DESC");
        else
            $courses = $this->coursesModel->getCourses("ORDER BY `course_id` DESC");

        $courses = do_filter('admin_courses_display',$courses);

        //view courses
        include(VIEWS.'/back/admin/header.html');
        include(VIEWS.'/back/admin/menu.html');
        include(VIEWS.'/back/admin/courses.html');
        include(VIEWS.'/back/admin/footer.html');

    }

    /**
     * 1- chack url => cid ? uid? keyword?
     *     results
     * 2- not found:
     *     form -> select & input
     */
    public function searchCourses()
    {

        include(VIEWS.'/back/admin/header.html');
        include(VIEWS.'/back/admin/menu.html');

        if(isset($_GET['q']))
        {
            //results
            $cid = (isset($_GET['cid']))? (int)$_GET['cid']:0;
            $uid = (isset($_GET['uid']))? (int)$_GET['uid']:0;
            $q = $_GET['q'];

            $query = "WHERE `course_title` LIKE '%$q%' ";

            if ($uid>0)
                $query .= "AND `course_instructor`=$uid ";
            if ($cid>0)
                $query .= "AND `course_category`=$cid ";
            

            $courses = $this->coursesModel->getCourses($query);

            include(VIEWS.'/back/admin/courses.html');

        }
        else
        {
            $usersModel = new usersModel();
            $instructors = $usersModel->getUsersByGroup(2); // all instrutors

            $categoriesModel = new coursesCategoriesModel();
            $categories = $categoriesModel->getCategories(); //all categories

            include(VIEWS.'/back/admin/coursessearch.html');


        }

        include(VIEWS.'/back/admin/footer.html');

    }


    public function deleteCourse()
    {

        $id = (isset($_GET['id']))? (int)$_GET['id'] : 0 ;

        if($this->coursesModel->deleteCourse($id))
            $this->setControllerSuccess('course Deleted Successfully');
        else
            $this->setControllerErrors('course Not Deleted');

        include(VIEWS.'/back/admin/header.html');
        include(VIEWS.'/back/admin/menu.html');
        include(VIEWS.'/back/admin/footer.html');

    }



}

