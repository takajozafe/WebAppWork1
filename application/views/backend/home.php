<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; vertical-align:top;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">ตั้งค่าตามประเภท</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered">
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
                        </script>

                        <p class="text-danger">
                            <strong>
                                ***สำคัญมาก เนื่องจากมีการตั้งค่าให้ {{accountNickname}}
                                สามารถถือสู้ของที่ชั้นบนหรือชั้นล่างรับของเต็มจำนวนอั้น <br/>
                                (สามารถรับของได้อีกเมื่อเว็บปิดรับหมายเลขนั้นๆไปแล้ว) <br/>
                                ดังนั้น ผู้ใช้ต้องทำการตั้งค่า จำนวนถือสู้การแทง 
                                มิฉะนั้นระบบจะถือว่าผู้ใช้ไม่ต้องการรับของในการแทงเลขในแต่ละประเภทนั้นๆ
                            </strong>
                        </p>

                    </div>
                </div>
                </tdtd>
                <td style="width: 50%; vertical-align:top;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">ตั้งค่าตามหมายเลข
                                <span style="color: #000000;">งวดที่ 
                                    <select style="font-size: 11px; font-family: sans-serif;" 
                                            ng-options="item as item.label for item in lottoRoundDate" 
                                            ng-model="selected_lottoRoundDate"
                                            ng-change="changeLottoRoundDate(selected_lottoRoundDate)">
                                    </select>
                                </span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                                <thead style="background-color: #4c69b9;">
                                    <tr>
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
                                        <thead style="background-color: #efefef;">
                                            <tr ng-if="isEditable">
                                                <th></th>
                                                <th></th>
                                                <th>
                                                    <select ng-options="item as item.label | translate for item in digitsByDigit track by item.id" ng-model="selected_digitByDigit" ng-change="digit = null"></select>
                                                </th>
                                                <th><input autocomplete="off" 
                                                            maxlength="{{selected_digitByDigit.max_length}}" 
                                                            onkeypress="return isNumber(event)" 
                                                            style="width: 80px; text-align: center;" 
                                                            type="text" 
                                                            ng-model="digit">
                                                </th>
                                                <th><input type="radio" ng-change="isAllowAmountByDigit(positionTakingByDigit)" name="positionTakingByDigit" ng-model="positionTakingByDigit" value="0" ng-checked="positionTakingByDigit == '0'"></th>
                                                <th><input type="radio" ng-change="isAllowAmountByDigit(positionTakingByDigit)" name="positionTakingByDigit" ng-model="positionTakingByDigit" value="1"></th>
                                                <th><input onkeypress="return isNumber(event)" style="width: 80px; text-align: center;" ng-disabled="!allowAmountByDigit" type="text" name="amount" ng-model="amountByDigit"></th>
                                                <th><button ng-click="setBetByDigit(selected_digitByDigit.id, digit, positionTakingByDigit, amountByDigit)" ng-disabled="digit == null" type="submit">เพิ่ม</button></th>
                                            </tr>
                                        </thead>
                                        <tr ng-repeat="data in modelSettingBetByDigit.dataSettingBetByDigitList | orderBy : 'digit_id' | orderBy: 'created_date' : reverse" ng-include="getTemplateSettingBetByDigit(data)" style="text-align:center;">
                                        </tr>
                                </tbody>
                            </table>

                            <script type="text/ng-template" id="display_setting_bet_by_digit">
                                <td>{{$index + 1}}</td>
                                <td>{{data.account_code}}</td>
                                <td>{{data.digit_localization | translate}}</td>
                                <td>{{data.digit}}</td>
                                <td>
                                    <span ng-if="data.setting_bet_by_digit_is_limit == 0" style="color: red;">{{ 'CLOSED' | translate }}</span>
                                </td>
                                <td>
                                    <span ng-if="data.setting_bet_by_digit_is_limit == 1" style="color: red;">{{ 'LIMIT' | translate }}</span>
                                </td>
                                <td>
                                    <span ng-if="data.setting_bet_by_digit_is_limit != 0 && data.setting_bet_by_digit_amount != 0">{{data.setting_bet_by_digit_amount}}</span>
                                </td>
                                <td>
                                    <span ng-if="isEditable">
                                        <a href="javascript: void(0)" ng-click="editSettingBetByDigit(data)">แก้ไข</a>
                                        <a href="javascript: void(0)" ng-click="deleteBetByDigit($index)">ลบ</a>
                                    </span>
                                </td>
                            </script>

                            <script type="text/ng-template" id="edit_setting_bet_by_digit">
                                <td style="background-color: #efff97;">{{$index + 1}}</td>
                                <td style="background-color: #efff97;">{{data.account_code}}</td>
                                <td style="background-color: #efff97;">{{data.digit_localization | translate}}</td>
                                <td style="background-color: #efff97;">
                                    <input autocomplete="off" maxlength="{{modelSettingBetByDigit.selected.digit_max_length}}" required onkeypress="return isNumber(event)" ng-model="modelSettingBetByDigit.selected.digit" type="text" value="{{data.digit}}" style="width: 80px; text-align: center;">
                                </td>
                                <td style="background-color: #efff97;">
                                    <input type="radio" ng-model="modelSettingBetByDigit.selected.setting_bet_by_digit_is_limit" value="0" name="positionTakingByDigit[{{data.setting_bet_by_digit_id}}]" ng-checked="data.setting_bet_by_digit_is_limit == '0'">
                                </td>
                                <td style="background-color: #efff97;">
                                    <input type="radio" ng-model="modelSettingBetByDigit.selected.setting_bet_by_digit_is_limit" value="1" name="positionTakingByDigit[{{data.setting_bet_by_digit_id}}]" ng-checked="data.setting_bet_by_digit_is_limit == '1'">
                                </td>
                                <td style="background-color: #efff97;">
                                    <input onkeypress="return isNumber(event)" ng-disabled="modelSettingBetByDigit.selected.setting_bet_by_digit_is_limit == 0" ng-model="modelSettingBetByDigit.selected.setting_bet_by_digit_amount" type="text" value="{{data.setting_bet_by_digit_amount}}" style="width: 80px; text-align: center;">
                                </td>
                                <td style="background-color: #efff97;">
                                    <a href="javascript: void(0)" ng-click="saveSettingBetByDigit($index)">บันทึก</a> | <a href="javascript: void(0)" ng-click="resetSettingBetByDigit()">ยกเลิก</a>
                                </td>
                            </script>

                        </div>
                    </div>
                </td>
        </tr>
    </table>

    </div>
    <?php // End of BackendController in breadcrumb.php ?>

    <script src="<?php echo base_url('commons/js/backend/services/language.service.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/services/backend.service.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/controllers/backendController.js') ?>"></script>

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