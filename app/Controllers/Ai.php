<?php
/* Contact Controller File */
namespace Pathology\Controllers;
use Pathology\Core\Controller;

class Ai extends Controller
{
    public function __construct(){
        $this->aboutModel = $this->model('About');
    }
    
    public function index()
    {   
        $about_data = $this->aboutModel->getAboutData();
        $this->view('ai/index',['title' => 'AI Prediction', 'about_data' => $about_data[0]]);
    }
}
