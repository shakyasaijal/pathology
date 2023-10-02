<?php
/* Contact Controller File */
namespace Pathology\Controllers;
use Pathology\Core\Controller;

class Faq extends Controller
{
    public function __construct(){
        $this->faqModel = $this->model('Faq');
        $this->aboutModel = $this->model('About');
    }

    public function index(){
        $faq = $this->faqModel->getAllFaq();
        $about_data = $this->aboutModel->getAboutData();
        $data = [
            'title' => 'Frequently Asked Questions',
            'faq' => $faq,
            'about_data' => $about_data[0]
        ];
        $this->view('faq/index', $data);
    }
}