<?php
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    echo "<h1>Please install via composer.json</h1>";
    echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
    echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
    exit;
}

if (!is_readable('app/Core/Config.php')) {
    die('No Config.php found, configure and rename Config.example.php to Config.php in app/Core.');
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
    define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }

}

//initiate config
new Core\Config();

//create alias for Router
use Core\Router;
use Helpers\Hooks;

//define routes
Router::any('', 'Controllers\Landing@index');
Router::any('register', 'Controllers\Landing@register');
Router::any('login', 'Controllers\Landing@login');
Router::any('about', 'Controllers\Landing@about');
Router::any('logout', 'Controllers\Landing@logout');
Router::any('activate/(:num)/(:any)', 'Controllers\Landing@activate');
Router::any('teacher', 'Controllers\TeacherDashboard@index');
Router::any('teacher/compose', 'Controllers\TeacherDashboard@compose');
Router::any('teacher/login', 'Controllers\TeacherAuth@login');
Router::any('teacher/new-group', 'Controllers\TeacherDashboard@newGroup');
Router::any('teacher/submit-group', 'Controllers\TeacherDashboard@submitGroup');
Router::any('teacher/new-group-2', 'Controllers\TeacherDashboard@newGroup2');
Router::any('teacher/group/(:num)', 'Controllers\TeacherDashboard@groupProfile');
Router::any('teacher/course-upload', 'Controllers\TeacherDashboard@uploadCourse');
//Router::any('drop', 'Controllers\TeacherDashboard@drop');

//module routes
$hooks = Hooks::get();
$hooks->run('routes');

//if no route found
Router::error('Core\Error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();
