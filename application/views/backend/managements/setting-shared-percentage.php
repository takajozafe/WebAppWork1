<div class="row-full">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><span class="card-header-content">เครดิต/บัญชีคงเหลือ</span>
                <span style="padding-left: 112px;" class="card-header-subcontent ng-binding">มาสเตอร์
                        <select ng-model="selected_master" ng-options="item as item.label for item in MasterList" ng-change="onSelectMaster(selected_master)"></select>
                        <span ng-hide="under_level == 4" style="padding-right: 100px;"></span> <span ng-hide="under_level == 4">เอเย่นต์</span>
                <select ng-model="selected_agent" ng-options="item as item.label for item in AgentList" ng-change="onSelectAgent(selected_agent, OptionAccount)"></select>
                <span style="padding-right: 100px;"></span>เลือกประเภท &nbsp;&nbsp;
                <input type="radio" ng-model="OptionDigit" ng-change="onSelectStatusDigit(OptionDigit)" value="3">&nbsp;&nbsp;3 ตัว &nbsp;&nbsp;
                <input type="radio" ng-model="OptionDigit" ng-change="onSelectStatusDigit(OptionDigit)" value="2">&nbsp;&nbsp;2 ตัว &nbsp;&nbsp;
                <input type="radio" ng-model="OptionDigit" ng-change="onSelectStatusDigit(OptionDigit)" value="1">&nbsp;&nbsp;1 ตัว
                <input type="radio" ng-model="OptionDigit" ng-change="onSelectStatusDigit(OptionDigit)" value="19">&nbsp;&nbsp;19 กลับ
                </span>
            </div>
            <span style="text-align: center; font-size: 12px;">จัดการกับผู้ใช้
            <input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="1">&nbsp;&nbsp;เปิด &nbsp;&nbsp;
                <input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="0">&nbsp;&nbsp;ปิด &nbsp;&nbsp;
                <input type="radio" ng-model="OptionAccount" ng-change="onSelectStatus(OptionAccount)" value="-1">&nbsp;&nbsp;ทั้งหมด
                </span>

            <div class="card-body">
                <table class="table-hover">
                    <!-- <thead>
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
                    </thead> -->
                    <thead>
                        <tr class="table table-th" align="center">
                            <th width="34" rowspan="2">ลำดับ</th>
                            <th width="118" rowspan="2">รหัสผู้ใช้</th>
                            <th width="130" rowspan="2">ชื่อ</th>
                            <th width="70" rowspan="2" align="center"> <input type="checkbox" name="chkAllSePt"></th>
                            <th colspan="3" align="center" style="cursor:hand"><span>ซีเนียร์</span></th>
                            <th width="70" rowspan="2" align="center"> <input type="checkbox" name="chkAllMaPt"></th>
                            <th colspan="3" align="center" style="cursor:hand"><span>มาสเตอร์</span></th>
                            <th width="70" rowspan="2" align="center"> <input type="checkbox" name="chkAllAgPt"></th>
                            <th colspan="3" align="center" style="cursor:hand"><span>เอเย่นต์</span></th>
                        </tr>
                        <tr class="table table-th">
                            <th>3 ตัวบน</th>
                            <th>3 ตัวล่าง</th>
                            <th>3 ตัวโต๊ด</th>
                            <th>3 ตัวบน</th>
                            <th>3 ตัวล่าง</th>
                            <th>3 ตัวโต๊ด</th>
                            <th>3 ตัวบน</th>
                            <th>3 ตัวล่าง</th>
                            <th>3 ตัวโต๊ด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body" style="text-align: center;" ng-repeat="i in AccountList" ng-include="account_detail_template(i)">
                        </tr>
                        <!-- <tr bgcolor="#86b9ec" style="text-align: center;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="button" name="setSe" value="จัดการ"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="button" name="setMa" value="จัดการ"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="button" name="setAg" value="จัดการ"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> -->
                    </tbody>
                </table>

                <script type="text/ng-template" id="account_detail">
                    <td>{{$index + 1}}</td>
                    <td>{{i.account_code}}</td>
                    <td>{{i.account_firstname}}</td>
                    <td><input type="checkbox" name="chkSePt[]" value="{{i.account_id}}"></td>
                    <td>{{i.value_3d_top_se}}</td>
                    <td>{{i.value_3d_bottom_se}}</td>
                    <td>{{i.value_3d_top_roll_se}}</td>
                    <td><input type="checkbox" name="chkMaPt[]" value="{{i.account_id}}"></td>
                    <td>{{i.value_3d_top_ma}}</td>
                    <td>{{i.value_3d_bottom_ma}}</td>
                    <td>{{i.value_3d_top_roll_ma}}</td>
                    <td><input type="checkbox" name="chkAgPt[]" value="{{i.account_id}}"></td>
                    <td>{{i.value_3d_top_ag}}</td>
                    <td>{{i.value_3d_bottom_ag}}</td>
                    <td>{{i.value_3d_top_roll_ag}}</td>
                </script>

            </div>
        </div>
    </div>
</div>