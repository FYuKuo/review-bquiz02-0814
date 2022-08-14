<?php
date_default_timezone_set('Asia/Taipei');

session_start();


class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db15-0814";
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');
    }

    public function all(...$arg)
    {
        $sql = "SELECT * FROM `$this->table` ";

        if(isset($arg[0])){
            
            if(is_array($arg[0])){

                foreach ($arg[0] as $key => $value) {
                    $tmp[] = " `$key` = '$value' ";
                }

                $sql .= " WHERE " . join('AND',$tmp);
            }else{

                $sql .= $arg[0];
            }

        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM `$this->table` ";

        if(is_array($id)){

            foreach ($id as $key => $value) {
                $tmp[] = " `$key` = '$value' ";
            }

            $sql .= " WHERE " . join('AND',$tmp);
        }else{

            $sql .= " WHERE `id` = '$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }


    public function del($id)
    {
        $sql = "DELETE FROM `$this->table` ";

        if(is_array($id)){

            foreach ($id as $key => $value) {
                $tmp[] = " `$key` = '$value' ";
            }

            $sql .= " WHERE " . join('AND',$tmp);
        }else{

            $sql .= " WHERE `id` = '$id'";
        }

        return $this->pdo->exec($sql);
    }


    public function save($array)
    {
        if(isset($array['id'])){

            foreach ($array as $key => $value) {
                if($key != 'id'){

                    $tmp[] = " `$key` = '$value' ";
                }
            }

            $sql = "UPDATE `$this->table` SET " . join(",",$tmp) . " WHERE `id` = '{$array['id']}'";
        }else{

            $col = join("`,`",array_keys($array));
            $val = join("','",$array);

            $sql = "INSERT INTO `$this->table` (`$col`) VALUES ('$val')";
        }

        // echo $sql;
        return $this->pdo->exec($sql);
    }


    public function math($math,$col,...$arg)
    {
        $sql = "SELECT $math(`$col`) FROM `$this->table` ";

        if(isset($arg[0])){
            
            if(is_array($arg[0])){

                foreach ($arg[0] as $key => $value) {
                    $tmp[] = " `$key` = '$value' ";
                }

                $sql .= " WHERE " . join('AND',$tmp);
            }else{

                $sql .= $arg[0];
            }

        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }
}


function to($url)
{
    header("location:$url");
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}



$View = new DB('view');
$Admin = new DB('admin');


if(!isset($_SESSION['view'])){
    
    $view = $View->find(['date'=>date('Y-m-d')]);

    if(empty($view)){

        $View->save(['total'=>1,'date'=>date('Y-m-d')]);

    }else{

        $view['total']++;
        $View->save($view);

    }

    $_SESSION['view'] = 1;
}
?>