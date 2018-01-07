<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Authen extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->methods['signIn_post']['limit'] = 500; // 500 requests per hour per user/key
        $this->load->model('Authen_model');
    }

    public function signIn_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');
        $captcha = $this->post('captcha');
        $result = $this->Authen_model->signIn(array("username" => $username, "password" => $password, "captcha" => $captcha));
        if($result == "captchaError" || $result == "loginError") {
            $this->response([
                'error'   =>    $result,
            ], REST_Controller::HTTP_UNAUTHORIZED);
        } else {
            $this->response([
                'token'   =>    $result,
            ], REST_Controller::HTTP_OK);
        }
    }
}
?>