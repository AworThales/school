<?php
/**
 * main model
 */
class Model extends Database
{
    public $errors = array();
    // protected $table = "users";

     public function __construct() 
     {
        if(!property_exists($this, 'table'))
        {
            $this->table = strtolower(this::class) . "s";
        }
    }


    public function where($column,$value)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value";
        $data = $this->query($query,[
            'value'=>$value

        ]);

        // run function after select
        if (is_array($data)) {
            
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }
        return $data;
    }


    public function firstItem($column,$value)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value";
        $data = $this->query($query,[
            'value'=>$value

        ]);

        // run function after select
        if (is_array($data)) {
            
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }
        if (is_array($data)) {
            $data = $data[0];
        }
        return $data;
    }
    

  
    public function findAll($orderby = 'desc')
    {
        $query = "select * from $this->table order by id $orderby";
        $data = $this->query($query);

        // run function after select
        if (is_array($data)) {
            
            if(property_exists($this, 'afterSelect'))
            {
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
                }
            }
        }
        return $data;
    }

    public function insert($data)
    {
        // remove unwanted colunns
        if(property_exists($this,'allowedColumns'))
        {
            foreach($data as $key => $column)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }


        // run function before insert
        if(property_exists($this, 'beforeInsert'))
        {
            foreach($this->beforeInsert as $func)
            {
                $data = $this->$func($data);
            }
        }


        $key = array_keys($data);
        $column = implode(',', $key);
        $values = implode(',:', $key);
        $query = "insert into $this->table ($column) values (:$values)";
   
        return $this->query($query,$data);
    }

    public function update($id,$data)
    {
        
        $str = '';
        foreach ($data as $key => $value) {
            $str .= $key. "=:". $key. ",";
        }

        $str = trim($str, ",");
        $data['id'] = $id;
         
        // $key = array_keys($data);
        // $str = implode(',', $key);
        // $str = str_replace(',', replace, subject);
        // update $this->table set column = :value, column = :value2 where id = : id;
   
        $query = "update $this->table set $str where id = :id";
        return $this->query($query,$data);
    }

    public function delete($id)
    {
        $query = "delete from $this->table where id = :id";
        $data['id'] = $id;
        return $this->query($query,$data);
    }

}
