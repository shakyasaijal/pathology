<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Home extends Controller
{
    public function index($name = [])
    {
    $this->view('home/index',['title' => 'Home']);
    }
}
