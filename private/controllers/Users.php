<?php

/**
 * Users Controller
 */
class Users extends Controller
{
    function index() {
    
        if (!Auth::logged_in()) {
           $this->redirect('login');
        }

        $user = new User();
        $school_id = Auth::getSchool_id();
        $data = $user->query("select * from users where school_id = :school_id && rank not in ('student') ORDER BY id DESC", ['school_id'=>$school_id]);

        $crumbs[] = ['Dashboard','']; 
        $crumbs[] = ['Staff','users']; 
        $this->view('users',[
            "rows"=>$data,
            "crumbs"=>$crumbs,
        ]);
    }
}

 