<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Backend extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->methods['getDigits_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['getGreeting_get']['limit'] = 500;

        /****************************** Management ******************************/
        // % ถือสู้การแทง - ตั้งค่าตามประเภท
        $this->methods['setBetByType_post']['limit'] = 500;
        $this->methods['getBetByType_get']['limit'] = 500;
        $this->methods['editBetByType_post']['limit'] = 500;
        $this->methods['deleteBetByType_post']['limit'] = 500;
        $this->methods['setBetByDigit_post']['limit'] = 500;
        $this->methods['getBetByDigit_get']['limit'] = 500;
        $this->methods['editBetByDigit_post']['limit'] = 500;
        $this->methods['deleteBetByDigit_post']['limit'] = 500;

        // % ถือสู้การแทง - ตั้งค่าตามหมายเลข
        $this->methods['getLottoRoundDate_get']['limit'] = 500;

        // ขอยอดคงเหลือล่าสุด สำหรับขั้นตอนการสร้างผู้ใช้งานใหม่
        $this->methods['getCurrentBalanceByAccountCode_get']['limit'] = 500;
        $this->methods['getLastAccountCodeFromSeniorLevel_get']['limit'] = 500;
        $this->methods['getLastAccountCodeFromMasterLevel_get']['limit'] = 500;

        $this->methods['getAccountCodeUnderSpecificLevel_get']['limit'] = 500;
        $this->methods['getLastAccountCodeFromLevelSelection_get']['limit'] = 500;

        $this->methods['getMinMaxReward_get']['limit'] = 500;

        $this->methods['getPercentCommission_get']['limit'] = 500;
        $this->methods['getPercentSharedWhenCreateMaster_get']['limit'] = 500;

        $this->methods['addMaster_post']['limit'] = 500;
        $this->methods['addAgent_post']['limit'] = 500;
        $this->methods['addMember_post']['limit'] = 500;
        $this->methods['addSenior_post']['limit'] = 500;

        $this->methods['getCoAccount_get']['limit'] = 500;
        $this->methods['addCoAccount_post']['limit'] = 500;
        $this->methods['editCoAccount_post']['limit'] = 500;

        $this->methods['getAccountList_get']['limit'] = 500;
        $this->methods['editAccount_post']['limit']  = 500;

        $this->methods['getAccountListBalance_get']['limit']  = 500;
        $this->methods['getMasterList_get']['limit']  = 500;
        $this->methods['getAgentList_get']['limit'] = 500;
        $this->methods['getAccountListMember_get']['limit'] = 500;

        /****************************** Account ******************************/
        $this->methods['getFinancial_get']['limit']  = 500;
        $this->methods['getAnnouncement_get']['limit'] = 500;
        $this->methods['setAnnouncement_post']['limit'] = 500;
        $this->methods['getAnnouncementLast_get']['limit'] = 500;
        $this->methods['resetPassword_post']['limit'] = 500;
        $this->methods['getOnlineAccount_get']['limit'] = 500;
        $this->methods['getLoginHistory_get']['limit'] = 500;
        $this->methods['editAccountBalance_post']['limit'] = 500;

        $this->load->model('Backend_model');
    }

    public function getDigits_get(){
        $result = $this->Backend_model->getDigits();
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getGreeting_get(){
        $token = $this->get('token');

        $result = $this->Backend_model->getGreeting($token);
        if($result == null) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_UNAUTHORIZED);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        }
    }

    public function setBetByType_post(){
        $token = $this->post('token');
        $digit_id = $this->post('digit_id');
        $is_limit = $this->post('is_limit');
        $amount = $this->post('amount');

        $data = array(
            "digit_id" => $digit_id,
            "is_limit" => $is_limit,
            "amount" => $amount
        );

        $result = $this->Backend_model->setBetByType($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getBetByType_get(){
        $token = $this->get('token');
        $result = $this->Backend_model->getBetByType($token);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function editBetByType_post(){
        $token = $this->post('token');
        $digit_id = $this->post('digit_id');
        $is_limit = $this->post('is_limit');
        $amount = $this->post('amount');
        $setting_bet_by_type_id = $this->post('setting_bet_by_type_id');

        $data = array(
            "digit_id" => $digit_id,
            "is_limit" => $is_limit,
            "amount" => $amount,
            "setting_bet_by_type_id" => $setting_bet_by_type_id
        );

        $result = $this->Backend_model->editBetByType($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function deleteBetByType_post(){
        $token = $this->post('token');
        $setting_bet_by_type_id = $this->post('setting_bet_by_type_id');

        $data = array(
            "setting_bet_by_type_id" => $setting_bet_by_type_id
        );

        $result = $this->Backend_model->deleteBetByType($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getLottoRoundDate_get(){
        $token = $this->get('token');
        $result = $this->Backend_model->getLottoRoundDate($token);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function setBetByDigit_post(){
        $token = $this->post('token');
        $digit_id = $this->post('digit_id');
        $digit = $this->post('digit');
        $is_limit = $this->post('is_limit');
        $amount = $this->post('amount');
        $lotto_round_id = $this->post('lotto_round_id');

        $data = array(
            "digit_id" => $digit_id,
            "digit" => $digit,
            "is_limit" => $is_limit,
            "amount" => $amount,
            "lotto_round_id" => $lotto_round_id
        );

        $result = $this->Backend_model->setBetByDigit($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getBetByDigit_get(){
        $token = $this->get('token');
        $lotto_round_id = $this->get('lotto_round_id');

        $data = array(
            "lotto_round_id" => $lotto_round_id
        );

        $result = $this->Backend_model->getBetByDigit($token, $data);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function editBetByDigit_post(){
        $token = $this->post('token');
        $digit_id = $this->post('digit_id');
        $digit = $this->post('digit');
        $is_limit = $this->post('is_limit');
        $amount = $this->post('amount');
        $lotto_round_id = $this->post('lotto_round_id');
        $setting_bet_by_digit_id = $this->post('setting_bet_by_digit_id');

        $data = array(
            "digit_id" => $digit_id,
            "digit" => $digit,
            "is_limit" => $is_limit,
            "amount" => $amount,
            "lotto_round_id" => $lotto_round_id,
            "setting_bet_by_digit_id" => $setting_bet_by_digit_id
        );

        $result = $this->Backend_model->editBetByDigit($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function deleteBetByDigit_post(){
        $token = $this->post('token');
        $setting_bet_by_digit_id = $this->post('setting_bet_by_digit_id');

        $data = array(
            "setting_bet_by_digit_id" => $setting_bet_by_digit_id
        );

        $result = $this->Backend_model->deleteBetByDigit($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getCurrentBalanceByAccountCode_get(){
        $token = $this->get('token');
        $account_id = $this->get('account_id');

        $result = $this->Backend_model->getCurrentBalanceByAccountCode($token, $account_id);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getLastAccountCodeFromSeniorLevel_get(){
        $token = $this->get('token');
        $account_level = $this->get('account_level');

        $result = $this->Backend_model->getLastAccountCodeFromSeniorLevel($token, $account_level);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getLastAccountCodeFromMasterLevel_get(){
        $token = $this->get('token');
        $account_level = $this->get('account_level');
        $account_id = $this->get('account_id');

        $result = $this->Backend_model->getLastAccountCodeFromMasterLevel($token, $account_level, $account_id);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getAccountCodeUnderSpecificLevel_get(){
        $token = $this->get('token');
        $account_level = $this->get('account_level');

        $result = $this->Backend_model->getAccountCodeUnderSpecificLevel($token, $account_level);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getLastAccountCodeFromLevelSelection_get(){
        $token = $this->get('token');
        $account_code = $this->get('account_code');
        $account_level = $this->get('account_level');

        $result = $this->Backend_model->getLastAccountCodeFromLevelSelection($token, $account_level, $account_code);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getMinMaxReward_get(){
        $token = $this->get('token');
        $account_id = $this->get('account_id');

        $result = $this->Backend_model->getMinMaxReward($token, $account_id);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getPercentCommission_get(){
      $token = $this->get('token');
      $account_id = $this->get('account_id');

      $result = $this->Backend_model->getPercentCommission($token, $account_id);
      $this->response([
          'values'   =>    $result,
      ], REST_Controller::HTTP_OK);
    }

    public function getPercentSharedWhenCreateMaster_get(){
        $token = $this->get('token');
        $account_id = $this->get('account_id');
  
        $result = $this->Backend_model->getPercentSharedWhenCreateMaster($token, $account_id);
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function addMaster_post(){
        $token = $this->post('token');

        // Account detail
        $account_detail = $this->post('account_detail');
        // Min/Max/Reward
        $min = $this->post('min');
        $max = $this->post('max');
        $reward = $this->post('reward');
        $top = $this->post('top');
        // PT Commission
        $commission = $this->post('commission');
        // PT Shared
        $shared = $this->post('shared');
        // PT Take
        $take = $this->post('take');

        $data = array(
            "account_detail" => $account_detail,
            "min" => $min,
            "max" => $max,
            "top" => $top,
            "reward" => $reward,
            "commission" => $commission,
            "shared" => $shared,
            "take" => $take
        );

        $result = $this->Backend_model->addMaster($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function addAgent_post(){
        $token = $this->post('token');

        // Account detail
        $account_detail = $this->post('account_detail');
        // Min/Max/Reward
        $min = $this->post('min');
        $max = $this->post('max');
        $reward = $this->post('reward');
        $top = $this->post('top');
        // PT Commission
        $commission = $this->post('commission');
        // PT Shared
        $shared = $this->post('shared');
        // PT Take
        $take = $this->post('take');

        $data = array(
            "account_detail" => $account_detail,
            "min" => $min,
            "max" => $max,
            "top" => $top,
            "reward" => $reward,
            "commission" => $commission,
            "shared" => $shared,
            "take" => $take
        );

        $result = $this->Backend_model->addAgent($token, $data);
        
        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function addMember_post(){
        $token = $this->post('token');

        // Account detail
        $account_detail = $this->post('account_detail');
        // Min/Max/Reward
        $min = $this->post('min');
        $max = $this->post('max');
        $reward = $this->post('reward');
        $top = $this->post('top');
        // PT Commission
        $commission = $this->post('commission');
        // PT Shared
        $shared = $this->post('shared');
        // PT Take
        //$take = $this->post('take');

        $data = array(
            "account_detail" => $account_detail,
            "min" => $min,
            "max" => $max,
            "top" => $top,
            "reward" => $reward,
            "commission" => $commission,
            "shared" => $shared,
        );

        $result = $this->Backend_model->addMember($token, $data);
        
        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function addSenior_post(){
        $token = $this->post('token');

        // Account detail
        $account_detail = $this->post('account_detail');
        // Min/Max/Reward
        $min = $this->post('min');
        $max = $this->post('max');
        $reward = $this->post('reward');
        $top = $this->post('top');
        // PT Commission
        $commission = $this->post('commission');
        // PT Shared
        $shared = $this->post('shared');
        // PT Take
        $take = $this->post('take');

        $data = array(
            "account_detail" => $account_detail,
            "min" => $min,
            "max" => $max,
            "top" => $top,
            "reward" => $reward,
            "commission" => $commission,
            "shared" => $shared,
            "take" => $take
        );

        $result = $this->Backend_model->addSenior($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function getCoAccount_get(){
        $token = $this->get('token');
        $status = $this->get('status');
        $result = $this->Backend_model->getCoAccount($token, $status);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function addCoAccount_post(){
       
        $co_account_code = $this->post('co_account_code');
        $co_account_password = $this->post('co_account_password');
        $co_account_name = $this->post('co_account_name');
        $co_account_lastname = $this->post('co_account_lastname');
        $co_account_telephone = $this->post('co_account_telephone');
        $permission_management = $this->post('permission_management');
        $permission_total_bet = $this->post('permission_total_bet');
        $permission_report = $this->post('permission_report');
        $permission_account = $this->post('permission_account');

        $token = $this->post('token');

        $data = array(
            "co_account_code" => $co_account_code,
            "co_account_password" => $co_account_password,
            "co_account_name" => $co_account_name,
            "co_account_lastname" => $co_account_lastname,
            "co_account_telephone" => $co_account_telephone,
            "permission_management" => $permission_management,
            "permission_total_bet" => $permission_total_bet,
            "permission_report" => $permission_report,
            "permission_account" => $permission_account
        );

        $result = $this->Backend_model->addCoAccount($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function editCoAccount_post(){
        
         $co_account_id = $this->post('co_account_id');
         $co_account_code = $this->post('co_account_code');
         $co_account_password = $this->post('co_account_password');
         $co_account_name = $this->post('co_account_name');
         $co_account_lastname = $this->post('co_account_lastname');
         $co_account_telephone = $this->post('co_account_telephone');
         $permission_management = $this->post('permission_management');
         $permission_total_bet = $this->post('permission_total_bet');
         $permission_report = $this->post('permission_report');
         $permission_account = $this->post('permission_account');
         $co_account_status = $this->post('co_account_status');
         $token = $this->post('token');
 
         $data = array(
             "co_account_id" => $co_account_id,
             "co_account_code" => $co_account_code,
             "co_account_password" => $co_account_password,
             "co_account_name" => $co_account_name,
             "co_account_lastname" => $co_account_lastname,
             "co_account_telephone" => $co_account_telephone,
             "permission_management" => $permission_management,
             "permission_total_bet" => $permission_total_bet,
             "permission_report" => $permission_report,
             "permission_account" => $permission_account,
             "co_account_status" => $co_account_status
         );
 
         $result = $this->Backend_model->editCoAccount($token, $data);
 
         if($result == true) {
             $this->response([
                 'values'   =>    $result,
             ], REST_Controller::HTTP_OK);
         } else {
             $this->response([
                 'values'   =>    $result,
             ], REST_Controller::HTTP_NOT_FOUND);
         }
     }

     public function getAccountList_get(){
        $token = $this->get('token');
        $level = $this->get('level');
        $account_code = $this->get('account_code');
        $status = $this->get('status');

        $result = $this->Backend_model->getAccountList($token, $level, $account_code, $status);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
     }

     public function editAccount_post(){
        $account_id = $this->post('account_id');
        $account_password = $this->post('account_password');
        $account_firstname = $this->post('account_firstname');
        $account_lastname = $this->post('account_lastname');
        $account_telephone = $this->post('account_telephone');
        $account_mobile = $this->post('account_mobile');
        $account_status = $this->post('account_status');
        $account_is_deleted = $this->post('account_is_deleted');
        $account_status = $this->post('account_status');
        $token = $this->post('token');

        $data = array(
            "account_id" => $account_id,
            "account_password" => $account_password,
            "account_firstname" => $account_firstname,
            "account_lastname" => $account_lastname,
            "account_telephone" => $account_telephone,
            "account_mobile" => $account_mobile,
            "account_status" => $account_status,
            "account_is_deleted" => $account_is_deleted
        );

        $result = $this->Backend_model->editAccount($token, $data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
     }

     public function getAccountListBalance_get(){
        $token = $this->get('token');
        $level = $this->get('level');
        $account_code = $this->get('account_code');
        $status = $this->get('status');

        $result = $this->Backend_model->getAccountListBalance($token, $level, $account_code, $status);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
     }

     public function getFinancial_get(){
        $token = $this->get('token');
        $result = $this->Backend_model->getFinancial($token);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
     }

     public function getAnnouncement_get(){
         $token = $this->get('token');
         $result = $this->Backend_model->getAnnouncement($token);
         
         $this->response([
             'values'   =>    $result,
         ], REST_Controller::HTTP_OK);
     }

     public function setAnnouncement_post(){
        $announcement_th = $this->post('announcement_th');
        $announcement_en = $this->post('announcement_en');
        $announcement_cn = $this->post('announcement_cn');
        $token = $this->post('token');

        $data = array(
            "announcement_th" => $announcement_th,
            "announcement_en" => $announcement_en,
            "announcement_cn" => $announcement_cn,
            "token" => $token
        );

        $result = $this->Backend_model->setAnnouncement($data);

        if($result == true) {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'values'   =>    $result,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
     }

     public function getAnnouncementLast_get(){
        $token = $this->get('token');
        $result = $this->Backend_model->getAnnouncementLast($token);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function resetPassword_post(){
        $token = $this->post('token');
        $currentPassword = $this->post('currentPassword');
        $confirmPassword = $this->post('confirmPassword');

        $data = array(
            "currentPassword" => $currentPassword,
            "confirmPassword" => $confirmPassword,
            "token" => $token
        );

        $result = $this->Backend_model->resetPassword($data);

        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getOnlineAccount_get(){
        $token = $this->get('token');
        $result = $this->Backend_model->getOnlineAccount($token);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getLoginHistory_get(){
        $token = $this->get('token');
        $result = $this->Backend_model->getLoginHistory($token);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function editAccountBalance_post(){
        $token = $this->post('token');
        $account_id = $this->post('account_id');
        $credit = $this->post('credit');
        $level = $this->post('level');

        $data = array(
            "account_id" => $account_id,
            "credit" => $credit,
            "level" => $level,
            "token" => $token
        );

        $result = $this->Backend_model->editAccountBalance($data);

        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getMasterList_get(){
        $token = $this->get('token');
        $result = $this->Backend_model->getMasterList($token);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getAgentList_get(){
        $token = $this->get('token');
        $master_account_code = $this->get('master_account_code');

        $result = $this->Backend_model->getAgentList($token, $master_account_code);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
    }

    public function getAccountListMember_get(){
        $token = $this->get('token');
        $level = $this->get('level');
        $account_code = $this->get('account_code');
        $status = $this->get('status');
        $optionDigit = $this->get('optionDigit');

        $result = $this->Backend_model->getAccountListMember($token, $level, $account_code, $status, $optionDigit);
        
        $this->response([
            'values'   =>    $result,
        ], REST_Controller::HTTP_OK);
     }
}
?>
