<?php
/* Default Controller File */

namespace Pathology\Controllers;

use Pathology\Core\Controller;

class Home extends Controller
{
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->faqModel = $this->model('Faq');
    }

    public function index($name = [])
    {
        $doctors = $this->faqModel->getAllDoctorsF();
        $data = [
            'title' => 'Home',
            'doctors' => $doctors
        ];
        $this->view('home/index', $data);
    }
}
