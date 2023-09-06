<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Home extends Controller
{
    public function index($name = [])
    {
        $user = $this->model('User')->getAllUser();
        $this->view('home/index',['name' => $user]);
    }
}
