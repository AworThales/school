<?php

/**
 * User Model
 */
class User extends Model
{


    protected $table = "users";

    protected $allowedColumns = [
        'firstname',
        'lastname',
        'email',
        'password',
        'gender',
        'rank',
        'date',
    ];

    protected $beforeInsert = [
        'make_user_id',
        'make_school_id',
        'hash_password',
    ];
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
       

        // check for first name
        if(empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname'])) 
        {
            $this->errors['firstname'] = 'Only letters allowed in first name';
        }
        // check for last name
        if(empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname'])) 
        {
            $this->errors['lastname'] = 'Only letters allowed in last name';
        }
        // // check for email
        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL)) 
        {
            $this->errors['email'] = "Invalid Email";
        }
        // // check for email aleady exist
        if($this->where('email', $DATA['email'])) 
        {
            $this->errors['email'] = "Email already in use";
        }
        // // check for gender
        $gender = ['male','female'];
        if(empty($DATA['gender']) || !in_array($DATA['gender'], $gender)) 
        {
            $this->errors['gender'] = "You must select a gender";
        }
        // // check for rank
        $rank = ['student','receptionist','lecturer','admin','super_admin'];
        if(empty($DATA['rank']) || !in_array($DATA['rank'], $rank)) 
        {
            $this->errors['rank'] = "You must select a rank";
        }
        // // check for password
        if(empty($DATA['password']) || $DATA['password'] != $DATA['password2']) 
        {
            $this->errors['password'] = "Password do not match";
        }else 
        {
            // check for password lenght
            if(strlen($DATA['password']) <= 8) 
            {
                $this->errors['password'] = "Password must be atleast 8 characters long";
            }
        }


        if (count($this->errors) == 0) 
        {
            return true;
        }
        return false;
    }


    public function make_user_id($data)
    {
        $data['user_id'] = random_string(60);
       return $data;
    }

    public function make_school_id($data)
    {
        if (isset($_SESSION['USER']->school_id)) {
            $data['school_id'] = $_SESSION['USER']->school_id;
        }
       return $data;
    }

    public function hash_password($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
       return $data;
    }

   
}
  