<?php

class DB
{
    protected function connect($host,$db,$user,$password){
        return new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8',$user,$password);
    }

    protected function DBAll($connect,$query){
        $sql = $connect->query($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    protected function transaction($connect,$query,$message){
        try{
            $connect->beginTransaction();
            $connect->exec($query);
            $connect->commit();
            return json_encode([
                'message'=>$message
            ]);
        }catch (PDOException $e){
            $connect->rollBack();
            return json_encode([
                'message'=>$e->getMessage()
            ]);
        }
    }

}