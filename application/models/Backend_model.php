<?php
class Backend_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->model('Token_model');
    }

    public function getDigits(){
        $query = "SELECT * FROM digit";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getGreeting($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "SELECT account_code, account_nickname, account_level FROM account WHERE account_id = '".$id."'";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function setBetByType($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "  INSERT INTO setting_bet_by_type (digit_id, setting_bet_by_type_is_limit, setting_bet_by_type_amount, account_id)
                    VALUES (
                        '".$data["digit_id"]."',
                        '".$data["is_limit"]."',
                        '".$data["amount"]."',
                        '".$id."'
                        )";

        if($this->db->query($query)){
            return true;
        } else {
            return false;
        }
    }

    public function editBetByType($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "  UPDATE setting_bet_by_type
                    SET digit_id = '".$data["digit_id"]."',
                        setting_bet_by_type_is_limit = '".$data["is_limit"]."',
                        setting_bet_by_type_amount = '".$data["amount"]."'
                    WHERE setting_bet_by_type_id = '".$data["setting_bet_by_type_id"]."'
                    AND account_id = '".$id."'
                    ";

        if($this->db->query($query)){
            return true;
        } else {
            return false;
        }
    }

    public function deleteBetByType($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "  DELETE FROM setting_bet_by_type
                    WHERE setting_bet_by_type_id = '".$data["setting_bet_by_type_id"]."'
                    AND account_id = '".$id."'
                    ";

        if($this->db->query($query)){
            return true;
        } else {
            return false;
        }
    }

    public function getBetByType($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "  SELECT setting_bet_by_type.*, digit.digit_localization
                    FROM setting_bet_by_type
                    LEFT JOIN digit ON digit.digit_id = setting_bet_by_type.digit_id
                    WHERE account_id = '".$id."'";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getLottoRoundDate($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        if($id != null){
            $query = "SELECT lotto_round_id, DATE_FORMAT(lotto_round_date,'%d/%m/%Y') AS round_date FROM lotto_round ORDER BY lotto_round_date DESC";
            $result = $this->db->query($query)->result();
            return $result;
        } else {
            return false;
        }
    }

    public function setBetByDigit($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "  INSERT INTO setting_bet_by_digit (
                        account_id,
                        digit_id,
                        digit,
                        setting_bet_by_digit_is_limit,
                        setting_bet_by_digit_amount,
                        lotto_round_id,
                        created_by,
                        created_date)
                    VALUES (
                        '".$id."',
                        '".$data["digit_id"]."',
                        '".$data["digit"]."',
                        '".$data["is_limit"]."',
                        '".$data["amount"]."',
                        '".$data["lotto_round_id"]."',
                        '".$id."',
                        '".date("Y-m-d H:i:s")."'
                        )";

        if($this->db->query($query)){
            return true;
        } else {
            return false;
        }
    }

    public function getBetByDigit($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "  SELECT setting_bet_by_digit.*, account.account_code, digit.digit_localization, digit.digit_max_length, lotto_round.lotto_round_date
                    FROM setting_bet_by_digit
                    LEFT JOIN account ON account.account_id = setting_bet_by_digit.account_id
                    LEFT JOIN digit ON digit.digit_id = setting_bet_by_digit.digit_id
                    LEFT JOIN lotto_round ON lotto_round.lotto_round_id = setting_bet_by_digit.lotto_round_id
                    WHERE setting_bet_by_digit.account_id = '".$id."' AND setting_bet_by_digit.lotto_round_id = '".$data["lotto_round_id"]."'";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function editBetByDigit($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "  UPDATE setting_bet_by_digit
                    SET digit_id = '".$data["digit_id"]."',
                        digit = '".$data["digit"]."',
                        setting_bet_by_digit_is_limit = '".$data["is_limit"]."',
                        setting_bet_by_digit_amount = '".$data["amount"]."'
                    WHERE setting_bet_by_digit_id = '".$data["setting_bet_by_digit_id"]."'
                    AND lotto_round_id = '".$data["lotto_round_id"]."'
                    AND account_id = '".$id."'";

        if($this->db->query($query)){
            return true;
        } else {
            return false;
        }
    }

    public function deleteBetByDigit($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id;
        $query = "  DELETE FROM setting_bet_by_digit
                    WHERE setting_bet_by_digit_id = '".$data["setting_bet_by_digit_id"]."'
                    AND account_id = '".$id."'
                    ";

        if($this->db->query($query)){
            return true;
        } else {
            return false;
        }
    }

    public function getCurrentBalanceByAccountCode($token, $account_id){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only
        if($id != null){
            // $query = "  SELECT credit_transaction_balance
            //             FROM credit_transaction
            //             WHERE account_id = '".$account_id."'
            //             ORDER BY credit_transaction_id DESC
            //             LIMIT 1";
            // $result = $this->db->query($query)->result();

            /*
            // SUM INCOME OF SENIOR
            $income_credit_transaction_value = "SELECT SUM(credit_transaction_value) AS income FROM credit_transaction WHERE account_id = '".$account_id."' AND credit_transaction_type = 1";
            $result_income_credit_transaction_value = $this->db->query($income_credit_transaction_value)->row_array()["income"];
            // SUM EXPENSE
            $expense_credit_transaction_value = "SELECT SUM(credit_transaction_value) AS expense FROM credit_transaction WHERE account_id = '".$account_id."' AND credit_transaction_type = 2";
            $result_expense_credit_transaction_value = $this->db->query($expense_credit_transaction_value)->row_array()["expense"];
            // REMAINING BALANCE
            $remaining_balance = $result_income_credit_transaction_value - $result_expense_credit_transaction_value;
            */
            // SUM INCOME OF SENIOR
            $income_credit_transaction_value = "SELECT SUM(credit) AS income FROM credit_senior WHERE account_id = '".$account_id."' AND transaction_type = 1 AND account_id_master IS NULL";
            $result_income_credit_transaction_value = $this->db->query($income_credit_transaction_value)->row_array()["income"];
            // SUM EXPENSE
            $expense_credit_transaction_value = "SELECT SUM(credit) AS expense FROM credit_senior WHERE account_id = '".$account_id."' AND transaction_type = 1 AND account_id_master IS NOT NULL";
            $result_expense_credit_transaction_value = $this->db->query($expense_credit_transaction_value)->row_array()["expense"];
            // REMAINING BALANCE
            $remaining_balance = $result_income_credit_transaction_value - $result_expense_credit_transaction_value;

            return $remaining_balance;
        } else {
            return null;
        }
    }

    public function getLastAccountCodeFromSeniorLevel($token, $account_level){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only
        if($id != null){
            $query = "SELECT account_code
                        FROM account
                        WHERE account_level = '".$account_level."'
                        ORDER BY account_code DESC
                        LIMIT 1";
            $result = $this->db->query($query)->row_array()["account_code"];
            if($result == null){
                return "AA";
            } else {
                $arr = str_split($result);
                // Logic for generate account code
                // Fisrt step convert number to ASCII code
                $ASCII_of_first_char = ord($arr[0]);
                $ASCII_of_second_char = ord($arr[1]);

                if($ASCII_of_second_char == 90) {
                    $ASCII_of_first_char += 1;
                    $ASCII_of_second_char = 65;
                } else {
                    $ASCII_of_second_char += 1;
                }

                $output = chr($ASCII_of_first_char).chr($ASCII_of_second_char);

                return $output;
            }
        }
    }

    public function getLastAccountCodeFromMasterLevel($token, $account_level, $account_id){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only
        if($id != null){
            $query = "SELECT account_code
                        FROM account
                        WHERE account_level = '".$account_level."'
                        ORDER BY account_code DESC
                        LIMIT 1";
            $result = $this->db->query($query)->row_array()["account_code"];
            if($result == null){
                return "AA";
            } else {
                $arr = str_split($result);
                // Logic for generate account code
                // Fisrt step convert number to ASCII code
                $ASCII_of_first_char = ord($arr[0]);
                $ASCII_of_second_char = ord($arr[1]);

                if($ASCII_of_second_char == 90) {
                    $ASCII_of_first_char += 1;
                    $ASCII_of_second_char = 65;
                } else {
                    $ASCII_of_second_char += 1;
                }

                $output = chr($ASCII_of_first_char).chr($ASCII_of_second_char);

                return $output;
            }
        }
    }

    public function getAccountCodeUnderSpecificLevel($token, $account_level){
        $data = $this->Token_model->decodeToken($token);

        $id =  $data->id;
        $level =  $data->level;
        $account_code = $data->username;

        if($level == 4){
            // 4 is root, they can see all account
            $sql_under_root = "     SELECT account_id, account_code, account_firstname, account_lastname, account_nickname
                                    FROM account
                                    WHERE account_level = '".$account_level."' AND account_is_deleted = '0'";

            $result_under_root = $this->db->query($sql_under_root)->result();
            return $result_under_root;
        } else {
            // Out of root account they only see account under them
            /*
            0: Senior -------- AB
            1: Master -------- AB00
            2: Agent  -------- AB0000
            3: Member -------- AB0000000
            */
            if($account_level == 1){
                $account_code = substr($account_code, 0, 2);
            } else if ($account_level == 2){
                $account_code = substr($account_code, 0, 4);
            } else if ($account_level == 3){
                $account_code = substr($account_code, 0, 6);
            }

            $sql_under = "  SELECT account_id, account_code, account_firstname, account_lastname, account_nickname
                            FROM account
                            WHERE account_level = '".$account_level."'
                            AND account_code LIKE '".$account_code."%'
                            AND account_is_deleted = '0'";
            $result_under = $this->db->query($sql_under)->result();
            return $result_under;
        }
    }

    public function getLastAccountCodeFromLevelSelection($token, $account_level, $account_code){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only
            /*
            0: Senior -------- AB
            1: Master -------- AB00
            2: Agent  -------- AB0000
            3: Member -------- AB0000000
            */
        if($id != null){
            $query = "  SELECT account_code
                        FROM account
                        WHERE account_level = '".$account_level."'
                        AND account_code LIKE '".$account_code."%'
                        ORDER BY account_code DESC
                        LIMIT 1";
            $result = $this->db->query($query)->row_array()["account_code"];
            if($result == null){
                if($account_level != 3){
                    return "00";
                } else {
                    return "000";
                }
            } else {

                if($account_level != 3) {
                    $arr = substr($result, -2);
                    $increase_value = $arr += 1;
                    $result = sprintf('%02d', $increase_value);
                } else {
                    $arr = substr($result, -3);
                    $increase_value = $arr += 1;
                    $result = sprintf('%03d', $increase_value);
                }
                return $result;
            }
        }
    }

    public function getMinMaxReward($token, $account_id){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only
        if($id != null){
            /* 1 คือ ขั้นต่ำ 2 คือสูงสุด 3 คือ สูงสุด 1 หมายเลข และ 4 คือ รางวัล */
            $query_min = "SELECT * FROM min_max_reward WHERE min_max_reward_type = 1 AND account_id = '".$account_id."'";
            $result_min = $this->db->query($query_min)->result();

            $query_max = "SELECT * FROM min_max_reward WHERE min_max_reward_type = 2 AND account_id = '".$account_id."'";
            $result_max = $this->db->query($query_max)->result();

            $query_top = "SELECT * FROM min_max_reward WHERE min_max_reward_type = 3 AND account_id = '".$account_id."'";
            $result_top = $this->db->query($query_top)->result();

            $query_reward = "SELECT * FROM min_max_reward WHERE min_max_reward_type = 4 AND account_id = '".$account_id."'";
            $result_reward = $this->db->query($query_reward)->result();

            $result_array = array(
                "min" => $result_min,
                "max" => $result_max,
                "top" => $result_top,
                "reward" => $result_reward
            );

            return $result_array;
        }
    }

    public function getPercentCommission($token, $account_id){
      $id =  $this->Token_model->decodeToken($token)->id; // Validate token only
      if($id != null){

        $query = "SELECT * FROM commission WHERE account_id = '".$account_id."' ORDER BY commission_id DESC LIMIT 1";
        $result = $this->db->query($query)->row_array();
        
        $loop_3d_top = $this->Backend_model->helperLoop($result["value_3d_top"]);
        $loop_3d_bottom = $this->Backend_model->helperLoop($result["value_3d_bottom"]);
        $loop_3d_top_roll = $this->Backend_model->helperLoop($result["value_3d_top_roll"]);
        $loop_2d_top = $this->Backend_model->helperLoop($result["value_2d_top"]);
        $loop_2d_bottom = $this->Backend_model->helperLoop($result["value_2d_bottom"]);
        $loop_2d_top_roll = $this->Backend_model->helperLoop($result["value_2d_top_roll"]);
        $loop_1d_top = $this->Backend_model->helperLoop($result["value_1d_top"]);
        $loop_1d_bottom = $this->Backend_model->helperLoop($result["value_1d_bottom"]);
        $loop_19_roll_top = $this->Backend_model->helperLoop($result["value_19_roll_top"]);
        $loop_19_roll_bottom = $this->Backend_model->helperLoop($result["value_19_roll_bottom"]);

        $result_array = array(
            "loop_3d_top" => $loop_3d_top,
            "loop_3d_bottom" => $loop_3d_bottom,
            "loop_3d_top_roll" => $loop_3d_top_roll,
            "loop_2d_top" => $loop_2d_top,
            "loop_2d_bottom" => $loop_2d_bottom,
            "loop_2d_top_roll" => $loop_2d_top_roll,
            "loop_1d_top" => $loop_1d_top,
            "loop_1d_bottom" => $loop_1d_bottom,
            "loop_19_roll_top" => $loop_19_roll_top,
            "loop_19_roll_bottom" => $loop_19_roll_bottom
        );

        return $result_array;
      }
    }

    public function helperLoop($value){
      $data=array();
      for($i = 0; $i < $value; $i++){
        $data[$i] = array (
          'id' => $i+1,
          'label' => $i+1,
        );
      }

      return $data;
    }

    public function getPercentSharedWhenCreateMaster($token, $account_id){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only
        
        if($id != null){

        // $query = "SELECT * FROM pt_shared WHERE pt_shared_type = 2 AND account_id = '".$account_id."' ORDER BY pt_shared_id DESC LIMIT 1";
        // Get account level
        $sql_level = "SELECT account_level FROM account WHERE account_id = '".$account_id."'";
        $result = $this->db->query($sql_level)->row_array()["account_level"];

        if($result == 0){ // Senior
            $query = "SELECT * FROM pt_shared_senior WHERE account_id = '".$account_id."'";
        } else if($result == 1){ // master
            $query = "SELECT * FROM pt_shared_master WHERE account_id = '".$account_id."'";
        } else if($result == 2){ // agent
            $query = "SELECT * FROM pt_shared_agent WHERE account_id = '".$account_id."'";
        }
        
        $result = $this->db->query($query)->row_array();

            $result_array = array(
                "pt_shared_3d_top_when_select_master" => $result["value_3d_top"],
                "pt_shared_3d_bottom_when_select_master" => $result["value_3d_bottom"],
                "pt_shared_3d_top_roll_when_select_master" => $result["value_3d_top_roll"],
                "pt_shared_2d_top_when_select_master" => $result["value_2d_top"],
                "pt_shared_2d_bottom_when_select_master" => $result["value_2d_bottom"],
                "pt_shared_2d_top_roll_when_select_master" => $result["value_2d_top_roll"],
                "pt_shared_1d_top_when_select_master" => $result["value_1d_top"],
                "pt_shared_1d_bottom_when_select_master" => $result["value_1d_bottom"],
                "pt_shared_19_roll_top_when_select_master" => $result["value_19_roll_top"],
                "pt_shared_19_roll_bottom_when_select_master" => $result["value_19_roll_bottom"]
            );

            return $result_array;
        }
    }

    public function addMaster($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only

        if($id != null){
            $this->db->trans_start();
            
            $input_account = [
                                'account_code' => $data["account_detail"]["user_code"], 
                                'account_level' => $data["account_detail"]["level_id"],
                                'account_password' => $data["account_detail"]["password"],
                                'account_firstname' => $data["account_detail"]["name"],
                                'account_lastname' => $data["account_detail"]["lastname"],
                                'account_telephone' => $data["account_detail"]["telephone"],
                                'account_mobile' => $data["account_detail"]["mobile"],
                                'account_nickname' => '',
                                'account_currency' => 'THB',
                                'account_status' => 1,
                                'account_is_deleted' => 0,
                                'account_created_date' => date("Y-m-d H:i:s"),
                                'created_by' => $id,
                                'is_under_account' => $data["account_detail"]["under_account_id"],                                
                            ];

            $this->db->insert('account', $input_account);
            $return_account_id = $this->db->insert_id();

            $input_credit_transaction = [
                'account_id' => $return_account_id,
                'credit_transaction_type' => 1,
                'credit_transaction_remark' => 'เครดิตได้มาจาก การตั้งค่าขณะเพิ่มข้อมูลผู้ใช้',
                'credit_transaction_value' => $data["account_detail"]["credit"],
                'credit_transaction_balance' => $data["account_detail"]["credit"]
            ];
            $this->db->insert('credit_transaction', $input_credit_transaction);

            // Use this method instead of table credit_transaction
            // $input_credit_senior = [
            //     'account_id' => $data["account_detail"]["under_account_id"],
            //     'transaction_type' => 1,
            //     'credit' => $data["account_detail"]["credit"],
            //     'account_id_master' => $return_account_id,
            //     'credit_senior_last_updated' => date("Y-m-d H:i:s")
            // ];
            // $this->db->insert('credit_senior', $input_credit_senior);

            $input_credit_top_level = [
                'account_id' => $data["account_detail"]["under_account_id"],
                'transaction_type' => 1,
                'credit' => $data["account_detail"]["credit"],
                'account_id_master' => $return_account_id,
                'credit_senior_last_updated' => date("Y-m-d H:i:s")
            ];
            $this->db->insert('credit_senior', $input_credit_top_level);

            $input_min = [
                'min_max_reward_type' => 1,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["min"]["value_3d_top"],
                'value_3d_bottom' => $data["min"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["min"]["value_3d_top_roll"],
                'value_2d_top' => $data["min"]["value_2d_top"],
                'value_2d_bottom' => $data["min"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["min"]["value_2d_top_roll"],
                'value_1d_top' => $data["min"]["value_1d_top"],
                'value_1d_bottom' => $data["min"]["value_1d_bottom"],
                'value_19_roll_top' => $data["min"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["min"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_min);

            $input_max = [
                'min_max_reward_type' => 2,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["max"]["value_3d_top"],
                'value_3d_bottom' => $data["max"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["max"]["value_3d_top_roll"],
                'value_2d_top' => $data["max"]["value_2d_top"],
                'value_2d_bottom' => $data["max"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["max"]["value_2d_top_roll"],
                'value_1d_top' => $data["max"]["value_1d_top"],
                'value_1d_bottom' => $data["max"]["value_1d_bottom"],
                'value_19_roll_top' => $data["max"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["max"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_max);

            $input_top = [
                'min_max_reward_type' => 3,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["top"]["value_3d_top"],
                'value_3d_bottom' => $data["top"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["top"]["value_3d_top_roll"],
                'value_2d_top' => $data["top"]["value_2d_top"],
                'value_2d_bottom' => $data["top"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["top"]["value_2d_top_roll"],
                'value_1d_top' => $data["top"]["value_1d_top"],
                'value_1d_bottom' => $data["top"]["value_1d_bottom"],
                'value_19_roll_top' => $data["top"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["top"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_top);

            $input_reward = [
                'min_max_reward_type' => 4,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["reward"]["value_3d_top"],
                'value_3d_bottom' => $data["reward"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["reward"]["value_3d_top_roll"],
                'value_2d_top' => $data["reward"]["value_2d_top"],
                'value_2d_bottom' => $data["reward"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["reward"]["value_2d_top_roll"],
                'value_1d_top' => $data["reward"]["value_1d_top"],
                'value_1d_bottom' => $data["reward"]["value_1d_bottom"],
                'value_19_roll_top' => $data["reward"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["reward"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_reward);

            $input_commission = [
                'account_id' => $return_account_id,
                'value_3d_top' => $data["commission"]["selected_percentCommission_3d_top"],
                'value_3d_bottom' => $data["commission"]["selected_percentCommission_3d_bottom"],
                'value_3d_top_roll' => $data["commission"]["selected_percentCommission_3d_top_roll"],
                'value_2d_top' => $data["commission"]["selected_percentCommission_2d_top"],
                'value_2d_bottom' => $data["commission"]["selected_percentCommission_2d_bottom"],
                'value_2d_top_roll' => $data["commission"]["selected_percentCommission_2d_top_roll"],
                'value_1d_top' => $data["commission"]["selected_percentCommission_1d_top"],
                'value_1d_bottom' => $data["commission"]["selected_percentCommission_1d_bottom"],
                'value_19_roll_top' => $data["commission"]["selected_percentCommission_19_roll_top"],
                'value_19_roll_bottom' => $data["commission"]["selected_percentCommission_19_roll_bottom"]
            ];
            $this->db->insert('commission', $input_commission);

            // Get pt_shared_senior_id
            $sql_pt_shared_senior_id = "SELECT pt_shared_senior_id FROM pt_shared_senior WHERE account_id = '".$data["account_detail"]["under_account_id"]."'";
            $result_pt_shared_senior_id = $this->db->query($sql_pt_shared_senior_id)->row_array()["pt_shared_senior_id"];

            $input_shared_master = [
                'account_id' => $return_account_id,
                //'pt_shared_type' => 1,
                'value_3d_top' => $data["shared"]["selected_master_pt_3d_top"],
                'value_3d_bottom' => $data["shared"]["selected_master_pt_3d_bottom"],
                'value_3d_top_roll' => $data["shared"]["selected_master_pt_3d_top_roll"],
                'value_2d_top' => $data["shared"]["selected_master_pt_2d_top"],
                'value_2d_bottom' => $data["shared"]["selected_master_pt_2d_bottom"],
                'value_2d_top_roll' => $data["shared"]["selected_master_pt_2d_top_roll"],
                'value_1d_top' => $data["shared"]["selected_master_pt_1d_top"],
                'value_1d_bottom' => $data["shared"]["selected_master_pt_1d_bottom"],
                'value_19_roll_top' => $data["shared"]["selected_master_pt_19_roll_top"],
                'value_19_roll_bottom' => $data["shared"]["selected_master_pt_19_roll_bottom"],
                'pt_shared_senior_id' => $result_pt_shared_senior_id
            ];
            //$this->db->insert('pt_shared', $input_shared_master);
            $this->db->insert('pt_shared_master', $input_shared_master);

            // $input_shared_senior = [
            //     'account_id' => $return_account_id,
            //     //'pt_shared_type' => 2,
            //     'value_3d_top' => $data["shared"]["selected_senior_pt_3d_top"],
            //     'value_3d_bottom' => $data["shared"]["selected_senior_pt_3d_bottom"],
            //     'value_3d_top_roll' => $data["shared"]["selected_senior_pt_3d_top_roll"],
            //     'value_2d_top' => $data["shared"]["selected_senior_pt_2d_top"],
            //     'value_2d_bottom' => $data["shared"]["selected_senior_pt_2d_bottom"],
            //     'value_2d_top_roll' => $data["shared"]["selected_senior_pt_2d_top_roll"],
            //     'value_1d_top' => $data["shared"]["selected_senior_pt_1d_top"],
            //     'value_1d_bottom' => $data["shared"]["selected_senior_pt_1d_bottom"],
            //     'value_19_roll_top' => $data["shared"]["selected_senior_pt_19_roll_top"],
            //     'value_19_roll_bottom' => $data["shared"]["selected_senior_pt_19_roll_bottom"]
            // ];
            //$this->db->insert('pt_shared', $input_shared_senior);

            $input_take_pt_shared = [
                'account_id' => $return_account_id,
                'value_3d_top' => $data["take"]["take_3d_top"],
                'value_3d_bottom' => $data["take"]["take_3d_bottom"],
                'value_3d_top_roll' => $data["take"]["take_3d_top_roll"],
                'value_2d_top' => $data["take"]["take_2d_top"],
                'value_2d_bottom' => $data["take"]["take_2d_bottom"],
                'value_2d_top_roll' => $data["take"]["take_2d_top_roll"],
                'value_1d_top' => $data["take"]["take_1d_top"],
                'value_1d_bottom' => $data["take"]["take_1d_bottom"],
                'value_19_roll_top' => $data["take"]["take_19_roll_top"],
                'value_19_roll_bottom' => $data["take"]["take_19_roll_bottom"],
                'under_account_id' => $data["account_detail"]["under_account_id"]
            ];
            $this->db->insert('take_pt_shared', $input_take_pt_shared);

            $this->db->trans_complete();

            return true;
        }
    }

    public function addAgent($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only

        if($id != null){
            $this->db->trans_start();
            
            $input_account = [
                                'account_code' => $data["account_detail"]["user_code"], 
                                'account_level' => $data["account_detail"]["level_id"],
                                'account_password' => $data["account_detail"]["password"],
                                'account_firstname' => $data["account_detail"]["name"],
                                'account_lastname' => $data["account_detail"]["lastname"],
                                'account_telephone' => $data["account_detail"]["telephone"],
                                'account_mobile' => $data["account_detail"]["mobile"],
                                'account_nickname' => '',
                                'account_currency' => 'THB',
                                'account_status' => 1,
                                'account_is_deleted' => 0,
                                'account_created_date' => date("Y-m-d H:i:s"),
                                'created_by' => $id,
                                'is_under_account' => $data["account_detail"]["under_account_id"],                                
                            ];

            $this->db->insert('account', $input_account);
            $return_account_id = $this->db->insert_id();

            $input_credit_transaction = [
                'account_id' => $return_account_id,
                'credit_transaction_type' => 1,
                'credit_transaction_remark' => 'เครดิตได้มาจาก การตั้งค่าขณะเพิ่มข้อมูลผู้ใช้',
                'credit_transaction_value' => $data["account_detail"]["credit"],
                'credit_transaction_balance' => $data["account_detail"]["credit"]
            ];
            $this->db->insert('credit_transaction', $input_credit_transaction);

            // Use this method instead of table credit_transaction
            $input_credit_senior = [
                'account_id' => $data["account_detail"]["under_account_id"],
                'transaction_type' => 1,
                'credit' => $data["account_detail"]["credit"],
                'account_id_master' => $return_account_id,
                'credit_senior_last_updated' => date("Y-m-d H:i:s")
            ];
            $this->db->insert('credit_senior', $input_credit_senior);

            $input_credit_top_level = [
                'account_id' => $data["account_detail"]["under_account_id"],
                'transaction_type' => 2,
                'credit' => $data["account_detail"]["credit"],
                'account_id_master' => $return_account_id,
                'credit_senior_last_updated' => date("Y-m-d H:i:s")
            ];
            $this->db->insert('credit_senior', $input_credit_top_level);

            $input_min = [
                'min_max_reward_type' => 1,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["min"]["value_3d_top"],
                'value_3d_bottom' => $data["min"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["min"]["value_3d_top_roll"],
                'value_2d_top' => $data["min"]["value_2d_top"],
                'value_2d_bottom' => $data["min"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["min"]["value_2d_top_roll"],
                'value_1d_top' => $data["min"]["value_1d_top"],
                'value_1d_bottom' => $data["min"]["value_1d_bottom"],
                'value_19_roll_top' => $data["min"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["min"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_min);

            $input_max = [
                'min_max_reward_type' => 2,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["max"]["value_3d_top"],
                'value_3d_bottom' => $data["max"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["max"]["value_3d_top_roll"],
                'value_2d_top' => $data["max"]["value_2d_top"],
                'value_2d_bottom' => $data["max"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["max"]["value_2d_top_roll"],
                'value_1d_top' => $data["max"]["value_1d_top"],
                'value_1d_bottom' => $data["max"]["value_1d_bottom"],
                'value_19_roll_top' => $data["max"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["max"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_max);

            $input_top = [
                'min_max_reward_type' => 3,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["top"]["value_3d_top"],
                'value_3d_bottom' => $data["top"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["top"]["value_3d_top_roll"],
                'value_2d_top' => $data["top"]["value_2d_top"],
                'value_2d_bottom' => $data["top"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["top"]["value_2d_top_roll"],
                'value_1d_top' => $data["top"]["value_1d_top"],
                'value_1d_bottom' => $data["top"]["value_1d_bottom"],
                'value_19_roll_top' => $data["top"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["top"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_top);

            $input_reward = [
                'min_max_reward_type' => 4,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["reward"]["value_3d_top"],
                'value_3d_bottom' => $data["reward"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["reward"]["value_3d_top_roll"],
                'value_2d_top' => $data["reward"]["value_2d_top"],
                'value_2d_bottom' => $data["reward"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["reward"]["value_2d_top_roll"],
                'value_1d_top' => $data["reward"]["value_1d_top"],
                'value_1d_bottom' => $data["reward"]["value_1d_bottom"],
                'value_19_roll_top' => $data["reward"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["reward"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_reward);

            $input_commission = [
                'account_id' => $return_account_id,
                'value_3d_top' => $data["commission"]["selected_percentCommission_3d_top"],
                'value_3d_bottom' => $data["commission"]["selected_percentCommission_3d_bottom"],
                'value_3d_top_roll' => $data["commission"]["selected_percentCommission_3d_top_roll"],
                'value_2d_top' => $data["commission"]["selected_percentCommission_2d_top"],
                'value_2d_bottom' => $data["commission"]["selected_percentCommission_2d_bottom"],
                'value_2d_top_roll' => $data["commission"]["selected_percentCommission_2d_top_roll"],
                'value_1d_top' => $data["commission"]["selected_percentCommission_1d_top"],
                'value_1d_bottom' => $data["commission"]["selected_percentCommission_1d_bottom"],
                'value_19_roll_top' => $data["commission"]["selected_percentCommission_19_roll_top"],
                'value_19_roll_bottom' => $data["commission"]["selected_percentCommission_19_roll_bottom"]
            ];
            $this->db->insert('commission', $input_commission);

            // $input_shared_master = [ // alias master => agent
            //     'account_id' => $return_account_id,
            //     'pt_shared_type' => 3,
            //     'value_3d_top' => $data["shared"]["selected_master_pt_3d_top"],
            //     'value_3d_bottom' => $data["shared"]["selected_master_pt_3d_bottom"],
            //     'value_3d_top_roll' => $data["shared"]["selected_master_pt_3d_top_roll"],
            //     'value_2d_top' => $data["shared"]["selected_master_pt_2d_top"],
            //     'value_2d_bottom' => $data["shared"]["selected_master_pt_2d_bottom"],
            //     'value_2d_top_roll' => $data["shared"]["selected_master_pt_2d_top_roll"],
            //     'value_1d_top' => $data["shared"]["selected_master_pt_1d_top"],
            //     'value_1d_bottom' => $data["shared"]["selected_master_pt_1d_bottom"],
            //     'value_19_roll_top' => $data["shared"]["selected_master_pt_19_roll_top"],
            //     'value_19_roll_bottom' => $data["shared"]["selected_master_pt_19_roll_bottom"]
            // ];
            // $this->db->insert('pt_shared', $input_shared_master);

            // $input_shared_senior = [ // alias senior => master
            //     'account_id' => $return_account_id,
            //     'pt_shared_type' => 1,
            //     'value_3d_top' => $data["shared"]["selected_senior_pt_3d_top"],
            //     'value_3d_bottom' => $data["shared"]["selected_senior_pt_3d_bottom"],
            //     'value_3d_top_roll' => $data["shared"]["selected_senior_pt_3d_top_roll"],
            //     'value_2d_top' => $data["shared"]["selected_senior_pt_2d_top"],
            //     'value_2d_bottom' => $data["shared"]["selected_senior_pt_2d_bottom"],
            //     'value_2d_top_roll' => $data["shared"]["selected_senior_pt_2d_top_roll"],
            //     'value_1d_top' => $data["shared"]["selected_senior_pt_1d_top"],
            //     'value_1d_bottom' => $data["shared"]["selected_senior_pt_1d_bottom"],
            //     'value_19_roll_top' => $data["shared"]["selected_senior_pt_19_roll_top"],
            //     'value_19_roll_bottom' => $data["shared"]["selected_senior_pt_19_roll_bottom"]
            // ];
            // $this->db->insert('pt_shared', $input_shared_senior);

            // Get pt_shared_senior_id
            $sql_pt_shared_master_id = "SELECT pt_shared_master_id FROM pt_shared_master WHERE account_id = '".$data["account_detail"]["under_account_id"]."'";
            $result_pt_shared_master_id = $this->db->query($sql_pt_shared_master_id)->row_array()["pt_shared_master_id"];

            $input_shared_master = [
                'account_id' => $return_account_id,
                //'pt_shared_type' => 1,
                'value_3d_top' => $data["shared"]["selected_master_pt_3d_top"],
                'value_3d_bottom' => $data["shared"]["selected_master_pt_3d_bottom"],
                'value_3d_top_roll' => $data["shared"]["selected_master_pt_3d_top_roll"],
                'value_2d_top' => $data["shared"]["selected_master_pt_2d_top"],
                'value_2d_bottom' => $data["shared"]["selected_master_pt_2d_bottom"],
                'value_2d_top_roll' => $data["shared"]["selected_master_pt_2d_top_roll"],
                'value_1d_top' => $data["shared"]["selected_master_pt_1d_top"],
                'value_1d_bottom' => $data["shared"]["selected_master_pt_1d_bottom"],
                'value_19_roll_top' => $data["shared"]["selected_master_pt_19_roll_top"],
                'value_19_roll_bottom' => $data["shared"]["selected_master_pt_19_roll_bottom"],
                'pt_shared_master_id' => $result_pt_shared_master_id
            ];
            //$this->db->insert('pt_shared', $input_shared_master);
            $this->db->insert('pt_shared_agent', $input_shared_master);

            $input_take_pt_shared = [
                'account_id' => $return_account_id,
                'value_3d_top' => $data["take"]["take_3d_top"],
                'value_3d_bottom' => $data["take"]["take_3d_bottom"],
                'value_3d_top_roll' => $data["take"]["take_3d_top_roll"],
                'value_2d_top' => $data["take"]["take_2d_top"],
                'value_2d_bottom' => $data["take"]["take_2d_bottom"],
                'value_2d_top_roll' => $data["take"]["take_2d_top_roll"],
                'value_1d_top' => $data["take"]["take_1d_top"],
                'value_1d_bottom' => $data["take"]["take_1d_bottom"],
                'value_19_roll_top' => $data["take"]["take_19_roll_top"],
                'value_19_roll_bottom' => $data["take"]["take_19_roll_bottom"],
                'under_account_id' => $data["account_detail"]["under_account_id"]
            ];
            $this->db->insert('take_pt_shared', $input_take_pt_shared);

            $this->db->trans_complete();

            return true;
        }
    }

    public function addMember($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only

        if($id != null){
            $this->db->trans_start();
            
            $input_account = [
                                'account_code' => $data["account_detail"]["user_code"], 
                                'account_level' => $data["account_detail"]["level_id"],
                                'account_password' => $data["account_detail"]["password"],
                                'account_firstname' => $data["account_detail"]["name"],
                                'account_lastname' => $data["account_detail"]["lastname"],
                                'account_telephone' => $data["account_detail"]["telephone"],
                                'account_mobile' => $data["account_detail"]["mobile"],
                                'account_nickname' => '',
                                'account_currency' => 'THB',
                                'account_status' => 1,
                                'account_is_deleted' => 0,
                                'account_created_date' => date("Y-m-d H:i:s"),
                                'created_by' => $id,
                                'is_under_account' => $data["account_detail"]["under_account_id"],                                
                            ];

            $this->db->insert('account', $input_account);
            $return_account_id = $this->db->insert_id();

            $input_credit_transaction = [
                'account_id' => $return_account_id,
                'credit_transaction_type' => 1,
                'credit_transaction_remark' => 'เครดิตได้มาจาก การตั้งค่าขณะเพิ่มข้อมูลผู้ใช้',
                'credit_transaction_value' => $data["account_detail"]["credit"],
                'credit_transaction_balance' => $data["account_detail"]["credit"]
            ];
            $this->db->insert('credit_transaction', $input_credit_transaction);

            // Use this method instead of table credit_transaction
            $input_credit_senior = [
                'account_id' => $data["account_detail"]["under_account_id"],
                'transaction_type' => 1,
                'credit' => $data["account_detail"]["credit"],
                'account_id_master' => $return_account_id,
                'credit_senior_last_updated' => date("Y-m-d H:i:s")
            ];
            $this->db->insert('credit_senior', $input_credit_senior);

            $input_credit_top_level = [
                'account_id' => $data["account_detail"]["under_account_id"],
                'transaction_type' => 2,
                'credit' => $data["account_detail"]["credit"],
                'account_id_master' => $return_account_id,
                'credit_senior_last_updated' => date("Y-m-d H:i:s")
            ];
            $this->db->insert('credit_senior', $input_credit_top_level);

            $input_min = [
                'min_max_reward_type' => 1,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["min"]["value_3d_top"],
                'value_3d_bottom' => $data["min"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["min"]["value_3d_top_roll"],
                'value_2d_top' => $data["min"]["value_2d_top"],
                'value_2d_bottom' => $data["min"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["min"]["value_2d_top_roll"],
                'value_1d_top' => $data["min"]["value_1d_top"],
                'value_1d_bottom' => $data["min"]["value_1d_bottom"],
                'value_19_roll_top' => $data["min"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["min"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_min);

            $input_max = [
                'min_max_reward_type' => 2,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["max"]["value_3d_top"],
                'value_3d_bottom' => $data["max"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["max"]["value_3d_top_roll"],
                'value_2d_top' => $data["max"]["value_2d_top"],
                'value_2d_bottom' => $data["max"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["max"]["value_2d_top_roll"],
                'value_1d_top' => $data["max"]["value_1d_top"],
                'value_1d_bottom' => $data["max"]["value_1d_bottom"],
                'value_19_roll_top' => $data["max"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["max"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_max);

            $input_top = [
                'min_max_reward_type' => 3,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["top"]["value_3d_top"],
                'value_3d_bottom' => $data["top"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["top"]["value_3d_top_roll"],
                'value_2d_top' => $data["top"]["value_2d_top"],
                'value_2d_bottom' => $data["top"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["top"]["value_2d_top_roll"],
                'value_1d_top' => $data["top"]["value_1d_top"],
                'value_1d_bottom' => $data["top"]["value_1d_bottom"],
                'value_19_roll_top' => $data["top"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["top"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_top);

            $input_reward = [
                'min_max_reward_type' => 4,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["reward"]["value_3d_top"],
                'value_3d_bottom' => $data["reward"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["reward"]["value_3d_top_roll"],
                'value_2d_top' => $data["reward"]["value_2d_top"],
                'value_2d_bottom' => $data["reward"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["reward"]["value_2d_top_roll"],
                'value_1d_top' => $data["reward"]["value_1d_top"],
                'value_1d_bottom' => $data["reward"]["value_1d_bottom"],
                'value_19_roll_top' => $data["reward"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["reward"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_reward);

            $input_commission = [
                'account_id' => $return_account_id,
                'value_3d_top' => $data["commission"]["selected_percentCommission_3d_top"],
                'value_3d_bottom' => $data["commission"]["selected_percentCommission_3d_bottom"],
                'value_3d_top_roll' => $data["commission"]["selected_percentCommission_3d_top_roll"],
                'value_2d_top' => $data["commission"]["selected_percentCommission_2d_top"],
                'value_2d_bottom' => $data["commission"]["selected_percentCommission_2d_bottom"],
                'value_2d_top_roll' => $data["commission"]["selected_percentCommission_2d_top_roll"],
                'value_1d_top' => $data["commission"]["selected_percentCommission_1d_top"],
                'value_1d_bottom' => $data["commission"]["selected_percentCommission_1d_bottom"],
                'value_19_roll_top' => $data["commission"]["selected_percentCommission_19_roll_top"],
                'value_19_roll_bottom' => $data["commission"]["selected_percentCommission_19_roll_bottom"]
            ];
            $this->db->insert('commission', $input_commission);

            // $input_shared_senior = [ // alias senior => agent
            //     'account_id' => $return_account_id,
            //     'pt_shared_type' => 3,
            //     'value_3d_top' => $data["shared"]["selected_senior_pt_3d_top"],
            //     'value_3d_bottom' => $data["shared"]["selected_senior_pt_3d_bottom"],
            //     'value_3d_top_roll' => $data["shared"]["selected_senior_pt_3d_top_roll"],
            //     'value_2d_top' => $data["shared"]["selected_senior_pt_2d_top"],
            //     'value_2d_bottom' => $data["shared"]["selected_senior_pt_2d_bottom"],
            //     'value_2d_top_roll' => $data["shared"]["selected_senior_pt_2d_top_roll"],
            //     'value_1d_top' => $data["shared"]["selected_senior_pt_1d_top"],
            //     'value_1d_bottom' => $data["shared"]["selected_senior_pt_1d_bottom"],
            //     'value_19_roll_top' => $data["shared"]["selected_senior_pt_19_roll_top"],
            //     'value_19_roll_bottom' => $data["shared"]["selected_senior_pt_19_roll_bottom"]
            // ];
            // $this->db->insert('pt_shared', $input_shared_senior);

            // Get pt_shared_senior_id
            $sql_pt_shared_agent_id = "SELECT pt_shared_agent_id FROM pt_shared_agent WHERE account_id = '".$data["account_detail"]["under_account_id"]."'";
            $result_pt_shared_agent_id = $this->db->query($sql_pt_shared_agent_id)->row_array()["pt_shared_agent_id"];

            $input_shared_master = [
                'account_id' => $return_account_id,
                //'pt_shared_type' => 3,
                'value_3d_top' => $data["shared"]["selected_master_pt_3d_top"],
                'value_3d_bottom' => $data["shared"]["selected_master_pt_3d_bottom"],
                'value_3d_top_roll' => $data["shared"]["selected_master_pt_3d_top_roll"],
                'value_2d_top' => $data["shared"]["selected_master_pt_2d_top"],
                'value_2d_bottom' => $data["shared"]["selected_master_pt_2d_bottom"],
                'value_2d_top_roll' => $data["shared"]["selected_master_pt_2d_top_roll"],
                'value_1d_top' => $data["shared"]["selected_master_pt_1d_top"],
                'value_1d_bottom' => $data["shared"]["selected_master_pt_1d_bottom"],
                'value_19_roll_top' => $data["shared"]["selected_master_pt_19_roll_top"],
                'pt_shared_agent_id' => $result_pt_shared_agent_id
            ];
            //$this->db->insert('pt_shared', $input_shared_master);
            $this->db->insert('pt_shared_member', $input_shared_master);

            $this->db->trans_complete();

            return true;
        }
    }

    public function addSenior($token, $data){
        $id =  $this->Token_model->decodeToken($token)->id; // Validate token only

        if($id != null){
            $this->db->trans_start();
            
            $input_account = [
                                'account_code' => $data["account_detail"]["user_code"], 
                                'account_level' => $data["account_detail"]["level_id"],
                                'account_password' => $data["account_detail"]["password"],
                                'account_firstname' => $data["account_detail"]["name"],
                                'account_lastname' => $data["account_detail"]["lastname"],
                                'account_telephone' => $data["account_detail"]["telephone"],
                                'account_mobile' => $data["account_detail"]["mobile"],
                                'account_nickname' => '',
                                'account_currency' => 'THB',
                                'account_status' => 1,
                                'account_is_deleted' => 0,
                                'account_created_date' => date("Y-m-d H:i:s"),
                                'created_by' => $id,
                                'is_under_account' => 0                                
                            ];

            $this->db->insert('account', $input_account);
            $return_account_id = $this->db->insert_id();

            $input_credit_transaction = [
                'account_id' => $return_account_id,
                'credit_transaction_type' => 1,
                'credit_transaction_remark' => 'เครดิตได้มาจาก การตั้งค่าขณะเพิ่มข้อมูลผู้ใช้',
                'credit_transaction_value' => $data["account_detail"]["credit"],
                'credit_transaction_balance' => $data["account_detail"]["credit"]
            ];
            $this->db->insert('credit_transaction', $input_credit_transaction);

            // Use this method instead of table credit_transaction
            $input_credit_senior = [
                'account_id' => $return_account_id,
                'transaction_type' => 1,
                'credit' => $data["account_detail"]["credit"],
                'account_id_master' => null,
                'credit_senior_last_updated' => date("Y-m-d H:i:s")
            ];
            $this->db->insert('credit_senior', $input_credit_senior);


            $input_min = [
                'min_max_reward_type' => 1,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["min"]["value_3d_top"],
                'value_3d_bottom' => $data["min"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["min"]["value_3d_top_roll"],
                'value_2d_top' => $data["min"]["value_2d_top"],
                'value_2d_bottom' => $data["min"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["min"]["value_2d_top_roll"],
                'value_1d_top' => $data["min"]["value_1d_top"],
                'value_1d_bottom' => $data["min"]["value_1d_bottom"],
                'value_19_roll_top' => $data["min"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["min"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_min);

            $input_max = [
                'min_max_reward_type' => 2,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["max"]["value_3d_top"],
                'value_3d_bottom' => $data["max"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["max"]["value_3d_top_roll"],
                'value_2d_top' => $data["max"]["value_2d_top"],
                'value_2d_bottom' => $data["max"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["max"]["value_2d_top_roll"],
                'value_1d_top' => $data["max"]["value_1d_top"],
                'value_1d_bottom' => $data["max"]["value_1d_bottom"],
                'value_19_roll_top' => $data["max"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["max"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_max);

            $input_top = [
                'min_max_reward_type' => 3,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["top"]["value_3d_top"],
                'value_3d_bottom' => $data["top"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["top"]["value_3d_top_roll"],
                'value_2d_top' => $data["top"]["value_2d_top"],
                'value_2d_bottom' => $data["top"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["top"]["value_2d_top_roll"],
                'value_1d_top' => $data["top"]["value_1d_top"],
                'value_1d_bottom' => $data["top"]["value_1d_bottom"],
                'value_19_roll_top' => $data["top"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["top"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_top);

            $input_reward = [
                'min_max_reward_type' => 4,
                'account_id' => $return_account_id,
                'value_3d_top' => $data["reward"]["value_3d_top"],
                'value_3d_bottom' => $data["reward"]["value_3d_bottom"],
                'value_3d_top_roll' => $data["reward"]["value_3d_top_roll"],
                'value_2d_top' => $data["reward"]["value_2d_top"],
                'value_2d_bottom' => $data["reward"]["value_2d_bottom"],
                'value_2d_top_roll' => $data["reward"]["value_2d_top_roll"],
                'value_1d_top' => $data["reward"]["value_1d_top"],
                'value_1d_bottom' => $data["reward"]["value_1d_bottom"],
                'value_19_roll_top' => $data["reward"]["value_19_roll_top"],
                'value_19_roll_bottom' => $data["reward"]["value_19_roll_bottom"]
            ];
            $this->db->insert('min_max_reward', $input_reward);

            $input_commission = [
                'account_id' => $return_account_id,
                'value_3d_top' => $data["commission"]["selected_percentCommission_3d_top"],
                'value_3d_bottom' => $data["commission"]["selected_percentCommission_3d_bottom"],
                'value_3d_top_roll' => $data["commission"]["selected_percentCommission_3d_top_roll"],
                'value_2d_top' => $data["commission"]["selected_percentCommission_2d_top"],
                'value_2d_bottom' => $data["commission"]["selected_percentCommission_2d_bottom"],
                'value_2d_top_roll' => $data["commission"]["selected_percentCommission_2d_top_roll"],
                'value_1d_top' => $data["commission"]["selected_percentCommission_1d_top"],
                'value_1d_bottom' => $data["commission"]["selected_percentCommission_1d_bottom"],
                'value_19_roll_top' => $data["commission"]["selected_percentCommission_19_roll_top"],
                'value_19_roll_bottom' => $data["commission"]["selected_percentCommission_19_roll_bottom"]
            ];
            $this->db->insert('commission', $input_commission);

            $input_shared_master = [
                'account_id' => $return_account_id,
                //'pt_shared_type' => 2,
                'value_3d_top' => $data["shared"]["selected_master_pt_3d_top"],
                'value_3d_bottom' => $data["shared"]["selected_master_pt_3d_bottom"],
                'value_3d_top_roll' => $data["shared"]["selected_master_pt_3d_top_roll"],
                'value_2d_top' => $data["shared"]["selected_master_pt_2d_top"],
                'value_2d_bottom' => $data["shared"]["selected_master_pt_2d_bottom"],
                'value_2d_top_roll' => $data["shared"]["selected_master_pt_2d_top_roll"],
                'value_1d_top' => $data["shared"]["selected_master_pt_1d_top"],
                'value_1d_bottom' => $data["shared"]["selected_master_pt_1d_bottom"],
                'value_19_roll_top' => $data["shared"]["selected_master_pt_19_roll_top"],
                'value_19_roll_bottom' => $data["shared"]["selected_master_pt_19_roll_bottom"]
            ];
            // $this->db->insert('pt_shared', $input_shared_master);
            $this->db->insert('pt_shared_senior', $input_shared_master);

            // $input_shared_senior = [
            //     'account_id' => $return_account_id,
            //     'pt_shared_type' => 4,
            //     'value_3d_top' => $data["shared"]["selected_senior_pt_3d_top"],
            //     'value_3d_bottom' => $data["shared"]["selected_senior_pt_3d_bottom"],
            //     'value_3d_top_roll' => $data["shared"]["selected_senior_pt_3d_top_roll"],
            //     'value_2d_top' => $data["shared"]["selected_senior_pt_2d_top"],
            //     'value_2d_bottom' => $data["shared"]["selected_senior_pt_2d_bottom"],
            //     'value_2d_top_roll' => $data["shared"]["selected_senior_pt_2d_top_roll"],
            //     'value_1d_top' => $data["shared"]["selected_senior_pt_1d_top"],
            //     'value_1d_bottom' => $data["shared"]["selected_senior_pt_1d_bottom"],
            //     'value_19_roll_top' => $data["shared"]["selected_senior_pt_19_roll_top"],
            //     'value_19_roll_bottom' => $data["shared"]["selected_senior_pt_19_roll_bottom"]
            // ];
            // $this->db->insert('pt_shared', $input_shared_senior);

            $input_take_pt_shared = [
                'account_id' => $return_account_id,
                'value_3d_top' => $data["take"]["take_3d_top"],
                'value_3d_bottom' => $data["take"]["take_3d_bottom"],
                'value_3d_top_roll' => $data["take"]["take_3d_top_roll"],
                'value_2d_top' => $data["take"]["take_2d_top"],
                'value_2d_bottom' => $data["take"]["take_2d_bottom"],
                'value_2d_top_roll' => $data["take"]["take_2d_top_roll"],
                'value_1d_top' => $data["take"]["take_1d_top"],
                'value_1d_bottom' => $data["take"]["take_1d_bottom"],
                'value_19_roll_top' => $data["take"]["take_19_roll_top"],
                'value_19_roll_bottom' => $data["take"]["take_19_roll_bottom"],
                'under_account_id' => 0
            ];
            $this->db->insert('take_pt_shared', $input_take_pt_shared);

            $this->db->trans_complete();

            return true;
        }
    }

    public function getCoAccount($token, $status){
        $id =  $this->Token_model->decodeToken($token)->id;
        if($id != null){
            
            if($status == '') {
                $query = "  SELECT co_account_id, co_account_code, co_account_status, under_account_id, permission_management, permission_total_bet, permission_report, permission_account, co_account_name, co_account_lastname, co_account_telephone 
                FROM co_account WHERE under_account_id = '".$id."'";
            } else {
                $query = "  SELECT co_account_id, co_account_code, co_account_status, under_account_id, permission_management, permission_total_bet, permission_report, permission_account, co_account_name, co_account_lastname, co_account_telephone 
                FROM co_account WHERE co_account_status = '".$status."' AND under_account_id = '".$id."'";
            }
            
            $result = $this->db->query($query)->result();
            return $result;
        }
    }

    public function addCoAccount($token, $data){

        $id =  $this->Token_model->decodeToken($token)->id;
        
        if($id != null){
                $data = [
                    'co_account_code' => $data["co_account_code"], 
                    'co_account_status' => 1, 
                    'co_account_password' => hash('sha512', $data["co_account_password"]),
                    'under_account_id' => $id, 
                    'permission_management' => $data["permission_management"], 
                    'permission_total_bet' => $data["permission_total_bet"], 
                    'permission_report' => $data["permission_report"], 
                    'permission_account' => $data["permission_account"], 
                    'co_account_name' => $data["co_account_name"], 
                    'co_account_lastname' => $data["co_account_lastname"], 
                    'co_account_telephone' => $data["co_account_telephone"], 
                    'co_account_created_date' => date("Y-m-d H:i:s")
                ];
    
                $this->db->insert('co_account', $data);
                return true;
        }
    }

    public function editCoAccount($token, $data){
        
                $id =  $this->Token_model->decodeToken($token)->id;

                if($id != null){
                    
                if($data["co_account_password"] == '' || $data["co_account_password"] == null){
                    $query = "UPDATE co_account
                            SET
                                co_account_status = '".$data["co_account_status"]."', 
                                permission_management = '".$data["permission_management"]."', 
                                permission_total_bet = '".$data["permission_total_bet"]."', 
                                permission_report = '".$data["permission_report"]."', 
                                permission_account = '".$data["permission_account"]."', 
                                co_account_name = '".$data["co_account_name"]."', 
                                co_account_lastname = '".$data["co_account_lastname"]."', 
                                co_account_telephone = '".$data["co_account_telephone"]."'
                            WHERE co_account_id = '".$data["co_account_id"]."'";
                    $this->db->query($query);
                    return true;
                } else {
                    $query = "UPDATE co_account
                    SET
                        co_account_status = '".$data["co_account_status"]."', 
                        co_account_password = '".hash('sha512', $data["co_account_password"])."',
                        permission_management = '".$data["permission_management"]."', 
                        permission_total_bet = '".$data["permission_total_bet"]."', 
                        permission_report = '".$data["permission_report"]."', 
                        permission_account = '".$data["permission_account"]."', 
                        co_account_name = '".$data["co_account_name"]."', 
                        co_account_lastname = '".$data["co_account_lastname"]."', 
                        co_account_telephone = '".$data["co_account_telephone"]."'
                    WHERE co_account_id = '".$data["co_account_id"]."'";
            $this->db->query($query);
                    return true;
                }
                }
    }

    public function getAccountList($token, $level, $account_code, $status){

        if($status == -1){
            $statusQuery = "";
        } else {
            $statusQuery = "AND account_status = '".$status."'";
        }

        // Get Account detail
        $query = $this->db->query("SELECT * FROM account WHERE account_level = '".$level."' AND account_code LIKE '".$account_code."%'".$statusQuery);

        $data = array();

        foreach ($query->result() as $row)
        {            
            $query_log = "SELECT * FROM login_transaction WHERE account_id = '".$row->account_id."' ORDER BY login_transaction_datetime DESC LIMIT 1";
            $result_log = $this->db->query($query_log)->row_array();
            
            $data[] = array(
                "account_id" => $row->account_id,
                "account_code" => $row->account_code, 
                "account_level" => $row->account_level,
                "account_firstname" => $row->account_firstname,
                "account_lastname" => $row->account_lastname,
                "account_telephone" => $row->account_telephone,
                "account_mobile" => $row->account_mobile,
                "account_nickname" => $row->account_nickname,
                "account_currency" => $row->account_currency,
                "account_status" => $row->account_status,
                "account_is_deleted" => $row->account_is_deleted,
                "login_transaction_ip_address" => $result_log["login_transaction_ip_address"],
                "login_transaction_datetime" => $result_log["login_transaction_datetime"]
            );
        }

        return $data;
    }

    public function editAccount($token, $data){
        
                $id =  $this->Token_model->decodeToken($token)->id;
                if($id != null){
                    if($data["account_password"] == '' || $data["account_password"] == null){
                        $query = "UPDATE account
                                SET
                                account_firstname = '".$data["account_firstname"]."', 
                                    account_lastname = '".$data["account_lastname"]."', 
                                    account_telephone = '".$data["account_telephone"]."', 
                                    account_mobile = '".$data["account_mobile"]."', 
                                    account_status = '".$data["account_status"]."', 
                                    account_is_deleted = '".$data["account_is_deleted"]."'
                                WHERE account_id = '".$data["account_id"]."'";
                        $this->db->query($query);
                        return true;
                    } else {
                        $query = "UPDATE account
                        SET
                            account_password = '".hash('sha512', $data["account_password"])."',
                            account_firstname = '".$data["account_firstname"]."', 
                            account_lastname = '".$data["account_lastname"]."', 
                            account_telephone = '".$data["account_telephone"]."', 
                            account_mobile = '".$data["account_mobile"]."', 
                            account_status = '".$data["account_status"]."', 
                            account_is_deleted = '".$data["account_is_deleted"]."'
                        WHERE co_account_id = '".$data["co_account_id"]."'";
                        $this->db->query($query);
                        return true;
                    }
                }
    }

    public function getAccountListBalance($token, $level, $account_code, $status){
        if($status == -1){
            $statusQuery = "";
        } else {
            $statusQuery = "AND account_status = '".$status."'";
        }

        // Get Account detail
        $query = $this->db->query("SELECT * FROM account WHERE account_level = '".$level."' AND account_code LIKE '".$account_code."%'".$statusQuery);

        $data = array();

        /* ALGORITHM 
            // SUM INCOME OF SENIOR
            SELECT SUM(credit_transaction_value) FROM credit_transaction WHERE account_id = 7 AND credit_transaction_type = 1 // 15,000,000
            // SUM EXPENSE
            SELECT SUM(credit_transaction_value) FROM credit_transaction WHERE account_id = 7 AND credit_transaction_type = 2 // 2,000,000
            // REMAINING BALANCE
            15,000,000-2,000,000 = 13,000,000 */

            if($level == 1) {
                $top_level = 0;
            } else if($level == 2) {
                $top_level = 1;
            } else if($level == 3) {
                $top_level = 2;
            }

            $get_account_id = "SELECT account_id FROM account WHERE account_code LIKE '".$account_code."%' AND account_level = '".$top_level."'";
            $result_account_id = $this->db->query($get_account_id)->row_array()["account_id"];
            
            /*
            // SUM INCOME OF SENIOR
            $income_credit_transaction_value = "SELECT SUM(credit_transaction_value) AS income FROM credit_transaction WHERE account_id = '".$result_account_id."' AND credit_transaction_type = 1";
            $result_income_credit_transaction_value = $this->db->query($income_credit_transaction_value)->row_array()["income"];
            // SUM EXPENSE
            $expense_credit_transaction_value = "SELECT SUM(credit_transaction_value) AS expense FROM credit_transaction WHERE account_id = '".$result_account_id."' AND credit_transaction_type = 2";
            $result_expense_credit_transaction_value = $this->db->query($expense_credit_transaction_value)->row_array()["expense"];
            // REMAINING BALANCE
            $remaining_balance = $result_income_credit_transaction_value - $result_expense_credit_transaction_value;
            */

            // SUM INCOME OF SENIOR
            $income_credit_transaction_value = "SELECT SUM(credit) AS income FROM credit_senior WHERE account_id = '".$result_account_id."' AND transaction_type = 1 AND account_id_master IS NULL";
            $result_income_credit_transaction_value = $this->db->query($income_credit_transaction_value)->row_array()["income"];
            // SUM EXPENSE
            $expense_credit_transaction_value = "SELECT SUM(credit) AS expense FROM credit_senior WHERE account_id = '".$result_account_id."' AND transaction_type = 1 AND account_id_master IS NOT NULL";
            $result_expense_credit_transaction_value = $this->db->query($expense_credit_transaction_value)->row_array()["expense"];
            // REMAINING BALANCE
            $remaining_balance = $result_income_credit_transaction_value - $result_expense_credit_transaction_value;

        foreach ($query->result() as $row)
        {            
            //$query_log = "SELECT * FROM login_transaction WHERE account_id = '".$row->account_id."' ORDER BY login_transaction_datetime DESC LIMIT 1";
            //$result_log = $this->db->query($query_log)->row_array();

            /* ALGORITHM 

            // TL03
            // CREDIT
            SELECT SUM(credit_transaction_value) FROM credit_transaction WHERE account_id = 10 AND credit_transaction_type = 1 // 2,000,000

            // MIN
            SELECT SUM(credit_transaction_value) FROM credit_transaction WHERE account_id = 10 AND credit_transaction_type = 2 // 0.00

            // MAX
            // REMAINING BALANCE + // CREDIT
            13,000,000 + 2,000,000 = 15,000,000

            // CURRENT BALANCE
            // CREDIT - // MIN
            */

            /*
            // CREDIT
            $query_credit = "SELECT SUM(credit_transaction_value) AS credit FROM credit_transaction WHERE account_id = '".$row->account_id."' AND credit_transaction_type = 1";
            $result_credit = $this->db->query($query_credit)->row_array()["credit"];
            // MIN
            $query_min = "SELECT SUM(credit_transaction_value) AS min FROM credit_transaction WHERE account_id = '".$row->account_id."' AND credit_transaction_type = 2";
            $result_min = $this->db->query($query_min)->row_array()["min"];
            // MAX
            $result_max = $remaining_balance + $result_credit;
            // CURRENT BALANCE
            $current_balance = $result_credit - $result_min;
            */

            // CREDIT
            $query_credit = "SELECT SUM(credit) AS credit FROM credit_senior WHERE account_id_master = '".$row->account_id."' AND transaction_type = 1";
            $result_credit = $this->db->query($query_credit)->row_array()["credit"];

            if($result_credit == null)
            $result_credit = 0.00;

            // MIN
            $query_min = "SELECT SUM(credit) AS min FROM credit_senior WHERE account_id_master = '".$row->account_id."' AND transaction_type = 2";
            $result_min = $this->db->query($query_min)->row_array()["min"];
            // MAX
            $result_max = $remaining_balance + $result_credit;
            // CURRENT BALANCE
            $current_balance = $result_credit - $result_min;

            $data[] = array(
                "account_id" => $row->account_id,
                "account_code" => $row->account_code, 
                "account_level" => $row->account_level,
                "account_firstname" => $row->account_firstname,
                "account_lastname" => $row->account_lastname,
                "account_telephone" => $row->account_telephone,
                "account_mobile" => $row->account_mobile,
                "account_nickname" => $row->account_nickname,
                "account_currency" => $row->account_currency,
                "account_status" => $row->account_status,
                "account_is_deleted" => $row->account_is_deleted,
                "credit" => $result_credit,
                "min" => $result_min,
                "max" => $result_max,
                "balance" => $current_balance
            );
        }

        return $data;
    }

    public function getFinancial($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        $account_code = $this->Token_model->decodeToken($token)->username;
        
        if($id != null){
            // Cash Balance
            $cash_balance = 0;
            // Total Balance
            $total_balance = 0;
            // Senior Outstanding
            $senior_outstanding = 0;
            // Total Outstanding
            $total_outstanding = 0;
            // Senior Credit
            
            /*
            $senior_credit =  "SELECT SUM(credit_transaction_value) AS credit FROM credit_transaction WHERE account_id = '".$id."' AND credit_transaction_type = 1";
            $result_senior_credit = $this->db->query($senior_credit)->row_array()["credit"];

            // Master Credit
            $master_credit = "SELECT SUM(credit_transaction_value) AS income FROM credit_transaction WHERE account_id IN 
            (SELECT account_id FROM account WHERE account_level = 1 AND account_code LIKE '".$account_code."%') AND credit_transaction_type = 1";
            $result_master_credit = $this->db->query($master_credit)->row_array()["income"];

            // Agent Credit
            $agent_credit = "SELECT SUM(credit_transaction_value) AS income FROM credit_transaction WHERE account_id IN 
            (SELECT account_id FROM account WHERE account_level = 2 AND account_code LIKE '".$account_code."%') AND credit_transaction_type = 1";
            $result_agent_credit = $this->db->query($agent_credit)->row_array()["income"];

            // Member Credit
            $member_credit = "SELECT SUM(credit_transaction_value) AS income FROM credit_transaction WHERE account_id IN 
            (SELECT account_id FROM account WHERE account_level = 3 AND account_code LIKE '".$account_code."%') AND credit_transaction_type = 1";
            $result_member_credit = $this->db->query($member_credit)->row_array()["income"];
            */

            $senior_credit =  "SELECT SUM(credit) AS credit FROM credit_senior WHERE account_id = '".$id."' AND transaction_type = 1";
            $result_senior_credit = $this->db->query($senior_credit)->row_array()["credit"];

            // Master Credit
            $master_credit = "SELECT SUM(credit) AS income FROM credit_senior WHERE account_id IN 
            (SELECT account_id FROM account WHERE account_level = 1 AND account_code LIKE '".$account_code."%') AND transaction_type = 1";
            $result_master_credit = $this->db->query($master_credit)->row_array()["income"];

            // Agent Credit
            $agent_credit = "SELECT SUM(credit) AS income FROM credit_senior WHERE account_id IN 
            (SELECT account_id FROM account WHERE account_level = 2 AND account_code LIKE '".$account_code."%') AND transaction_type = 1";
            $result_agent_credit = $this->db->query($agent_credit)->row_array()["income"];

            // Member Credit
            $member_credit = "SELECT SUM(credit) AS income FROM credit_senior WHERE account_id IN 
            (SELECT account_id FROM account WHERE account_level = 3 AND account_code LIKE '".$account_code."%') AND transaction_type = 1";
            $result_member_credit = $this->db->query($member_credit)->row_array()["income"];

            // Total Master Count
            $total_master_count_active = "SELECT COUNT(*) AS count FROM account WHERE account_level = 1 AND account_status = 1 AND account_code LIKE '".$account_code."%'";
            $result_total_master_count_active = $this->db->query($total_master_count_active)->row_array()["count"];
            $total_master_count_inactive = "SELECT COUNT(*) AS count FROM account WHERE account_level = 1 AND account_status = 0 AND account_code LIKE '".$account_code."%'";
            $result_total_master_count_inactive = $this->db->query($total_master_count_inactive)->row_array()["count"];

            // Total Agent Count
            $total_agent_count_active = "SELECT COUNT(*) AS count FROM account WHERE account_level = 2 AND account_status = 1 AND account_code LIKE '".$account_code."%'";
            $result_total_agent_count_active = $this->db->query($total_agent_count_active)->row_array()["count"];
            $total_agent_count_inactive = "SELECT COUNT(*) AS count FROM account WHERE account_level = 2 AND account_status = 0 AND account_code LIKE '".$account_code."%'";
            $result_total_agent_count_inactive = $this->db->query($total_agent_count_inactive)->row_array()["count"];

            // Total Member Count
            $total_member_count_active = "SELECT COUNT(*) AS count FROM account WHERE account_level = 3 AND account_status = 1 AND account_code LIKE '".$account_code."%'";
            $result_total_member_count_activee = $this->db->query($total_member_count_active)->row_array()["count"];
            $total_member_count_inactive = "SELECT COUNT(*) AS count FROM account WHERE account_level = 3 AND account_status = 0 AND account_code LIKE '".$account_code."%'";
            $result_total_member_count_inactive = $this->db->query($total_member_count_inactive)->row_array()["count"];

            $data[] = array(
                "cash_balance" => $cash_balance,
                "total_balance" => $total_balance, 
                "senior_outstanding" => $senior_outstanding,
                "total_outstanding" => $total_outstanding,
                "senior_credit" => $result_senior_credit,
                "master_credit" => $result_master_credit,
                "agent_credit" => $result_agent_credit,
                "member_credit" => $result_member_credit,
                "total_master" => $result_total_master_count_active." / ".$result_total_master_count_inactive,
                "total_agent" => $result_total_agent_count_active." / ".$result_total_agent_count_inactive,
                "total_member" => $result_total_member_count_activee." / ".$result_total_member_count_inactive
            );

            return $data;
        }
    }

    public function getAnnouncement($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        
        if($id != null){
            $query = "SELECT * FROM announcement ORDER BY announcement_created_date DESC";
            $result = $this->db->query($query)->result();
            return $result;
        }
    }

    public function setAnnouncement($data){
        $token = $data["token"];
        $id =  $this->Token_model->decodeToken($token)->id;
        if($id != null){
            $announcement_data = [
                'announcement_created_by' => $id,
                'announcement_created_date' => date("Y-m-d H:i:s"),
                'announcement_content_th' => $data["announcement_th"],
                'announcement_content_en' => $data["announcement_en"],
                'announcement_content_cn' => $data["announcement_cn"]
            ];
    
            $this->db->insert('announcement', $announcement_data);
            return true;
        } else {
            return false;
        }
    }

    public function getAnnouncementLast($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        
        if($id != null){
            $query = "SELECT * FROM announcement ORDER BY announcement_created_date DESC LIMIT 1";
            $result = $this->db->query($query)->result();
            return $result;
        }
    }

    public function resetPassword($data){
        $token = $data["token"];
        $id =  $this->Token_model->decodeToken($token)->id;
        if($id != null){
            // Validate old password
            $query_old_password = "SELECT COUNT(*) AS count FROM account WHERE account_password = '".$data["currentPassword"]."' AND account_id = '".$id."'";
            $result_query_old_password = $this->db->query($query_old_password)->row_array()["count"];
            if($result_query_old_password == 0){
                return false;
            } else {
                $query_update_password = "UPDATE account SET account_password = '".$data["confirmPassword"]."' WHERE account_id = '".$id."'";
                $this->db->query($query_update_password);
                return true;
            }
        } else {
            return false;
        }
    }

    public function getOnlineAccount($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        if($id != null){
            $query = $this->db->query("SELECT login_transaction.*, account.account_code FROM login_transaction 
            LEFT JOIN account ON account.account_id = login_transaction.account_id GROUP BY account_id ORDER BY login_transaction_datetime DESC LIMIT 1");
            //$result = $this->db->query($query)->result();
            $data = array();

            foreach ($query->result() as $row)
            {
                $data[] = array(
                    "login_transaction_ip_address" => $row->login_transaction_ip_address,
                    "login_transaction_datetime" => $row->login_transaction_datetime, 
                    "login_transaction_domain" => $row->login_transaction_domain,
                    "account_code" => $row->account_code,
                    "time_ago" => $row->login_transaction_datetime //$this->Backend_model->time_elapsed_string($row->login_transaction_datetime)
                );
            }

            return $data;
        }
    }

    public function time_elapsed_string($ptime)
    {
        $etime = time() - date("Y-m-d H:i:s", strtotime($ptime));
    
        if ($etime < 1)
        {
            return '0 seconds';
        }
    
        $a = array( 365 * 24 * 60 * 60  =>  'year',
                     30 * 24 * 60 * 60  =>  'month',
                          24 * 60 * 60  =>  'day',
                               60 * 60  =>  'hour',
                                    60  =>  'minute',
                                     1  =>  'second'
                    );
        $a_plural = array( 'year'   => 'years',
                           'month'  => 'months',
                           'day'    => 'days',
                           'hour'   => 'hours',
                           'minute' => 'minutes',
                           'second' => 'seconds'
                    );
    
        foreach ($a as $secs => $str)
        {
            $d = $etime / $secs;
            if ($d >= 1)
            {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

    public function getLoginHistory($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        $account_code = $this->Token_model->decodeToken($token)->username;

        if($id != null){
            $query = $this->db->query("SELECT login_transaction.*, account.account_code FROM login_transaction 
            LEFT JOIN account ON account.account_id = login_transaction.account_id WHERE account.account_code LIKE '".$account_code."%'
            ORDER BY login_transaction_datetime DESC");
            //$result = $this->db->query($query)->result();
            $data = array();

            foreach ($query->result() as $row)
            {
                $data[] = array(
                    "login_transaction_ip_address" => $row->login_transaction_ip_address,
                    "login_transaction_datetime" => date('d/m/Y', strtotime($row->login_transaction_datetime)), //$row->login_transaction_datetime, 
                    "login_transaction_domain" => $row->login_transaction_domain,
                    "account_code" => $row->account_code,
                    "time_ago" => date('H:i:s', strtotime($row->login_transaction_datetime)), //$row->login_transaction_datetime //$this->Backend_model->time_elapsed_string($row->login_transaction_datetime)
                );
            }

            return $data;
        }
    }

    public function editAccountBalance($data){

        $token = $data["token"];
        $account_id = $data["account_id"];
        $credit = $data["credit"];
        $level = $data["level"];

        $id =  $this->Token_model->decodeToken($token)->id;
        $account_code = $this->Token_model->decodeToken($token)->username;

        if($id != null){

            $query = "UPDATE credit_senior SET credit = '".$credit."' WHERE account_id_master = '".$account_id."' AND transaction_type = 1";
            $result = $this->db->query($query);
            return true;
            
        //     $update_senior_balance = [
        //         'account_id' => $id,
        //         'credit_transaction_type' => 2,
        //         'credit_transaction_remark' => "ID: ".$id." Code: ".$account_code." ถูกหักเครดิต จากการเปลี่ยนเครดิต",
        //         'credit_transaction_value' => $data["min"]["value_3d_bottom"]
        //     ];
        //     $this->db->insert('credit_transaction', $update_senior_balance);
         }
    }

    public function getMasterList($token){
        $id =  $this->Token_model->decodeToken($token)->id;
        $account_code = $this->Token_model->decodeToken($token)->username;
        $account_level = 1; //$this->Token_model->decodeToken($token)->level;

        if($id != null){
            $query = "SELECT account_code, account_id, account_level, account_firstname, account_lastname, account_nickname FROM account WHERE account_code LIKE '".$account_code."%' AND account_level = '".$account_level."'";
            $result = $this->db->query($query)->result();
            return $result;
        }
    }

    public function getAgentList($token, $master_account_code){
        $id =  $this->Token_model->decodeToken($token)->id;
        $account_level = 2; //$this->Token_model->decodeToken($token)->level;

        if($id != null){
            $query = "SELECT account_code, account_id, account_level, account_firstname, account_lastname, account_nickname FROM account WHERE account_code LIKE '".$master_account_code."%' AND account_level = '".$account_level."'";
            $result = $this->db->query($query)->result();
            return $result;
        }
    }

    public function getAccountListMember($token, $level, $account_code, $status, $optionDigit){
        
                if($status == -1){
                    $statusQuery = "";
                } else {
                    $statusQuery = "AND account.account_status = '".$status."'";
                }

                if($optionDigit == 3) {
                    $query = "SELECT account.account_id, account.account_code, account.account_firstname, account.account_lastname, 
                    pt_shared_senior.value_3d_top AS value_3d_top_se, pt_shared_senior.value_3d_bottom AS value_3d_bottom_se, pt_shared_senior.value_3d_top_roll AS value_3d_top_roll_se,
                    pt_shared_master.value_3d_top AS value_3d_top_ma, pt_shared_master.value_3d_bottom AS value_3d_bottom_ma, pt_shared_master.value_3d_top_roll AS value_3d_top_roll_ma, 
                    pt_shared_agent.value_3d_top AS value_3d_top_ag, pt_shared_agent.value_3d_bottom AS value_3d_bottom_ag, pt_shared_agent.value_3d_top_roll AS value_3d_top_roll_ag
                    FROM account
                    LEFT JOIN pt_shared_member ON pt_shared_member.account_id = account.account_id
                    LEFT JOIN pt_shared_agent ON pt_shared_member.pt_shared_agent_id = pt_shared_agent.pt_shared_agent_id
                    LEFT JOIN pt_shared_master ON pt_shared_agent.pt_shared_master_id = pt_shared_master.pt_shared_master_id
                    LEFT JOIN pt_shared_senior ON pt_shared_master.pt_shared_senior_id = pt_shared_senior.pt_shared_senior_id
                    WHERE account.account_level = 3 AND account.account_code LIKE '".$account_code."%'".$statusQuery;
                } else if($optionDigit == 2){
                    $query = "SELECT account.account_id, account.account_code, account.account_firstname, account.account_lastname, 
                    pt_shared_senior.value_2d_top AS value_2d_top_se, pt_shared_senior.value_2d_bottom AS value_2d_bottom_se, pt_shared_senior.value_2d_top_roll AS value_2d_top_roll_se,
                    pt_shared_master.value_2d_top AS value_2d_top_ma, pt_shared_master.value_2d_bottom AS value_2d_bottom_ma, pt_shared_master.value_2d_top_roll AS value_2d_top_roll_ma, 
                    pt_shared_agent.value_2d_top AS value_2d_top_ag, pt_shared_agent.value_2d_bottom AS value_2d_bottom_ag, pt_shared_agent.value_2d_top_roll AS value_2d_top_roll_ag
                    FROM account
                    LEFT JOIN pt_shared_member ON pt_shared_member.account_id = account.account_id
                    LEFT JOIN pt_shared_agent ON pt_shared_member.pt_shared_agent_id = pt_shared_agent.pt_shared_agent_id
                    LEFT JOIN pt_shared_master ON pt_shared_agent.pt_shared_master_id = pt_shared_master.pt_shared_master_id
                    LEFT JOIN pt_shared_senior ON pt_shared_master.pt_shared_senior_id = pt_shared_senior.pt_shared_senior_id
                    WHERE account.account_level = 3 AND account.account_code LIKE '".$account_code."%'".$statusQuery;
                } else if($optionDigit == 1){
                    $query = "SELECT account.account_id, account.account_code, account.account_firstname, account.account_lastname, 
                    pt_shared_senior.value_1d_topn AS value_1d_topn_se, pt_shared_senior.value_1d_bottom AS value_1d_bottom_se,
                    pt_shared_master.value_1d_top AS value_1d_topn_ma, pt_shared_master.value_1d_bottom AS value_1d_bottom_ma, 
                    pt_shared_agent.value_1d_top AS value_1d_topn_ag, pt_shared_agent.value_1d_bottom AS value_1d_bottom_ag
                    FROM account
                    LEFT JOIN pt_shared_member ON pt_shared_member.account_id = account.account_id
                    LEFT JOIN pt_shared_agent ON pt_shared_member.pt_shared_agent_id = pt_shared_agent.pt_shared_agent_id
                    LEFT JOIN pt_shared_master ON pt_shared_agent.pt_shared_master_id = pt_shared_master.pt_shared_master_id
                    LEFT JOIN pt_shared_senior ON pt_shared_master.pt_shared_senior_id = pt_shared_senior.pt_shared_senior_id
                    WHERE account.account_level = 3 AND account.account_code LIKE '".$account_code."%'".$statusQuery;
                } else {
                    $query = "SELECT account.account_id, account.account_code, account.account_firstname, account.account_lastname, 
                    pt_shared_senior.value_19_roll_top AS value_19_roll_top_se, pt_shared_senior.value_19_roll_bottom AS value_19_roll_bottom_se,
                    pt_shared_master.value_19_roll_top AS value_19_roll_top_ma, pt_shared_master.value_19_roll_bottom AS value_19_roll_bottom_ma, 
                    pt_shared_agent.value_19_roll_top AS value_19_roll_top_ag, pt_shared_agent.value_19_roll_bottom AS value_19_roll_bottom_ag
                    FROM account
                    LEFT JOIN pt_shared_member ON pt_shared_member.account_id = account.account_id
                    LEFT JOIN pt_shared_agent ON pt_shared_member.pt_shared_agent_id = pt_shared_agent.pt_shared_agent_id
                    LEFT JOIN pt_shared_master ON pt_shared_agent.pt_shared_master_id = pt_shared_master.pt_shared_master_id
                    LEFT JOIN pt_shared_senior ON pt_shared_master.pt_shared_senior_id = pt_shared_senior.pt_shared_senior_id
                    WHERE account.account_level = 3 AND account.account_code LIKE '".$account_code."%'".$statusQuery;
                }
                
                $result = $this->db->query($query)->result();
                return $result;
    }
}
?>
