<?php
namespace App\Services; 
use App\Contracts\StoreContract; 

class IndexStoreService implements StoreContract 
{ 
    private $data;
    public function db($action, $data); 
}