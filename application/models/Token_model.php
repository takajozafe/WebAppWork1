<?php
class Token_model extends CI_Model {
    
    const SECRET_KEY = "NGIPNJXA";
    const TTL = 86400;

    function __construct(){
        parent::__construct();
    }

    public function decodeToken($token){
      $this->load->library("JWT");
      try {
        return $this->jwt->decode($token, self::SECRET_KEY);
      } catch (Exception $e) {
        return null;
      } 
    }

    public function encodeToken($data){
      $this->load->library("JWT");
      return $this->jwt->encode(array(
          'id' => $data['id'],
          'username' => $data['username'],
          'level' => $data['level'],
          'startDate' => date(DATE_ISO8601, strtotime("now")),
          'ttl' => self::TTL
      ), self::SECRET_KEY);
    }
}