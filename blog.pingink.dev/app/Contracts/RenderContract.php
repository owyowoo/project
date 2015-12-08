<?php
namespace App\Contracts;

interface RenderContract 
{ 
    public function html($action, $data); 
    public function json($action, $data);
}