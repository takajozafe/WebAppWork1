<div class="row-full">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><span class="card-header-content">ข้อมูลการเงิน</span></div>
            <div class="card-body">
                <table class="table-hover" style="width:550px; margin-left: auto; margin-right:auto; font-size:14px !important">
                    <thead>
                        <tr class="table table-th">
                            <th style="text-align: left; width: 150px;"><img style="padding-left: 3px;" src="<?php echo base_url('commons/images/arrow_dot.gif') ?>"> รหัสผู้ใช้</th>
                            <th>{{accountNickname}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> ยอดเงินสด</td>
                            <td style="text-align: center;">{{data.cash_balance || 0 | number : 2}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> ยอดเงินรวมทั้งหมด</td>
                            <td style="text-align: center;">{{data.total_balance || 0 | number : 2}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> ยอดล่วงหน้า ซีเนียร์</td>
                            <td style="text-align: center;">{{data.senior_outstanding || 0 | number : 2}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> ยอดล่วงหน้า สุทธิ</td>
                            <td style="text-align: center;">{{data.total_outstanding || 0 | number : 2}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> เครดิต ซีเนียร์</td>
                            <td style="text-align: center;">{{data.senior_credit || 0 | number : 2}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> เครดิต มาสเตอร์</td>
                            <td style="text-align: center;">{{data.master_credit || 0 | number : 2}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> เครดิต เอเย่นต์</td>
                            <td style="text-align: center;">{{data.agent_credit || 0 | number : 2}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> เครดิต เมมเบอร์</td>
                            <td style="text-align: center;">{{data.member_credit || 0 | number : 2}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> จำนวน มาสเตอร์ เปิด/ปิด</td>
                            <td style="text-align: center;">{{data.total_master}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> จำนวน เอเย่นต์ เปิด/ปิด</td>
                            <td style="text-align: center;">{{data.total_agent}}</td>
                        </tr>
                        <tr class="table-body">
                            <td><img style="padding-right: 7px; padding-left: 5px;" src="<?php echo base_url('commons/images/arrow.gif') ?>"> จำนวน เมมเบอร์ เปิด/ปิด</td>
                            <td style="text-align: center;">{{data.total_member}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>