<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div ng-controller="AddCoAccountController" ng-init="initAddCoAccount()">

        <table style="width: 100%;">
            <tr>
                <td style="vertical-align:top;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">เพิ่มผู้ใช้ร่วม</h3>
                        </div>
                        <div class="panel-body">

                            <table>
                                <tr>
                                    <td>
                                        <h3 class="panel-title">ค้นหาผู้ใช้ร่วมแยกตามสถานะ</h3>
                                    </td>
                                    <td> <select ng-model="OptionCoAccount" ng-change="getCoAccount(OptionCoAccount)">
                                            <option value="">ทั้งหมด</option>
                                            <option value="0">ปิดใช้งาน</option>
                                            <option value="1">เปิดใช้งาน</option>
                                        </select></td>
                                </tr>
                            </table><br/>

                            <table class="table table-hover table-bordered">
                                <thead style="background-color: #4c69b9;">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสผู้ใช้</th>
                                        <th>รหัสผ่าน</th>
                                        <th>สถานะ</th>
                                        <th>ชื่อ</th>
                                        <th>สกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>ระบบจัดการ</th>
                                        <th>ยอดพนันสุทธิ</th>
                                        <th>รายงาน</th>
                                        <th>ข้อมูลผู้ใช้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <thead style="background-color: #efefef;">
                                        <tr>
                                            <th><button ng-click="addCoAccount()">เพิ่ม</button></th>
                                            <th><input type="text" ng-model="co_account_code" ng-change="co_account_code = co_account_code.toUpperCase()" style="text-align:right"> @ {{account_code}}</th>
                                            <th><input type="password" ng-model="co_account_password"></th>
                                            <th></th>
                                            <th><input type="text" ng-model="co_account_name"></th>
                                            <th><input type="text" ng-model="co_account_lastname"></th>
                                            <th><input type="text" ng-model="co_account_telephone"></th>
                                            <th><input type="checkbox" ng-model="permission_management"></th>
                                            <th><input type="checkbox" ng-model="permission_total_bet"></th>
                                            <th><input type="checkbox" ng-model="permission_report"></th>
                                            <th><input type="checkbox" ng-model="permission_account"></th>
                                        </tr>
                                    </thead>
                                    <tr style="text-align: center;" ng-repeat="i in coAccountList" ng-include="co_account_detail_template(i)">
                                    </tr>
                                </tbody>
                            </table>

                            <script type="text/ng-template" id="co_account_detail">
                                <td>{{$index + 1}}</td>
                                <td>{{i.co_account_code}}</td>
                                <td><a href="javascript: void(0)" ng-click="do_edit(i)"><strong><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</strong></a></td>
                                <td>
                                    <span ng-if="i.co_account_status == 0">ปิด</span>
                                    <span ng-if="i.co_account_status == 1">เปิด</span>
                                </td>
                                <td>{{i.co_account_name}}</td>
                                <td>{{i.co_account_lastname}}</td>
                                <td>{{i.co_account_telephone}}</td>
                                <td>
                                    <span ng-if="i.permission_management == 0">ปิดการใช้งาน</span>
                                    <span ng-if="i.permission_management == 1">ใช้งาน</span>
                                </td>
                                <td>
                                    <span ng-if="i.permission_total_bet == 0">ปิดการใช้งาน</span>
                                    <span ng-if="i.permission_total_bet == 1">ใช้งาน</span>
                                </td>
                                <td>
                                    <span ng-if="i.permission_report == 0">ปิดการใช้งาน</span>
                                    <span ng-if="i.permission_report == 1">ใช้งาน</span>

                                </td>
                                <td>
                                    <span ng-if="i.permission_account == 0">ปิดการใช้งาน</span>
                                    <span ng-if="i.permission_account == 1">ใช้งาน</span>
                                </td>
                            </script>

                            <script type="text/ng-template" id="co_account_edit">
                                <td style="background-color: #efff97; vertical-align: middle;">{{$index + 1}}</td>
                                <td style="background-color: #efff97; vertical-align: middle;">{{i.co_account_code}}</td>
                                <td style="background-color: #efff97; vertical-align: middle;"><a href="javascript: void(0)" ng-click="editCoAccount($index)"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</a> | <a href="javascript: void(0)" ng-click="cancel_edit()">ยกเลิก</a></td>
                                <td style="background-color: #efff97; vertical-align: middle;">
                                    <input type="radio" ng-model="coAccountData.selected.co_account_status" ng-checked="coAccountData.selected.co_account_status == 1" value="1">เปิด
                                    <input type="radio" ng-model="coAccountData.selected.co_account_status" ng-checked="coAccountData.selected.co_account_status == 0" value="0">ปิด<br>
                                    <span style="color: red;">รหัสผ่าน : <input type="password" ng-model="coAccountData.selected.co_account_password"><br>ใช้เฉพาะกรณีที่ต้องการเปลี่ยนรหัสผ่านเท่านั้น</span>
                                </td>
                                <td style="background-color: #efff97; vertical-align: middle;"><input type="text" ng-model="coAccountData.selected.co_account_name"></td>
                                <td style="background-color: #efff97; vertical-align: middle;"><input type="text" ng-model="coAccountData.selected.co_account_lastname"></td>
                                <td style="background-color: #efff97; vertical-align: middle;"><input type="text" ng-model="coAccountData.selected.co_account_telephone"></td>
                                <td style="background-color: #efff97; vertical-align: middle;"><input type="checkbox" ng-model="coAccountData.selected.permission_management" ng-checked="coAccountData.selected.permission_management == 1"></td>
                                <td style="background-color: #efff97; vertical-align: middle;"><input type="checkbox" ng-model="coAccountData.selected.permission_total_bet" ng-checked="coAccountData.selected.permission_total_bet == 1"></td>
                                <td style="background-color: #efff97; vertical-align: middle;"><input type="checkbox" ng-model="coAccountData.selected.permission_report" ng-checked="coAccountData.selected.permission_report == 1"></td>
                                <td style="background-color: #efff97; vertical-align: middle;"><input type="checkbox" ng-model="coAccountData.selected.permission_account" ng-checked="coAccountData.selected.permission_account == 1"></td>
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
    <script src="<?php echo base_url('commons/js/backend/controllers/addCoAccountController.js') ?>"></script>