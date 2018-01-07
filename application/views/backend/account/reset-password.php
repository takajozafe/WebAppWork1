<div class="row-full">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><span class="card-header-content">เปลี่ยนรหัสผ่าน</span></div>
            <div class="card-body">
                <table class="table-hover" style="width:300px; margin-left: auto; margin-right:auto; font-size:14px !important">
                    <thead>
                        <tr class="table table-th">
                            <th colspan="2" style="text-align: left; width: 150px;"><img style="padding-left: 3px;" src="<?php echo base_url('commons/images/arrow_dot.gif') ?>"> เปลี่ยนรหัสผ่าน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> รหัสผ่านเดิม</td>
                            <td style="text-align: center;"><input type="password" ng-model="currentPassword"></td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> รหัสผ่านใหม่</td>
                            <td style="text-align: center;"><input type="password" ng-model="newPassword"></td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> ยืนยันรหัสผ่านใหม่</td>
                            <td style="text-align: center;"><input type="password" ng-model="confirmPassword" ng-change="validatePassword(newPassword, confirmPassword)"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><button ng-click="resetPassword(currentPassword, confirmPassword)" ng-disabled="isValid">เปลี่ยนรหัสผ่าน</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>