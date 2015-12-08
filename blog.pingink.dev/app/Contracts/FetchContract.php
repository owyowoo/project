<?php
namespace App\Contracts;

interface FetchContract 
{ 
    public function db($action, $data);
    public function cache($action, $data); 
}