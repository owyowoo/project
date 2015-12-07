<?php
namespace App\Contracts;

interface RenderContract 
{ 
    public function html($action, $data); 
}