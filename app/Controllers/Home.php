<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Home extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->faqModel = $this->model('Faq');
        $this->aboutModel = $this->model('About');
    }

    public function index($name = [])
    {
        $about_data = $this->aboutModel->getAboutData();
        $doctors = $this->faqModel->getAllDoctorsF();
        $data = [
            'title' => 'Home',
            'doctors' => $doctors,
            'about_data' => $about_data[0]
        ];
        $this->view('home/index', $data);
    }
}
