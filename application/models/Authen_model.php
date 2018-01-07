<?php
class Authen_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->model('Token_model');
    }

    public function signIn($data){

        // First, delete old captchas
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)->delete('captcha');

        // Then see if a captcha exists:
        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($data['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0)
        {
            return "captchaError";
        } else {
            $query = "SELECT * FROM account WHERE account_code = '".strtoupper($data["username"])."' AND account_password = '".$data["password"]."'";

            if($this->db->query($query)) {
                $result = $this->db->query($query)->row_array();
                if($result["account_id"] != null){
                    $token = $this->Token_model->encodeToken(
                        array(  "id" => $result["account_id"], 
                                "username" => $result["account_code"],
                                "level" => $result["account_level"]
                            ));

                    // Created login transaction
                    $id =  $this->Token_model->decodeToken($token)->id;
                    $query = "  INSERT INTO login_transaction (login_transaction_ip_address, login_transaction_datetime, login_transaction_domain, account_id) 
                                VALUES ('".$this->input->ip_address()."', 
                                        '".date("Y-m-d H:i:s")."', 
                                        '".$_SERVER["HTTP_REFERER"]."', 
                                        '".$id."'
                                        )";
                      $this->db->query($query);
                      return $token;
                    
                } else {
                    return "loginError";
                }
            } else {
                return "loginError";
            }
        }
    }
}
?>