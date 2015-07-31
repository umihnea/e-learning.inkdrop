<?php
namespace Controllers;

use Core\View;
use Core\Controller;
use Helpers\Password;
use Helpers\Session;
use Helpers\Auth;
use Helpers\Url;

class TeacherDashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::only('teacher');
    }

    public function index()
    {
        $searchModel = new \Models\MemberSearch();
        $data = $searchModel->handleSearch($_POST);

        $data['title'] = 'Teacher Dashboard';
        $data['username'] = Session::get('username');
        View::renderTemplate('teacher-header', $data, 'teacher-dashboard');
        View::renderTemplate('teacher-sidebar', $data, 'teacher-dashboard');
        View::render('teacher-dashboard/new-group', $data);
    }

    public function newGroup()
    {
        if (isset($_COOKIE['unfinished_group']))
            Url::redirect(DIR . 'teacher/new-group-2', true);

        $groupModel = new \Models\GroupModel();
        if (isset($_POST['group_submit']))
            $data['error'] = $groupModel->handleFirstStep($_POST);

        $data['title'] = 'New Group';
        $data['username'] = Session::get('username');
        View::renderTemplate('teacher-header', $data, 'teacher-dashboard');
        View::renderTemplate('teacher-sidebar', $data, 'teacher-dashboard');
        View::render('teacher-dashboard/group-name-form', $data);
    }

    public function newGroup2()
    {
        /*
        *   cookie
        */
        if (!isset($_COOKIE['unfinished_group']))
            Url::redirect(DIR . 'teacher/new-group', true);

        /*
        *   search
        */
        $searchModel = new \Models\MemberSearch();
        $searchModel->handleSearch($_POST);

        if (isset($_SESSION['smvc_search_message']))
            $data['search_message'] = Session::pull('search_message');

        if (isset($_SESSION['smvc_search_results']))
            $data['search_results'] = Session::get('search_results');

        /*
        *   add & delete
        */
        $groupModel = new \Models\GroupModel();

        $data['member_list'] = $groupModel->getGroupMembers();
        if (!is_array($data['member_list']))
            unset($data['member_list']);

        if (isset($_POST['add']))
        {
            $id = (int)($_POST['id']);
            $data['add_error'] = $groupModel->addGroupMember($id);
            Url::redirect(DIR . 'teacher/new-group-2', true);
        }

        if (isset($_POST['del']))
        {
            $id = (int)($_POST['id']);
            $data['del_error'] = $groupModel->delGroupMember($id);
            Url::redirect(DIR . 'teacher/new-group-2', true);
        }

        /*
        *   view
        */
        $data['title'] = 'Add Members';
        $data['username'] = Session::get('username');
        View::renderTemplate('teacher-header', $data, 'teacher-dashboard');
        View::renderTemplate('teacher-sidebar', $data, 'teacher-dashboard');
        View::render('teacher-dashboard/group-members-form', $data);
    }

    public function submitGroup()
    {
        $groupModel = new \Models\GroupModel();
        $groupModel->updateGroup();
        setcookie('unfinished_group', false, time() - (3600 * 3650));
        Url::redirect(DIR.'teacher/', true);
    }

    public function compose()
    {
        $pmModel = new \Models\PM();

        $data['title'] = 'Compose';
        $data['css-assets'] = array('teacher-compose.css');
        $data['username'] = Session::get('username');
        View::renderTemplate('teacher-header', $data, 'teacher-dashboard');
        View::renderTemplate('teacher-sidebar', $data, 'teacher-dashboard');
        View::render('teacher-dashboard/compose', $data);
    }

    public function groupProfile($id)
    {
        $profileModel = new \Models\GroupProfile();

        $data['member_list'] = $profileModel->getGroupMembers($id);
        $data['teacher'] = $profileModel->getGroupTeacher($id);
        $data['name'] = $profileModel->getGroupName($id);
        $data['desc'] = $profileModel->getGroupDescription($id);

        $data['title'] = 'Compose';
        $data['css-assets'] = array('teacher-compose.css');
        $data['username'] = Session::get('username');

        View::renderTemplate('teacher-header', $data, 'teacher-dashboard');
        View::renderTemplate('teacher-sidebar', $data, 'teacher-dashboard');
    }

    public function uploadCourse()
    {
        if($_POST['upload_submit'])
        {
            $name = addslashes(trim($_POST['upload_name']));
            $desc = $_POST['upload_desc'];
            $temp = explode(".", $_FILES['upload_file']['name']);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['upload_file']['tmp_name'], DIR.'/app/Storage/'.$newfilename);

            $courseUploadModel = new \Models\CourseUpload();
            $courseUploadModel->runUpload($name, $desc, $newfilename);
        }

        $data['title'] = 'Upload Course';
        $data['css-assets'] = array('teacher-upload.css');
        $data['username'] = Session::get('username');

        View::renderTemplate('teacher-header', $data, 'teacher-dashboard');
        View::renderTemplate('teacher-sidebar', $data, 'teacher-dashboard');
        View::render('teacher-dashboard/course-upload', $data);
    }

}