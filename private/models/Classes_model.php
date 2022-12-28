<?php

/**
 * Classess Model
 */
class Classes_model extends Model
{


    protected $table = "classes";
   
    protected $allowedColumns = [
        'class',
        'date',
    ];

    protected $beforeInsert = [ 
        'make_school_id',
        'make_class_id',
        'make_user_id',
        
    ];

    // protected $afterSelect = [
    //     'get_user',
    // ];
    public function validate($DATA)
    {
        $this->errors = array();

        // if (empty($DATA['firstname'])) {
        //     $this->errors['firstname'] = 'You must fill the first name field';
        // }else {
        //     if(!preg_match('/^[a-zA-Z]+$/', $DATA['firstname'])) 
        //     {
        //         $this->errors['firstname'] = 'Only letters allowed in first name';
        //     }
        // }
       

        // check for class name
        if(empty($DATA['class']) || !preg_match('/^[a-z A-Z0-9]+$/', $DATA['class'])) 
        {
            $this->errors['class'] = 'Only letters & numbers allowed in class name';
        }


        if (count($this->errors) == 0) 
        {
            return true;
        }
        return false;
    }
 
 
    public function make_school_id($data)
    {
        // $data['school_id'] = random_string(60);
        // return $data;

        if (isset($_SESSION['USER']->school_id)) {
            $data['school_id'] = $_SESSION['USER']->school_id;
        }
       return $data;
    }

    public function make_user_id($data)
    {
        // $data['user_id'] = random_string(60);
        // return $data;

        if (isset($_SESSION['USER']->user_id)) {
            $data['user_id'] = $_SESSION['USER']->user_id;
        }
       return $data;
    }

    public function make_class_id($data)
    {
        
        $data['class_id'] = random_string(60);
        return $data;
    }

    // public function get_user($data)
    // {
    //     $user = new User();
        
    //     foreach ($data as $key => $row) {
    //         $result = $user->where('user_id',$row->user_id);
    //         $data[$key]->user = is_array($result) ? $result[0] : false;
    //     }
        
    //     return $data;
    // }

}
  




?>