<?php

/**
 * Profile Controller
 */
class Profile extends Controller
{
    function index($id = "") 
    {
        $user = new User();
        $row = $user->firstItem('user_id', $id);
        
        $crumbs[] = ['Dashboard','']; 
        $crumbs[] = ['Profile','profile']; 
        if ($row) {
            $crumbs[] = [$row->firstname,'profile'];
        }

        $this->view('profile', [
            'row'=>$row,
            'crumbs'=>$crumbs,
        ]);
    }
}

