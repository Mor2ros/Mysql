<?php
require ('db.php');

class User extends DB
{
    private function standard(){
        return $this->connect('10.100.3.80','D210060_registration','D210060','uhifgn');
    }

    public function get(){
        return $this->DBAll($this->standard(),
            'SELECT users.id as id,users.name as user, roles.name as role from users 
join roles on roles.id= role_id');
    }

    public function delete($request){
        $req=json_decode($request);
        return $this->transaction($this->standard(),
            'DELETE from users where id='.$req->id,
            'Пользователь удален');
    }

    public function createUser($request){
        $req = json_decode($request);
        $name = $req->name;
        $pass = $req->password;
        $role = $req->role;
        $connect = $this->standard();
        try{
            $connect->beginTransaction();
            $connect->exec('INSERT INTO users (name,password,role_id) 
values ("'.$name.'","'.$pass.'",'.$role.')');
            $connect->commit();
            return json_encode([
                'message'=>'Пользователь добавлен'
            ]);
        }catch (PDOException $e){
            $connect->rollBack();
            return json_encode([
                'message'=>$e->getMessage()
            ]);
        }
    }

}