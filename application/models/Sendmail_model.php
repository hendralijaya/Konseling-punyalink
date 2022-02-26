<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Sendmail_model extends CI_Model
{
    public function sendmailKonselor($data)
    {

        // $data = [
        //     'title' => ,
        //     'email' => ,
        //     'nama_lengkap' => ,
        //     'header' => ,
        //     'link_direct' => ,
        //     'title_button' => ,
        //     'subject' => ,
        // ]

        $template_file = APPPATH . "views/v_email_verif_konselor.php";



        if (file_exists($template_file)) {
            $message = file_get_contents($template_file);
        } else {
            die('unable to locate the template file' . $template_file);
        }

        // $swap_var = array(
        //     "{TITLE}" => $data['title'],
        //     "{NAME}" => $data['nama_lengkap'],
        //     "{HEADER}" => $data['header'],
        //     "{LINK_DIRECT}" => $data['link_direct'],
        //     "{TITLE_BUTTON}" => $data['title_button'],
        //     "{BASE_URL}" => base_url(),
        //     "{IMAGE_LOGO}" => "https://punyalink.com/assets_home/img/about/new_logo_white.png",
        // );

        // foreach (array_keys($swap_var) as $key) {
        //     if (strlen($key) > 2 && trim($key) != "") {
        //         $message = str_replace($key, $swap_var[$key], $message);
        //     }
        // }
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'srv39.niagahoster.com';  // Specify main and backup SMTP servers
            // $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'verification@punyalink.com';                 // SMTP username
            $mail->Password = 'Mozart@2000';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('verification@punyalink.com', 'Punyalink');
            // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress($data['email']);               // Name is optional
            $mail->addReplyTo('verification@punyalink.com', 'Punyalink');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);
            $mail->Subject = $data['subject'];                               // Set email format to HTML
            $mail->Body    = $message;

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        // $header = "MIME-Version 1.0\r\n";
        // $header .= "Content-Type:text/html;charset=ISO-8859-1\r\n";
        // $this->load->library('email', $config);


        // $this->email->from('info@punyalink.com', 'PunyaLink');
        // $this->email->to($data_user->email);
        // $this->email->set_header('Content-Type', 'text/html');
        // $this->email->message($message);
        // if ($type == 'register') {
        //     $this->email->subject('Verifikasi Akun Punyalink');
        // } else if ($type == 'reset') {
        //     $this->email->subject('Reset Kata Sandi');
        // }
        // if ($this->email->send()) {
        //     // $this->response('sukses', 200);
        // } else {
        //     echo $this->email->print_debugger();
        // }
    }

    public function sendmailKonseling($data)
    {
        $template_file = APPPATH . "views/v_email_verif_konseling.php";



        if (file_exists($template_file)) {
            $message = file_get_contents($template_file);
        } else {
            die('unable to locate the template file' . $template_file);
        }

        // $swap_var = array(
        //     "{TITLE}" => $data['title'],
        //     "{NAME}" => $data['nama_lengkap'],
        //     "{HEADER}" => $data['header'],
        //     "{LINK_DIRECT}" => $data['link_direct'],
        //     "{TITLE_BUTTON}" => $data['title_button'],
        //     "{BASE_URL}" => base_url(),
        //     "{IMAGE_LOGO}" => "https://punyalink.com/assets_home/img/about/new_logo_white.png",
        // );

        // foreach (array_keys($swap_var) as $key) {
        //     if (strlen($key) > 2 && trim($key) != "") {
        //         $message = str_replace($key, $swap_var[$key], $message);
        //     }
        // }
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'srv39.niagahoster.com';  // Specify main and backup SMTP servers
            // $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'verification@punyalink.com';                 // SMTP username
            $mail->Password = 'Mozart@2000';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('verification@punyalink.com', 'Punyalink');
            // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress($data['email']);               // Name is optional
            $mail->addReplyTo('verification@punyalink.com', 'Punyalink');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);
            $mail->Subject = $data['subject'];                               // Set email format to HTML
            $mail->Body    = $message;

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        // $header = "MIME-Version 1.0\r\n";
        // $header .= "Content-Type:text/html;charset=ISO-8859-1\r\n";
        // $this->load->library('email', $config);


        // $this->email->from('info@punyalink.com', 'PunyaLink');
        // $this->email->to($data_user->email);
        // $this->email->set_header('Content-Type', 'text/html');
        // $this->email->message($message);
        // if ($type == 'register') {
        //     $this->email->subject('Verifikasi Akun Punyalink');
        // } else if ($type == 'reset') {
        //     $this->email->subject('Reset Kata Sandi');
        // }
        // if ($this->email->send()) {
        //     // $this->response('sukses', 200);
        // } else {
        //     echo $this->email->print_debugger();
        // }
    }
}