<?php
/* Contact Controller File */
namespace Pathology\Controllers;

class Contact extends Controller
{
    public function index($name = [])
    {
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index',['name' => $user->name]);
    }
}