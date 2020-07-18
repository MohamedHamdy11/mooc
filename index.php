<?php

require('globals.php');
require(MODELS.'/usersGroupsModel.php');
require(MODELS.'/usersModel.php');
require(MODELS.'/coursesCategoriesModel.php');
require(MODELS.'/coursesModel.php'); //error add -2
require(MODELS.'/coursesLessonsModel.php'); //error add -3
require(MODELS.'/coursesLessonsCommentModel.php');

$clcm = new coursesLessonsCommentsModel();

$data = array(
    'comment_title'=>'test comment',
    'comment_content'=>'this is comment',
    'comment_lesson'=>1,
    'comment_user'=>1
);

//$clcm->addComment($data);
print_r($clcm->getComments());


/*
$clm = new coursesLessonsModel();

//error fuction add lesson
$data = array(
    'lesson_title'=>'test lesson updated',
    'lesson_description'=>'the is test',
    'lesson_cover'=>'test1.jpg',
    'lesson_instructor'=>1,
    'lesson_course'=>1
);
$clm->addLesson($data);
print_r($clm->updateLesson(1,$data));
*/


/*
//error not work function
$cm = new coursesModel();

$data = array(
    'course_title' =>'PHP C',
    'course_description' =>'php php php',
    'course_instructor'  =>2,
    'course_category'    =>1

);

if($cm ->addCourse($data))
    echo'done';
else
    echo'error';
*/

/*
$ccm = new coursesCategoriesModel();

$data = array(
    'category_name' => 'Programming'
);

//$ccm->updateCategory(1,$data);
//print_r($ccm->getCategory(1));
*/

//print_r($cm->getCoursesByCategoryId(1));
//print_r($cm->getCoursesByInstructorId(1));



/*
$groupsModel = new usersGroupsModel();

if($groupsModel->deleteUserGroup(6))
    echo'done';
*/




/*
$users = new usersModel();

$data = array(
    'username'=>'admin',
    'password'=>1234,
    'email'   => 'mhsayed337@gmail.com',
    'user_group'=>1
);

if($users->addUser($data))
    echo 'done';
*/

//$users->updateUser(1,$data);
//echo '<pre>';
//print_r($users->getUsers());
//print_r($users->getUser(1));
//print_r($users->getUsersByGroup(1));
//print_r($users->searchUsers('d'));



