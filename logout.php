<?php
/**
 * Created by PhpStorm.
 * User: محمد حمدى
 * Date: 7/27/20
 * Time: 2:51 AM
 */

require('globals.php');
session_destroy();
Redirect::To('login.php');
