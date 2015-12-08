<?php
namespace App\Services; 
use App\Contracts\FetchContract; 

class FetchService implements FetchContract 
{ 
    protected $action;
    protected $data;

    public function db($action, $data)
    {
        return $this->$action($data);
    }

    public function cache($action, $data)
    {
        return $this->$action($data);
    }
}