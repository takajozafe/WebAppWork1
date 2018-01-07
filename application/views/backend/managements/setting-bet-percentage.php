<div class="row">
    <div class="col-md-6-left">
        <div class="card">
            <div class="card-header"><span class="card-header-content">{{ 'SETTING_BY_DIGIT_TYPE' | translate }}</span></div>
            <div class="card-body">
                <table class="table-hover">
                    <thead>
                        <tr class="table table-th">
                            <th>ลำดับ</th>
                            <th>ประเภท</th>
                            <th>ไม่ถือสู้</th>
                            <th>จำกัดการถือสู้</th>
                            <th>จำนวนเงิน</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <thead>
                            <tr class="table-td table-top-insert">
                                <td></td>
                                <td>
                                    <select ng-options="item as item.label | translate for item in digits track by item.id" ng-model="selected_digit"></select>
                                </td>
                                <td><input type="radio" ng-change="isAllowAmount(positionTaking)" name="positionTaking" ng-model="positionTaking" value="0" ng-checked="positionTaking == '0'"></td>
                                <td><input type="radio" ng-change="isAllowAmount(positionTaking)" name="positionTaking" ng-model="positionTaking" value="1"></td>
                                <td><input onkeypress="return isNumber(event)" style="width: 80px; text-align: center;" ng-disabled="!allowAmount" type="text" name="amount" ng-model="amount"></td>
                                <td><button ng-disabled="digits.length == 0" type="submit" ng-click="setBetByType(selected_digit.id, positionTaking, amount)">เพิ่ม</button></td>
                            </tr>
                        </thead>
                        <tr class="table-td" ng-repeat="data in modelSettingBet.dataSettingBetByTypeList track by data.setting_bet_by_type_id | orderBy : 'digit_id'" ng-include="getTemplate(data)" style="text-align:center;">
                        </tr>
                    </tbody>
                </table>

                <script type="text/ng-template" id="display">
                    <td class="table-body">{{$index + 1}}</td>
                    <td class="table-body">{{data.digit_localization | translate}}</td>
                    <td class="table-body">
                        <span ng-if="data.setting_bet_by_type_is_limit == 0" style="color: red;">{{ 'CLOSED' | translate }}</span>
                    </td>
                    <td class="table-body">
                        <span ng-if="data.setting_bet_by_type_is_limit == 1" style="color: red;">{{ 'LIMIT' | translate }}</span>
                    </td>
                    <td class="table-body">
                        <span ng-if="data.setting_bet_by_type_is_limit != 0 && data.setting_bet_by_type_amount != 0">{{data.setting_bet_by_type_amount}}</span>
                    </td>
                    <td class="table-body">
                        <a href="javascript: void(0)" ng-click="editSettingBetByType(data)"><img src="<?php echo base_url('commons/images/edit.png') ?>"></a>
                        <a href="javascript: void(0)" ng-click="deleteBetByType($index)"><img src="<?php echo base_url('commons/images/close.gif') ?>"></a>
                    </td>
                </script>

                <script type="text/ng-template" id="edit">
                    <td class="table-body-current-edit">{{$index + 1}}</td>
                    <td class="table-body-current-edit">{{data.digit_localization | translate}}</td>
                    <td class="table-body-current-edit">
                        <input type="radio" ng-model="modelSettingBet.selected.setting_bet_by_type_is_limit" value="0" name="positionTaking[{{data.setting_bet_by_type_id}}]" ng-checked="data.setting_bet_by_type_is_limit == '0'">
                    </td>
                    <td class="table-body-current-edit">
                        <input type="radio" ng-model="modelSettingBet.selected.setting_bet_by_type_is_limit" value="1" name="positionTaking[{{data.setting_bet_by_type_id}}]" ng-checked="data.setting_bet_by_type_is_limit == '1'">
                    </td>
                    <td class="table-body-current-edit">
                        <input onkeypress="return isNumber(event)" ng-disabled="modelSettingBet.selected.setting_bet_by_type_is_limit == 0" ng-model="modelSettingBet.selected.setting_bet_by_type_amount" type="text" value="{{data.setting_bet_by_type_amount}}" style="width: 80px; text-align: center;">
                    </td>
                    <td class="table-body-current-edit">
                        <a href="javascript: void(0)" ng-click="saveSettingBetByType($index)"><img src="<?php echo base_url('commons/images/ok.jpg') ?>"></a>
                        <a href="javascript: void(0)" ng-click="resetSettingBetByType()"><img src="<?php echo base_url('commons/images/cancel.jpg') ?>"></a>
                    </td>
                </script>

                <!-- <table class="table table-hover table-bordered">
                    <thead style="background-color: #4c69b9;">
                        <tr>
                            <th>ลำดับ</th>
                            <th>ประเภท</th>
                            <th>ไม่ถือสู้</th>
                            <th>จำกัดการถือสู้</th>
                            <th>จำนวนเงิน</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <thead style="background-color: #efefef;">
                            <tr>
                                <th></th>
                                <th>
                                    <select ng-options="item as item.label | translate for item in digits track by item.id" ng-model="selected_digit"></select>
                                </th>
                                <th><input type="radio" ng-change="isAllowAmount(positionTaking)" name="positionTaking" ng-model="positionTaking" value="0" ng-checked="positionTaking == '0'"></th>
                                <th><input type="radio" ng-change="isAllowAmount(positionTaking)" name="positionTaking" ng-model="positionTaking" value="1"></th>
                                <th><input onkeypress="return isNumber(event)" style="width: 80px; text-align: center;" ng-disabled="!allowAmount" type="text" name="amount" ng-model="amount"></th>
                                <th><button ng-disabled="digits.length == 0" type="submit" ng-click="setBetByType(selected_digit.id, positionTaking, amount)">เพิ่ม</button></th>
                            </tr>
                        </thead>
                        <tr ng-repeat="data in modelSettingBet.dataSettingBetByTypeList track by data.setting_bet_by_type_id | orderBy : 'digit_id'" ng-include="getTemplate(data)" style="text-align:center;">
                        </tr>
                    </tbody>
                </table>

                <script type="text/ng-template" id="display">
                    <td>{{$index + 1}}</td>
                    <td>{{data.digit_localization | translate}}</td>
                    <td>
                        <span ng-if="data.setting_bet_by_type_is_limit == 0" style="color: red;">{{ 'CLOSED' | translate }}</span>
                    </td>
                    <td>
                        <span ng-if="data.setting_bet_by_type_is_limit == 1" style="color: red;">{{ 'LIMIT' | translate }}</span>
                    </td>
                    <td>
                        <span ng-if="data.setting_bet_by_type_is_limit != 0 && data.setting_bet_by_type_amount != 0">{{data.setting_bet_by_type_amount}}</span>
                    </td>
                    <td>
                        <a href="javascript: void(0)" ng-click="editSettingBetByType(data)">แก้ไข</a> | <a href="javascript: void(0)" ng-click="deleteBetByType($index)">ลบ</a>
                    </td>
                </script>

                <script type="text/ng-template" id="edit">
                    <td style="background-color: #efff97;">{{$index + 1}}</td>
                    <td style="background-color: #efff97;">{{data.digit_localization | translate}}</td>
                    <td style="background-color: #efff97;">
                        <input type="radio" ng-model="modelSettingBet.selected.setting_bet_by_type_is_limit" value="0" name="positionTaking[{{data.setting_bet_by_type_id}}]" ng-checked="data.setting_bet_by_type_is_limit == '0'">
                    </td>
                    <td style="background-color: #efff97;">
                        <input type="radio" ng-model="modelSettingBet.selected.setting_bet_by_type_is_limit" value="1" name="positionTaking[{{data.setting_bet_by_type_id}}]" ng-checked="data.setting_bet_by_type_is_limit == '1'">
                    </td>
                    <td style="background-color: #efff97;">
                        <input onkeypress="return isNumber(event)" ng-disabled="modelSettingBet.selected.setting_bet_by_type_is_limit == 0" ng-model="modelSettingBet.selected.setting_bet_by_type_amount" type="text" value="{{data.setting_bet_by_type_amount}}" style="width: 80px; text-align: center;">
                    </td>
                    <td style="background-color: #efff97;">
                        <a href="javascript: void(0)" ng-click="saveSettingBetByType($index)">บันทึก</a> | <a href="javascript: void(0)" ng-click="resetSettingBetByType()">ยกเลิก</a>
                    </td>
                </script> -->
            </div>
        </div>
    </div>
    <div class="col-md-6-right">
        <div class="card">
            <div class="card-header">
                <span class="card-header-content">{{ 'SETTING_BY_NUMBER' | translate }}</span>
                <span class="card-header-subcontent">{{ 'ROUND_DATE' | translate }}
                        <select style="font-size: 11px; font-family: sans-serif;" 
                        ng-options="item as item.label for item in lottoRoundDate" 
                        ng-model="selected_lottoRoundDate"
                        ng-change="changeLottoRoundDate(selected_lottoRoundDate)">
                </select>
                </span>
            </div>
            <div class="card-body">
                <table class="table-hover">
                    <thead>
                        <tr class="table-th">
                            <th>ลำดับ</th>
                            <th>รหัสผู้ใช้</th>
                            <th>ประเภท</th>
                            <th>กำหนดหมายเลข</th>
                            <th>ไม่ถือสู้</th>
                            <th>จำกัดการถือสู้</th>
                            <th>จำนวนเงิน</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <thead>
                            <tr class="table-td table-top-insert" ng-if="isEditable">
                                <td></td>
                                <td></td>
                                <td>
                                    <select ng-options="item as item.label | translate for item in digitsByDigit track by item.id" ng-model="selected_digitByDigit" ng-change="digit = null"></select>
                                </td>
                                <td><input autocomplete="off" maxlength="{{selected_digitByDigit.max_length}}" onkeypress="return isNumber(event)" style="width: 80px; text-align: center;" type="text" ng-model="digit">
                                </td>
                                <td><input type="radio" ng-change="isAllowAmountByDigit(positionTakingByDigit)" name="positionTakingByDigit" ng-model="positionTakingByDigit" value="0" ng-checked="positionTakingByDigit == '0'"></td>
                                <td><input type="radio" ng-change="isAllowAmountByDigit(positionTakingByDigit)" name="positionTakingByDigit" ng-model="positionTakingByDigit" value="1"></td>
                                <td><input onkeypress="return isNumber(event)" style="width: 80px; text-align: center;" ng-disabled="!allowAmountByDigit" type="text" name="amount" ng-model="amountByDigit"></td>
                                <td><button ng-click="setBetByDigit(selected_digitByDigit.id, digit, positionTakingByDigit, amountByDigit)" ng-disabled="digit == null" type="submit">เพิ่ม</button></td>
                            </tr>
                        </thead>
                        <tr class="table-td" ng-repeat="data in modelSettingBetByDigit.dataSettingBetByDigitList | orderBy : 'digit_id' | orderBy: 'created_date' : reverse" ng-include="getTemplateSettingBetByDigit(data)" style="text-align:center;">
                        </tr>
                    </tbody>
                </table>

                <script type="text/ng-template" id="display_setting_bet_by_digit">
                    <td class="table-body">{{$index + 1}}</td>
                    <td class="table-body">{{data.account_code}}</td>
                    <td class="table-body">{{data.digit_localization | translate}}</td>
                    <td class="table-body">{{data.digit}}</td>
                    <td class="table-body">
                        <span ng-if="data.setting_bet_by_digit_is_limit == 0" style="color: red;">{{ 'CLOSED' | translate }}</span>
                    </td>
                    <td class="table-body">
                        <span ng-if="data.setting_bet_by_digit_is_limit == 1" style="color: red;">{{ 'LIMIT' | translate }}</span>
                    </td>
                    <td class="table-body">
                        <span ng-if="data.setting_bet_by_digit_is_limit != 0 && data.setting_bet_by_digit_amount != 0">{{data.setting_bet_by_digit_amount}}</span>
                    </td>
                    <td class="table-body">
                        <span ng-if="isEditable">
                            <a href="javascript: void(0)" ng-click="editSettingBetByDigit(data)"><img src="<?php echo base_url('commons/images/edit.png') ?>"></a>
                            <a href="javascript: void(0)" ng-click="deleteBetByDigit($index)"><img src="<?php echo base_url('commons/images/close.gif') ?>"></a>
                        </span>
                    </td>
                </script>

                <script type="text/ng-template" id="edit_setting_bet_by_digit">
                    <td class="table-body-current-edit">{{$index + 1}}</td>
                    <td class="table-body-current-edit">{{data.account_code}}</td>
                    <td class="table-body-current-edit">{{data.digit_localization | translate}}</td>
                    <td class="table-body-current-edit">
                        <input autocomplete="off" maxlength="{{modelSettingBetByDigit.selected.digit_max_length}}" required onkeypress="return isNumber(event)" ng-model="modelSettingBetByDigit.selected.digit" type="text" value="{{data.digit}}" style="width: 80px; text-align: center;">
                    </td>
                    <td class="table-body-current-edit">
                        <input type="radio" ng-model="modelSettingBetByDigit.selected.setting_bet_by_digit_is_limit" value="0" name="positionTakingByDigit[{{data.setting_bet_by_digit_id}}]" ng-checked="data.setting_bet_by_digit_is_limit == '0'">
                    </td>
                    <td class="table-body-current-edit">
                        <input type="radio" ng-model="modelSettingBetByDigit.selected.setting_bet_by_digit_is_limit" value="1" name="positionTakingByDigit[{{data.setting_bet_by_digit_id}}]" ng-checked="data.setting_bet_by_digit_is_limit == '1'">
                    </td>
                    <td class="table-body-current-edit">
                        <input onkeypress="return isNumber(event)" ng-disabled="modelSettingBetByDigit.selected.setting_bet_by_digit_is_limit == 0" ng-model="modelSettingBetByDigit.selected.setting_bet_by_digit_amount" type="text" value="{{data.setting_bet_by_digit_amount}}"
                            style="width: 80px; text-align: center;">
                    </td>
                    <td class="table-body-current-edit">
                        <a href="javascript: void(0)" ng-click="saveSettingBetByDigit($index)"><img src="<?php echo base_url('commons/images/ok.jpg') ?>"></a>
                        <a href="javascript: void(0)" ng-click="resetSettingBetByDigit()"><img src="<?php echo base_url('commons/images/cancel.jpg') ?>"></a>
                    </td>
                </script>
            </div>
        </div>
    </div>
</div>

<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>