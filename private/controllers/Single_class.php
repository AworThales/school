<?php

/**
 * Single_class Controller
 */
class Single_class extends Controller
{
    function index($id = "") 
    {
        $user = new User();
        $classes = new Classes_model();
        $row = $classes->firstItem('class_id', $id);

        $crumbs[] = ['Dashboard','']; 
        $crumbs[] = ['Classes','classes']; 

        $row_user = array();
        if ($row) {
            $crumbs[] = [$row->class];
            $row_user = $user->firstItem('user_id', $row->user_id);
        }

        $this->view('single-class', [
            'row'=>$row,
            'row_user'=>$row_user,
            'crumbs'=>$crumbs,
        ]);
    }
}

