<div class="row-full">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><span class="card-header-content">{{ 'NAVIGATION_MANAGEMENT_ADD_USER' | translate }}</span>
                <span style="padding-left: 112px;" class="card-header-subcontent ng-binding">จัดการกับผู้ใช้
                        &nbsp;&nbsp;<input type="radio" ng-model="OptionCoAccount" ng-change="getCoAccount(OptionCoAccount)" ng-selected="OptionCoAccount == 1" value="1">&nbsp;&nbsp;เปิด
                        &nbsp;&nbsp;<input type="radio" ng-model="OptionCoAccount" ng-change="getCoAccount(OptionCoAccount)" value="0">&nbsp;&nbsp;ปิด
                        &nbsp;&nbsp;<input type="radio" ng-model="OptionCoAccount" ng-change="getCoAccount(OptionCoAccount)" value="">&nbsp;&nbsp;ทั้งหมด
                </span>
            </div>
            <div class="card-body">
                <table class="table-hover">
                    <thead>
                        <tr class="table table-th">
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
                        <thead>
                            <tr class="table-td table-top-insert">
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
                        <tr class="table-td" style="text-align: center;" ng-repeat="i in coAccountList" ng-include="co_account_detail_template(i)">
                        </tr>
                    </tbody>
                </table>

                <script type="text/ng-template" id="co_account_detail">
                    <td class="table-body">{{$index + 1}}</td>
                    <td class="table-body">{{i.co_account_code}}</td>
                    <td class="table-body">
                        <a href="javascript: void(0)" ng-click="do_edit(i)"><img src="<?php echo base_url('commons/images/edit.png') ?>"></a>
                    </td>
                    <td class="table-body">
                        <span ng-if="i.co_account_status == 0">ปิด</span>
                        <span ng-if="i.co_account_status == 1">เปิด</span>
                    </td>
                    <td class="table-body">{{i.co_account_name}}</td>
                    <td class="table-body">{{i.co_account_lastname}}</td>
                    <td class="table-body">{{i.co_account_telephone}}</td>
                    <td class="table-body">
                        <span ng-if="i.permission_management == 0">ปิดการใช้งาน</span>
                        <span ng-if="i.permission_management == 1">ใช้งาน</span>
                    </td>
                    <td class="table-body">
                        <span ng-if="i.permission_total_bet == 0">ปิดการใช้งาน</span>
                        <span ng-if="i.permission_total_bet == 1">ใช้งาน</span>
                    </td>
                    <td class="table-body">
                        <span ng-if="i.permission_report == 0">ปิดการใช้งาน</span>
                        <span ng-if="i.permission_report == 1">ใช้งาน</span>

                    </td>
                    <td class="table-body">
                        <span ng-if="i.permission_account == 0">ปิดการใช้งาน</span>
                        <span ng-if="i.permission_account == 1">ใช้งาน</span>
                    </td>
                </script>

                <script type="text/ng-template" id="co_account_edit">
                    <td class="table-body-current-edit">{{$index + 1}}</td>
                    <td class="table-body-current-edit">{{i.co_account_code}}</td>
                    <td class="table-body-current-edit">
                        <a href="javascript: void(0)" ng-click="editCoAccount($index)"><img src="<?php echo base_url('commons/images/ok.jpg') ?>"></a>
                        <a href="javascript: void(0)" ng-click="cancel_edit()"><img src="<?php echo base_url('commons/images/cancel.jpg') ?>"></a>
                    </td>
                    <td class="table-body-current-edit">
                        <input type="radio" ng-model="coAccountData.selected.co_account_status" ng-checked="coAccountData.selected.co_account_status == 1" value="1">เปิด
                        <input type="radio" ng-model="coAccountData.selected.co_account_status" ng-checked="coAccountData.selected.co_account_status == 0" value="0">ปิด<br>
                        <span style="color: red;">รหัสผ่าน : <input type="password" ng-model="coAccountData.selected.co_account_password"><br>ใช้เฉพาะกรณีที่ต้องการเปลี่ยนรหัสผ่านเท่านั้น</span>
                    </td>
                    <td class="table-body-current-edit"><input type="text" ng-model="coAccountData.selected.co_account_name"></td>
                    <td class="table-body-current-edit"><input type="text" ng-model="coAccountData.selected.co_account_lastname"></td>
                    <td class="table-body-current-edit"><input type="text" ng-model="coAccountData.selected.co_account_telephone"></td>
                    <td class="table-body-current-edit"><input type="checkbox" ng-model="coAccountData.selected.permission_management" ng-checked="coAccountData.selected.permission_management == 1"></td>
                    <td class="table-body-current-edit"><input type="checkbox" ng-model="coAccountData.selected.permission_total_bet" ng-checked="coAccountData.selected.permission_total_bet == 1"></td>
                    <td class="table-body-current-edit"><input type="checkbox" ng-model="coAccountData.selected.permission_report" ng-checked="coAccountData.selected.permission_report == 1"></td>
                    <td class="table-body-current-edit"><input type="checkbox" ng-model="coAccountData.selected.permission_account" ng-checked="coAccountData.selected.permission_account == 1"></td>
                </script>
            </div>
        </div>
    </div>
</div>