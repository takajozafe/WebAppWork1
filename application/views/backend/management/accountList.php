<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div ng-controller="AccountListController" ng-init="initAccountList()">

        <table style="width: 95%;margin-left: auto;margin-right: auto;">
            <tr>
                <td style="vertical-align:top;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">รายชื่อผู้ใช้</h3>
                        </div>
                        <div class="panel-body">

                            <table>
                                <tr>
                                    <td>
                                        <span class="head_topic">ระดับชั้น</span>
                                    </td>{{account_level}}
                                    <td style="width: 150px;"> <select ng-model="selected_level" ng-change="onSelectLevel(selected_level); resetOnSelectLevel();">
                                            <option value>{{ 'PLEASE_SELECT' | translate }}</option>
                                            <option value="0" ng-if="account_level == 4">{{ 'SENIOR' | translate }}</option>
                                            <option value="1" ng-hide="account_level_current_user == 2" ng-selected="account_level_current_user == 0">{{ 'MASTER' | translate }}</option>
                                            <option value="2" ng-selected="is_selected_default_level == 1">{{ 'AGENT' | translate }}</option>
                                            <option value="3" ng-selected="is_selected_default_level == 2">{{ 'MEMBER' | translate }}</option>
                                        </select></td>
                                    <td>
                                        <span class="head_topic">ภายใต้</span>
                                    </td>
                                    <td style="width: 150px;">
                                        <select ng-hide="under_level == 4" ng-disabled="!selected_level" ng-options="item as item.label for item in under_name_list track by item.id" ng-model="selected_under" ng-change="getLastAccountCode(selected_under)">
                                                <option value="">{{ 'PLEASE_SELECT' | translate }}</option>
                                            </select>
                                    </td>
                                    <td>
                                        <span class="head_topic">จัดการกับผู้ใช้</span>
                                    </td>
                                    <td style="width: 643px;" class="head_topic"> 
                                        <!-- <select ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)">
                                                    <option value="">ทั้งหมด</option>
                                                    <option value="0">ปิดใช้งาน</option>
                                                    <option value="1">เปิดใช้งาน</option>
                                                </select> -->
                                    &nbsp;&nbsp;<input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="1">&nbsp;&nbsp;เปิด
                                    &nbsp;&nbsp;<input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="0">&nbsp;&nbsp;ปิด
                                    &nbsp;&nbsp;<input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="-1">&nbsp;&nbsp;ทั้งหมด
                                    </td>
                                </tr>
                            </table><br/>

                            <table class="table table-hover table-bordered">
                                <thead style="background-color: #4c69b9;">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสผู้ใช้</th>
                                        <th>แก้ไข</th>
                                        <th>สถานะ</th>
                                        <th>ระงับ</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>มือถือ</th>
                                        <th>สกุลเงิน</th>
                                        <th>เข้าสู่ระบบครั้งล่าสุด</th>
                                        <th>ไอพีล่าสุด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: center;" ng-repeat="i in AccountList" ng-include="account_detail_template(i)">
                                    </tr>
                                </tbody>
                            </table>

                            <script type="text/ng-template" id="account_detail">
                                <td>{{$index + 1}}</td>
                                <td>{{i.account_code}}</td>
                                <td><a href="javascript: void(0)" ng-click="do_edit(i)"><strong><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</strong></a></td>
                                <td>
                                    <span ng-if="i.account_status == 0">ปิด</span>
                                    <span ng-if="i.account_status == 1">เปิด</span>
                                </td>
                                <td><span ng-if="i.account_is_deleted == 1" style="font-size: 11px;color: #FF0000;font-family: verdana;">ระงับ</span>
                                    <span ng-if="i.account_is_deleted == 0">ไม่ระงับ</span></td>
                                <td>{{i.account_firstname}}</td>
                                <td>{{i.account_lastname}}</td>
                                <td>{{i.account_telephone}}</td>
                                <td>{{i.account_mobile}}</td>
                                <td>
                                <span ng-if="i.account_currency == 'THB'">ไทย</span>
                                </td>
                                <td>
                                    <span ng-if="i.login_transaction_datetime == null">-</span>
                                    <span ng-if="i.login_transaction_datetime">{{i.login_transaction_datetime}}</span>

                                </td>
                                <td>
                                <span ng-if="i.login_transaction_ip_address == null">-</span>
                                    <span ng-if="i.login_transaction_ip_address">{{i.login_transaction_ip_address}}</span>
                                </td>
                            </script>

                            <script type="text/ng-template" id="account_edit">
                                <td style="background-color: #f2f9ff; vertical-align: middle;">{{$index + 1}}</td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;">{{i.account_code}}</td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;">
                                <a href="javascript: void(0)" ng-click="editAccount($index)"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</a> | <a href="javascript: void(0)" ng-click="cancel_edit()">ยกเลิก</a></td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;">
                                    <input type="radio" ng-model="AccountData.selected.account_status" ng-checked="AccountData.selected.account_status == 1" value="1">เปิด
                                    <input type="radio" ng-model="AccountData.selected.account_status" ng-checked="AccountData.selected.account_status == 0" value="0">ปิด<br>
                                    <span style="font-size: 11px;color: #FF0000;font-family: verdana;"><b>รหัสผ่าน: <b></span>
                                    <input type="password" style="width:80px; font-size:11px; font-family:verdana; font-weight:normal; text-align:right;" ng-model="AccountData.selected.account_password"><br>
                                    <span style="font-size: 11px;color: #FF0000;font-family: verdana;"><b>ใช้เฉพาะกรณีที่ต้องการเปลี่ยนรหัสผ่านเท่านั้น</b></span>
                                </td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;">
                                    <input type="radio" ng-model="AccountData.selected.account_is_deleted" ng-checked="AccountData.selected.account_is_deleted == 1" value="1">ระงับ
                                    <input type="radio" ng-model="AccountData.selected.account_is_deleted" ng-checked="AccountData.selected.account_is_deleted == 0" value="0">ไม่ระงับ<br>
                                </td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;"><input style="width:80px; font-size:11px; font-family:verdana; font-weight:normal; text-align:center;" type="text" ng-model="AccountData.selected.account_firstname"></td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;"><input style="width:80px; font-size:11px; font-family:verdana; font-weight:normal; text-align:center;" type="text" ng-model="AccountData.selected.account_lastname"></td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;"><input style="width:80px; font-size:11px; font-family:verdana; font-weight:normal; text-align:center;" type="text" ng-model="AccountData.selected.account_telephone"></td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;"><input style="width:80px; font-size:11px; font-family:verdana; font-weight:normal; text-align:center;" type="text" ng-model="AccountData.selected.account_mobile"></td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;">
                                <span ng-if="i.account_currency == 'THB'">ไทย</span>
                                </td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;">
                                    <span ng-if="i.login_transaction_datetime == null">-</span>
                                    <span ng-if="i.login_transaction_datetime">{{i.login_transaction_datetime}}</span>

                                </td>
                                <td style="background-color: #f2f9ff; vertical-align: middle;">
                                <span ng-if="i.login_transaction_ip_address == null">-</span>
                                    <span ng-if="i.login_transaction_ip_address">{{i.login_transaction_ip_address}}</span>
                                </td>
                            </script>

                        </div>
                    </div>
                </td>
            </tr>
        </table>

    </div>

    </div>
    <?php // End of BackendController in breadcrumb.php ?>
    <script src="<?php echo base_url('commons/js/core/sha512.min.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/services/language.service.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/services/backend.service.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/controllers/backendController.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/controllers/accountListController.js') ?>"></script>