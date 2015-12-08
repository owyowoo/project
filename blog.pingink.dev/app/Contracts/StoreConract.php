<?php
namespace App\Contracts;

interface StoreContract 
{ 
    public function db($action, $data); 
    public function cache($action, $data);
}