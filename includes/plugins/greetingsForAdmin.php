<?php

function adminGreetings()
{
    if(isset($_SESSION['user']['user_group']) && $_SESSION['user']['user_group'] == 1)
        $_SESSION['success'] = 'Welcom Admin';
}



function adminGroups()
{
    require (MODELS.'/usersModel.php');
    $ug = new usersModel();
    $_SESSION['errors'] = $ug->getUser($_SESSION['user']['user_id']);

}



add_action('before_courses_display','adminGreetings');
//add_action('before_courses_display','adminGroups');

