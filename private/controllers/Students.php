<?php

/**
 * Students Controller
 */
class Students extends Controller
{
    function index() {
    
        if (!Auth::logged_in()) {
           $this->redirect('login');
        }

        $user = new User();
        $school_id = Auth::getSchool_id();
        $data = $user->query("select * from users where school_id = :school_id && rank in ('student') ORDER BY id DESC", ['school_id'=>$school_id]);

        $crumbs[] = ['Dashboard','']; 
        $crumbs[] = ['Students','students']; 
        $this->view('students',[
            "rows"=>$data,
            "crumbs"=>$crumbs,
        ]);
    }
}

 