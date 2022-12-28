<?php

/**
 * Signup Controller
 */
class Signup extends Controller
{
    function index() 
    {
        $mode = isset($_GET['mode']) ? $_GET['mode'] : '';
        $errors = array();
       if(count($_POST) > 0) 
       {
            $user = new User();
            if($user->validate($_POST)) 
            {
                // $arr['firstname'] = $_POST['firstname'];
                // $arr['lastname'] = $_POST['lastname'];
                // $arr['gender'] = $_POST['gender'];
                // $arr['rank'] = $_POST['rank'];
                // $arr['email'] = $_POST['email'];
                // $arr['password'] = $_POST['password'];
                // $arr['date'] = date("Y-m-d H:i:s");
                // $user->insert($arr);
                
                $_POST['date'] = date("Y-m-d H:i:s");

                $user->insert($_POST);
                $redirect = $mode == 'students' ? 'students' : 'users';
                $this->redirect($redirect);
            }else 
            {
                # errors
                $errors = $user->errors;
            }
       }
        $this->view('signup',[
            'errors'=>$errors,
            "mode"=>$mode,
        ]);
    }
}

 