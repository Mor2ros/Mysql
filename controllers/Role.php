<?php
require ('db.php');

class Role extends DB
{
    private function standard(){
        return $this->connect('10.100.3.80','D210060_registration','D210060','uhifgn');
    }

    public function get(){
        return $this->DBAll($this->standard(),'SELECT id,name from roles');
    }

}