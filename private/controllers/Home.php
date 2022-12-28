<?php

/**
 * Home Controller
 */
class Home extends Controller
{
    function index() {
        // $user = $this->load_model('User');
        // $db = new Database();
        if (!Auth::logged_in()) {
           $this->redirect('login');
        }

        $user = new User();
        // $data = $user->where('firstname','thales');
        
        // $arr['firstname'] = 'Awor2';
        // $arr['lastname'] = 'Students1';
        // $arr['date'] = '2022-12-10 21:59:07';
        // $arr['user_id'] = '111111111';
        // $arr['gender'] = 'male';
        // $arr['school_id'] = '22222222222222';
        // $arr['rank'] = 'student';

        // $user->insert($arr);
        // $user->update(3, $arr);
        // $user->delete(3);

        $data = $user->findAll();
        $this->view('home',["rows"=>$data]);
    }
}

 