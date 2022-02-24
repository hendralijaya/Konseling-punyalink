<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends CI_Controller {
    public function index(){
        $this->load->view('home_konseling/v_email_verif_konselor.php');
    }

    public function konseling(){
        $this->load->view('home_konseling/v_email_verif_konseling.php');
    }
}