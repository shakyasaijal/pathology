<?php
/* Contact Controller File */
namespace Pathology\Controllers;
use Pathology\Core\Controller;

class Faq extends Controller
{
    public function __construct(){
        $this->faqModel = $this->model('Faq');
    }

    public function index(){
        $faq = $this->faqModel->getAllFaq();
        $data = [
            'title' => 'Frequently Asked Questions',
            'faq' => $faq
        ];
        $this->view('faq/index', $data);
    }
}