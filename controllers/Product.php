<?php
require ('db.php');

class Product extends DB
{
    protected $host = '10.100.3.80';
    protected $db = 'D210060_bookmarket';
    protected $user = "D210060";
    protected $password = 'uhifgn';

    private function standard(){
        return $this->connect($this->host,$this->db,$this->user,$this->password);
    }

    public function getData(){
        return $this->DBAll($this->standard(),'SELECT name,ISBN,price from products');
    }
}