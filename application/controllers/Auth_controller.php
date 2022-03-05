<?php

use PHPMailer\PHPMailer\PHPMailer;
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth_controller extends CI_Controller {

    public function registerKonseling()
    {
        
    }

    public function registerKonselor()
    {
        
    }
    
    public function loginKonselor()
    {
        
    }

    public function loginKonseling()
    {
        
    }

    public function _sendMail($data_user, $token, $type)
    {
        $template_file = APPPATH . "views/dashboard_user/v_email_template.php";
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'mail.punyalink.com',
        //     'smtp_user' => 'verification@punyalink.com',
        //     'smtp_pass' => 'Mozart@2000',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // ];

        if (file_exists($template_file)) {
            $message = file_get_contents($template_file);
        } else {
            die('unable to locate the template file' . $template_file);
        }

        $swap_var = array(
            "{TITLE}" => $type == 'register' ? 'VERIFY YOUR EMAIL ADRRESS' : 'REQUEST RESET PASSWORD',
            "{NAME}" => $data_user->nama_lengkap,
            "{HEADER}" => $type == 'register' ? 'Terima kasih sudah mendaftar pada web PunyaLink cari pekerjaan impianmu. Silahkan klik tombol dibawah ini untuk mengaktivasi akun PunyaLink anda.' : 'Kamu baru saja meminta kami untuk mereset password, Silahkan klik tombol untuk melanjutkan reset password',
            "{LINK_DIRECT}" => $type == 'register' ? base_url('auth_controller/verif_jobseeker?email=' . $data_user->email . '&token=' . urlencode($token))  : base_url('auth_controller/reset_jobseeker?email=' . $data_user->email . '&token=' . urlencode($token)),
            "{TITLE_BUTTON}" => $type == 'register' ? 'Verify Your Email' : 'Reset Password',
            "{BASE_URL}" => base_url(),
            "{IMAGE_LOGO}" => "https://punyalink.com/assets_home/img/about/new_logo_white.png",
        );

        foreach (array_keys($swap_var) as $key) {
            if (strlen($key) > 2 && trim($key) != "") {
                $message = str_replace($key, $swap_var[$key], $message);
            }
        }
        // $header = "MIME-Version 1.0\r\n";
        // $header .= "Content-Type:text/html;charset=ISO-8859-1\r\n";
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
            $mail->addAddress($data_user->email);               // Name is optional
            $mail->addReplyTo('verification@punyalink.com', 'Punyalink');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);
            if ($type == 'register') {
                $mail->Subject = 'Verifikasi Akun Punyalink';
            } else if ($type == 'reset') {
                $mail->Subject = 'Reset Kata Sandi';
            }                                  // Set email format to HTML
            $mail->Body    = $message;

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public function storeRegisterKonseling(){
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $nama_panggilan = $this->input->post('nama_panggilan');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $data = [
            'username' => $username,
            'nama_lengkap' => $nama_lengkap,
            'nama_panggilan' => $nama_panggilan,
            'password' => $password,
            'email' => $email,
            'no_hp' => $no_hp,
            'tipe_akun' => '0',
            'status' => '0'

        ];

        $check_email = $this->auth_model->checkEmailExist('user_konseling', $email);
        $check_username = $this->auth_model->checkUsernameExist('user_konseling', $username);
        if ($check_email == 0 && $check_username == 0) {
            if ($this->auth_model->registerJobSeeker($data) > 0) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                if ($this->auth_model->daftarTokenRegistrasi($user_token) > 0) {
                    $user = $this->auth_model->getDataUserByEmail('user_konseling', $email);
                    $this->_sendMail($user, $token, 'register');
                }

                redirect('home_controller/ilustration_page/verifikasi_email');
            }
        } else {
            if ($check_email == 1) {
                $this->session->set_flashdata('flash', 'emailTerdaftar');
                redirect(site_url('auth_controller/registerkonseling'));
            } else if ($check_username == 1) {
                $this->session->set_flashdata('flash', 'usernameTelahDigunakan');
                redirect(site_url('auth_controller/registerkonseling'));
            }
        }
    }

    public function verif_konseling()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('_employer', ['email' => $email])->row_array();
        // var_dump($email);
        // var_dump($user);
        // die();
        if ($user) {
            $user_token = $this->db->get_where('_token_registrasi', ['token' => $token])->row_array();

            if ($user_token) {
                $data['status'] = 'employer';
                $this->db->set('status', 1);
                $this->db->where('email', $email);
                $this->db->update('user_konseling');

                $this->db->delete('_token_registrasi', ['token' => $token]);
                if ($this->employer_model->postUpdateLimitLowongan($user['id_employer'], 1) > 0) {
                    $this->sendMail($email, 'Konseling', 'Selamat datang di Punyalink', $user['nama_lengkap'], 'Selamat datang di Punyalink, klik link dibawah ini untuk mengaktifkan akunmu', base_url('KonselingController'), 'Konseling Sekarang');
                    $this->load->view('dashboard_user/v_j_verifikasi', $data);
                }
            } else {
                $this->load->view('dashboard_user/v_j_gagal_verifikasi');
            }
        } else {
            $this->load->view('dashboard_user/v_j_gagal_verifikasi');
        }
    }

    public function _sendMailKonseling($data_user, $token, $type)
    {
        $template_file = APPPATH . "views/dashboard_user/v_email_template.php";
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'mail.punyalink.com',
        //     'smtp_user' => 'verification@punyalink.com',
        //     'smtp_pass' => 'Mozart@2000',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // ];

        if (file_exists($template_file)) {
            $message = file_get_contents($template_file);
        } else {
            die('unable to locate the template file' . $template_file);
        }

        $swap_var = array(
            "{TITLE}" => $type == 'register' ? 'VERIFY YOUR EMAIL ADRRESS' : 'REQUEST RESET PASSWORD',
            "{NAME}" => $data_user->nama_lengkap,
            "{HEADER}" => $type == 'register' ? 'Terima kasih sudah mendaftar pada web PunyaLink cari pekerjaan impianmu. Silahkan klik tombol dibawah ini untuk mengaktivasi akun PunyaLink anda.' : 'Kamu baru saja meminta kami untuk mereset password, Silahkan klik tombol untuk melanjutkan reset password',
            "{LINK_DIRECT}" => $type == 'register' ? base_url('auth_controller/verif_konseling?email=' . $data_user->email . '&token=' . urlencode($token))  : base_url('auth_controller/reset_konseling?email=' . $data_user->email . '&token=' . urlencode($token)),
            "{TITLE_BUTTON}" => $type == 'register' ? 'Verify Your Email' : 'Reset Password',
            "{BASE_URL}" => base_url(),
            "{IMAGE_LOGO}" => "https://punyalink.com/assets_home/img/about/new_logo_white.png",
        );

        foreach (array_keys($swap_var) as $key) {
            if (strlen($key) > 2 && trim($key) != "") {
                $message = str_replace($key, $swap_var[$key], $message);
            }
        }
        // $header = "MIME-Version 1.0\r\n";
        // $header .= "Content-Type:text/html;charset=ISO-8859-1\r\n";
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
            $mail->addAddress($data_user->email);               // Name is optional
            $mail->addReplyTo('verification@punyalink.com', 'Punyalink');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);
            if ($type == 'register') {
                $mail->Subject = 'Verifikasi Akun Punyalink';
            } else if ($type == 'reset') {
                $mail->Subject = 'Reset Kata Sandi';
            }                                  // Set email format to HTML
            $mail->Body    = $message;

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public function storeRegisterKonselor(){
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $nama_panggilan = $this->input->post('nama_panggilan');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $data = [
            'username' => $username,
            'nama_lengkap' => $nama_lengkap,
            'nama_panggilan' => $nama_panggilan,
            'password' => $password,
            'email' => $email,
            'no_hp' => $no_hp,
            'tipe_akun' => '0',
            'status' => '0'

        ];

        $check_email = $this->auth_model->checkEmailExist('user_konsel', $email);
        $check_username = $this->auth_model->checkUsernameExist('user_konsel', $username);
        if ($check_email == 0 && $check_username == 0) {
            if ($this->auth_model->registerJobSeeker($data) > 0) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'type' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                if ($this->auth_model->daftarTokenRegistrasi($user_token) > 0) {
                    $user = $this->auth_model->getDataUserByEmail('user_konseling', $email);
                    $this->_sendMail($user, $token, 'register');
                }

                redirect('home_controller/ilustration_page/verifikasi_email');
            }
        } else {
            if ($check_email == 1) {
                $this->session->set_flashdata('flash', 'emailTerdaftar');
                redirect(site_url('auth_controller/registerkonseling'));
            } else if ($check_username == 1) {
                $this->session->set_flashdata('flash', 'usernameTelahDigunakan');
                redirect(site_url('auth_controller/registerkonseling'));
            }
        }
    }

    public function storeLoginKonseling(){
        $username = $this->input->post("email", TRUE);
        $password = MD5($this->input->post("password", TRUE));

        $checking = $this->auth_model->check_auth('user_konseling', $username);

        if ($checking != FALSE) {
            foreach ($checking as $user) {
                if ($user->password == 'd41d8cd98f00b204e9800998ecf8427e') {

                    if ($user->status == '0') {
                        $this->session->set_flashdata('flash', 'belumVerifikasi');
                        // redirect('dashboard_admin_controller/event_promo');
                        redirect(site_url('loginkonseling'));
                    } else {

                        $this->session->set_userdata(['username' => $user->username]);
                        $this->session->set_userdata(['status' => 'konseling']);
                        $this->session->set_userdata(['id_konselor' => $user->id]);
                        $this->session->set_userdata(['nama_lengkap' => $user->nama_lengkap]);
                        $this->session->set_userdata(['nama_panggilan' => $user->nama_panggilan]);
                        $this->session->set_userdata(['email' => $user->email]);
                        $this->session->set_userdata(['tipe_akun' => $user->tipe_akun]);
                        $this->session->set_userdata(['masuk' => true]);

                        $this->auth_model->updateLastLoginKonseling($user->id, date('Y-m-d H:i:s'));
                        $this->auth_model->reset_password_konseling($user->id, $password);

                        redirect(site_url('dashboard_employer_controller'));
                    }
                } else {
                    if ($user->password == $password) {

                        if ($user->status == '0') {
                            $this->session->set_flashdata('flash', 'belumVerifikasi');
                            // redirect('dashboard_admin_controller/event_promo');
                            redirect(site_url('loginkonseling'));
                        } else {

                            $this->session->set_userdata(['username' => $user->username]);
                            $this->session->set_userdata(['status' => 'konseling']);
                            $this->session->set_userdata(['id_konseling' => $user->id]);
                            $this->session->set_userdata(['nama_lengkap' => $user->nama_lengkap]);
                            $this->session->set_userdata(['nama_panggilan' => $user->nama_panggilan]);
                            $this->session->set_userdata(['email' => $user->email]);
                            $this->session->set_userdata(['tipe_akun' => $user->tipe_akun]);
                            $this->session->set_userdata(['masuk' => true]);

                            $this->auth_model->updateLastLoginKonseling($user->id_employer, date('Y-m-d H:i:s'));
                            redirect(site_url('loginkonseling'));
                        }
                    } else {
                        $this->session->set_flashdata('flash', 'passwordSalah');
                        redirect(site_url('registerkonseling'));
                    }
                }
            }
        } else {
            $this->session->set_flashdata('flash', 'akunNotFound');
            redirect(site_url('registerkonseling'));
        }
    }

    public function storeLoginKonselor(){
        $username = $this->input->post("email", TRUE);
        $password = MD5($this->input->post("password", TRUE));

        $checking = $this->auth_model->check_auth('user_konselor', $username);

        if ($checking != FALSE) {
            foreach ($checking as $user) {
                if ($user->password == 'd41d8cd98f00b204e9800998ecf8427e') {

                    if ($user->status == '0') {
                        $this->session->set_flashdata('flash', 'belumVerifikasi');
                        // redirect('dashboard_admin_controller/event_promo');
                        redirect(site_url('loginkonselor'));
                    } else {

                        $this->session->set_userdata(['username' => $user->username]);
                        $this->session->set_userdata(['status' => 'konselor']);
                        $this->session->set_userdata(['id_konselor' => $user->id]);
                        $this->session->set_userdata(['nama_lengkap' => $user->nama_lengkap]);
                        $this->session->set_userdata(['nama_panggilan' => $user->nama_panggilan]);
                        $this->session->set_userdata(['email' => $user->email]);
                        $this->session->set_userdata(['tipe_akun' => $user->tipe_akun]);
                        $this->session->set_userdata(['masuk' => true]);

                        $this->auth_model->updateLastLoginKonselor($user->id, date('Y-m-d H:i:s'));
                        $this->auth_model->reset_password_konselor($user->id, $password);
                        // login redirect
                        redirect(site_url('konselingcontroller'));
                    }
                } else {
                    if ($user->password == $password) {

                        if ($user->status == '0') {
                            $this->session->set_flashdata('flash', 'belumVerifikasi');
                            // redirect('dashboard_admin_controller/event_promo');
                            redirect(site_url('auth_controller/loginKonselor'));
                        } else {

                            $this->session->set_userdata(['username' => $user->username]);
                            $this->session->set_userdata(['status' => 'konseling']);
                            $this->session->set_userdata(['id_konseling' => $user->id]);
                            $this->session->set_userdata(['nama_lengkap' => $user->nama_lengkap]);
                            $this->session->set_userdata(['nama_panggilan' => $user->nama_panggilan]);
                            $this->session->set_userdata(['email' => $user->email]);
                            $this->session->set_userdata(['tipe_akun' => $user->tipe_akun]);
                            $this->session->set_userdata(['masuk' => true]);

                            $this->auth_model->updateLastLoginKonselor($user->id_employer, date('Y-m-d H:i:s'));
                            // login redirect
                            redirect(site_url('konselingcontroller'));
                        }
                    } else {
                        $this->session->set_flashdata('flash', 'passwordSalah');
                        redirect(site_url('auth_controller/loginKonselor'));
                    }
                }
            }
        } else {
            $this->session->set_flashdata('flash', 'akunNotFound');
            redirect(site_url('auth_controller/loginKonselor'));
        }
    }
    public function sendMail($email, $subject, $title, $name, $header, $link_direct, $title_button)
    {
        $template_file = APPPATH . "views/dashboard_user/v_email_template.php";
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'mail.punyalink.com',
        //     'smtp_user' => 'verification@punyalink.com',
        //     'smtp_pass' => 'Mozart@2000',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // ];

        if (file_exists($template_file)) {
            $message = file_get_contents($template_file);
        } else {
            die('unable to locate the template file' . $template_file);
        }

        $swap_var = array(
            "{TITLE}" => $title,
            "{NAME}" => $name,
            "{HEADER}" => $header,
            "{LINK_DIRECT}" => $link_direct,
            "{TITLE_BUTTON}" => $title_button,
            "{BASE_URL}" => base_url(),
            "{IMAGE_LOGO}" => "https://punyalink.com/assets_home/img/about/new_logo_white.png",
        );

        foreach (array_keys($swap_var) as $key) {
            if (strlen($key) > 2 && trim($key) != "") {
                $message = str_replace($key, $swap_var[$key], $message);
            }
        }
        // $header = "MIME-Version 1.0\r\n";
        // $header .= "Content-Type:text/html;charset=ISO-8859-1\r\n";
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
            $mail->addAddress($email);               // Name is optional
            $mail->addReplyTo('verification@punyalink.com', 'Punyalink');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            // Set email format to HTML
            $mail->Body    = $message;

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        // $this->load->library('email', $config);

        // $this->email->from('info@punyalink.com', 'PunyaLink');
        // $this->email->to($email);
        // $this->email->set_header('Content-Type', 'text/html');
        // $this->email->message($message);
        // $this->email->subject($subject);

        // if ($this->email->send()) {
        //     // $this->response('sukses', 200);
        // } else {
        //     echo $this->email->print_debugger();
        // }
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        // redirect(site_url('development-home'));
        redirect(site_url('home_controller'));
    }
}