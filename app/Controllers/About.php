<?php
/* Contact Controller File */
namespace Pathology\Controllers;
use Pathology\Core\Controller;

class About extends Controller
{
    public function __construct(){
        $this->aboutModel = $this->model('About');
    }

    public function index()
    {   
        $about_data = $this->aboutModel->getAboutData();
        $this->view('about/index',['title' => 'About Us', 'about_data' => $about_data[0]]);
    }
}