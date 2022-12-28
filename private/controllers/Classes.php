<?php

/**
 * Classes Controller
 */
class Classes extends Controller
{
    public function index() 
    {
    
        if (!Auth::logged_in()) 
        {
           $this->redirect('login');
        }

        $classes = new Classes_model();
    
        $data = $classes->findAll("desc");
       
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Classes', 'classes'];

        $this->view('classes',[
            "crumbs"=>$crumbs,
            "rows"=>$data
        ]);
    }

    public function add()   
    {
    
        if (!Auth::logged_in()) 
        {
           $this->redirect('login');
        }

        $errors = array();
        if (count($_POST) > 0) {
            $classes = new Classes_model();
           
            if( $classes->validate($_POST)) 
            {
                $_POST['date'] = date("Y-m-d H:i:s");

                 $classes->insert($_POST);
                $this->redirect('classes');
            }else 
            {
                # errors
                $errors =  $classes->errors;
            }
        }
        
        // $data = $classes->findAll();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Classes', 'classes'];
        $crumbs[] = ['Add', 'classes/add'];

        $this->view('classes.add',[
            "errors"=>$errors,
            "crumbs"=>$crumbs,
            // "rows"=>$data
        ]);
    }


    public function edit($id = null) 
    {
    
        if (!Auth::logged_in()) 
        {
           $this->redirect('login');
        }

        $classes = new Classes_model();
        $errors = array();
        if (count($_POST) > 0) {
           
            if( $classes->validate($_POST)) 
            {
               

                 $classes->update($id,$_POST);
                $this->redirect('classes');
            }else 
            {
                # errors
                $errors =  $classes->errors;
            }
        }
        
        $row = $classes->where('id', $id);
    
        // $data = $classes->findAll();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Classes', 'classes'];
        $crumbs[] = ['Edit', 'classes/edit'];
        $this->view('classes.edit',[
            "crumbs"=>$crumbs,
            "row"=>$row,
            "errors"=>$errors,
           
            // "rows"=>$data
        ]);
    }
    

    public function delete($id = null) 
    {
    
        if (!Auth::logged_in()) 
        {
           $this->redirect('login');
        }

        $classes = new Classes_model();
        $errors = array();
        if (count($_POST) > 0) {
             
            $classes->delete($id);
            $this->redirect('classes');
        
        }
        
        $row = $classes->where('id', $id);
    
        // $data = $classes->findAll();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Classes', 'classes'];
        $crumbs[] = ['Delete', 'classes/delete'];
        $this->view('classes.delete',[
            "crumbs"=>$crumbs,
            "row"=>$row
        ]);
    }



}

// if (!$row) 
// {
//     $row = (object)[];
//     $row->Classes = "";
// }