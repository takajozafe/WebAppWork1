<div class="row-full">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><span class="card-header-content">เครดิต/บัญชีคงเหลือ</span>
                <span style="padding-left: 112px;" class="card-header-subcontent ng-binding">จัดการกับผู้ใช้
                        <select ng-model="selected_level" ng-change="onSelectLevel(selected_level); resetOnSelectLevel();">
                                <option value>{{ 'PLEASE_SELECT' | translate }}</option>
                                <option value="0" ng-if="accountLevel == 4">{{ 'SENIOR' | translate }}</option>
                                <option value="1" ng-hide="account_level_current_user == 2" ng-selected="account_level_current_user == 0">{{ 'MASTER' | translate }}</option>
                                <option value="2" ng-selected="is_selected_default_level == 1">{{ 'AGENT' | translate }}</option>
                                <option value="3" ng-selected="is_selected_default_level == 2">{{ 'MEMBER' | translate }}</option>
                            </select>
                            <span ng-hide="under_level == 4" style="padding-right: 100px;"></span> <span ng-hide="under_level == 4">ภายใต้</span>
                <select ng-hide="under_level == 4" ng-disabled="!selected_level" ng-options="item as item.label for item in under_name_list track by item.id" ng-model="selected_under" ng-change="getLastAccountCode(selected_under)">
                                    <option value="">{{ 'PLEASE_SELECT' | translate }}</option>
                                </select>
                <span style="padding-right: 100px;"></span>จัดการกับผู้ใช้ &nbsp;&nbsp;
                <input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="1">&nbsp;&nbsp;เปิด &nbsp;&nbsp;
                <input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="0">&nbsp;&nbsp;ปิด &nbsp;&nbsp;
                <input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="-1">&nbsp;&nbsp;ทั้งหมด
                </span>
            </div>
            <div class="card-body">
                <table class="table-hover">
                    <thead>
                        <tr class="table table-th">
                            <th>ลำดับ</th>
                            <th>รหัสผู้ใช้</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>สถานะ</th>
                            <th>ระงับ</th>
                            <th>แก้ไข</th>
                            <th>เครดิตคงเหลือ</th>
                            <th>เครดิต</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-td" style="text-align: center;" ng-repeat="i in AccountList" ng-include="account_detail_template(i)">
                        </tr>
                    </tbody>
                </table>

                <script type="text/ng-template" id="account_detail">
                    <td class="table-body">{{$index + 1}}</td>
                    <td class="table-body">{{i.account_code}}</td>
                    <td class="table-body">{{i.account_firstname}}</td>
                    <td class="table-body">{{i.account_lastname}}</td>
                    <td class="table-body">
                        <span ng-if="i.account_status == 0">ปิด</span>
                        <span ng-if="i.account_status == 1">เปิด</span>
                    </td>
                    <td class="table-body"><span ng-if="i.account_is_deleted == 1" style="font-size: 11px;color: #FF0000;font-family: verdana;">ระงับ</span>
                        <span ng-if="i.account_is_deleted == 0">ไม่ระงับ</span></td>
                    <td class="table-body">
                        <a href="javascript: void(0)" ng-click="do_edit(i)"><img src="<?php echo base_url('commons/images/edit.png') ?>"></a>
                    </td>
                    <td width="150" class="table-body">{{i.balance || 0.00 | number: 2}}</td>
                    <td width="150" class="table-body">{{i.credit || 0.00 | number: 2}}</td>
                </script>

                <script type="text/ng-template" id="account_edit">
                    <td class="table-body-current-edit">{{$index + 1}}</td>
                    <td class="table-body-current-edit">{{i.account_code}}</td>
                    <td class="table-body-current-edit">{{i.account_firstname}}</td>
                    <td class="table-body-current-edit">{{i.account_lastname}}</td>
                    <td class="table-body-current-edit">
                        <span ng-if="i.account_status == 0">ปิด</span>
                        <span ng-if="i.account_status == 1">เปิด</span>
                    </td>
                    <td class="table-body-current-edit"><span ng-if="i.account_is_deleted == 1" style="font-size: 11px;color: #FF0000;font-family: verdana;">ระงับ</span>
                        <span ng-if="i.account_is_deleted == 0">ไม่ระงับ</span></td>
                    <td class="table-body-current-edit">
                        <a href="javascript: void(0)" ng-click="editAccount($index)"><img src="<?php echo base_url('commons/images/ok.jpg') ?>"></a>
                        <a href="javascript: void(0)" ng-click="cancel_edit()"><img src="<?php echo base_url('commons/images/cancel.jpg') ?>"></a>
                    </td>
                    <td width="150" class="table-body-current-edit">{{i.balance || 0.00 | number: 2}}</td>
                    <td width="150" class="table-body-current-edit">
                        <input style="width:80px; font-size:11px; font-family:verdana; font-weight:normal; text-align:center; float: right;" type="text" format="number" ng-model="AccountData.selected.credit">
                        <br/><br/>
                        <span style="float: right;">ต่ำสุด : {{i.min  || 0.00 | number: 2}}</span>
                        <br/><span style="float: right;">สูงสุด : {{i.max | number: 2}}</span>
                    </td>
                </script>

            </div>
        </div>
    </div>
</div>