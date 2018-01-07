<div class="row-full">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><span class="card-header-content">{{ 'NAVIGATION_MANAGEMENT_ADD_USER' | translate }}</span></div>
            <div class="card-body">
                <table style="width: 100%">
                    <thead style="background-color: #fde8e7;">
                        <tr>
                            <th style="text-align: left; padding-left: 15px !important;">{{ 'USER' | translate}}</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #fff9f8;">
                        <tr>
                            <td>
                                <table style="width: 85%; margin-left: auto; margin-right: auto;">
                                    <tr>
                                        <td>{{ 'LEVEL' | translate }}</td>
                                        <td>
                                            <select ng-model="selected_level" ng-change="onSelectLevel(selected_level)">
                                                                        <option value="">{{ 'PLEASE_SELECT' | translate }}</option>
                                                                        <option value="0" ng-if="account_level == 4">{{ 'SENIOR' | translate }}</option>
                                                                        <option value="1">{{ 'MASTER' | translate }}</option>
                                                                        <option value="2">{{ 'AGENT' | translate }}</option>
                                                                        <option value="3">{{ 'MEMBER' | translate }}</option>
                                                                    </select>
                                        </td>
                                        <td><span ng-hide="under_level == 4">{{ 'IN' | translate }}</span></td>
                                        <td>
                                            <select ng-hide="under_level == 4" ng-disabled="!selected_level" ng-options="item as item.label for item in under_name_list track by item.id" ng-model="selected_under" ng-change="getLastAccountCode()">
                                                                        <option value="">{{ 'PLEASE_SELECT' | translate }}</option>
                                                                    </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ 'USER_CODE' | translate }}</td>
                                        <td>
                                            <span ngif="under_level == 0">{{account_code_prefix}}</span>
                                        </td>
                                        <td>{{ 'PASSWORD' | translate }}</td>
                                        <td>
                                            <input type="password" ng-model="password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ 'NAME' | translate }}</td>
                                        <td>
                                            <input type="text" ng-model="name">
                                        </td>
                                        <td>{{ 'LAST_NAME' | translate }}</td>
                                        <td>
                                            <input type="text" ng-model="lastname">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ 'TELEPHONE' | translate }}</td>
                                        <td>
                                            <input type="text" ng-model="telephone">
                                        </td>
                                        <td>{{ 'MOBILE' | translate }}</td>
                                        <td>
                                            <input type="text" ng-model="mobile">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ 'CREDIT' | translate }}</td>
                                        <td>
                                            <input type="text" ng-model="_credit_transaction_balance" format="number" ng-value="credit_transaction_balance || 0 | number" style="text-align:right" onkeydown="return isNumber()">
                                            <font color="#999999">&lt;=</font> <input type="text" readonly ng-click="_credit_transaction_balance = credit_transaction_balance || 0" format="number" ng-value="credit_transaction_balance || 0 | number" class="textbox-custom" style="background-color:#ffdcdc">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width: 100%">
                    <thead style="background-color: #c5ffc5;">
                        <tr>
                            <th style="text-align: left; padding-left: 15px !important;">{{ 'MIN_MAX_PER_NUMBER_REWARD' | translate}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #e1ffe1;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_3D_TOP' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_3d_top" ng-value="_min_amount_config._value_3d_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_3d_top = min_amount_config.value_3d_top || 0" ng-value="min_amount_config.value_3d_top || 0 | number" class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" id="_max_amount_config._value_3d_top" ng-model="_max_amount_config._value_3d_top" ng-value="max_amount_config.value_3d_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_3d_top = max_amount_config.value_3d_top || 0" ng-value="max_amount_config.value_3d_top || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" id="_top_amount_config._value_3d_top" format="number" ng-model="_top_amount_config._value_3d_top" ng-value="top_amount_config.value_3d_top || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_3d_top = top_amount_config.value_3d_top || 0" ng-value="top_amount_config.value_3d_top || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" id="_reward_amount_config._value_3d_top" ng-model="_reward_amount_config._value_3d_top" ng-value="reward_amount_config.value_3d_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_3d_top = reward_amount_config.value_3d_top || 0" ng-value="reward_amount_config.value_3d_top || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_3D_BOTTOM' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_3d_bottom" ng-value="min_amount_config.value_3d_bottom || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_3d_bottom = min_amount_config.value_3d_bottom || 0" ng-model="min_amount_config.value_3d_bottom" ng-value="min_amount_config.value_3d_bottom || 0 | number" class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_3d_bottom" ng-value="max_amount_config.value_3d_bottom || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_3d_bottom = max_amount_config.value_3d_bottom || 0" ng-value="max_amount_config.value_3d_bottom || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_3d_bottom" ng-value="top_amount_config.value_3d_bottom || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_3d_bottom = top_amount_config.value_3d_bottom || 0" ng-value="top_amount_config.value_3d_bottom || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_3d_bottom" ng-value="reward_amount_config.value_3d_bottom || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_3d_bottom = reward_amount_config.value_3d_bottom || 0" ng-value="reward_amount_config.value_3d_bottom || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_3D_TOP_ROLL' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_3d_top_roll" ng-value="min_amount_config.value_3d_top_roll || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_3d_top_roll = min_amount_config.value_3d_top_roll || 0" ng-model="min_amount_config.value_3d_top_roll" ng-value="min_amount_config.value_3d_top_roll || 0 | number"
                                                    class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_3d_top_roll" ng-value="max_amount_config.value_3d_top_roll || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_3d_top_roll = max_amount_config.value_3d_top_roll || 0" ng-value="max_amount_config.value_3d_top_roll || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_3d_top_roll" ng-value="top_amount_config.value_3d_top_roll || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_3d_top_roll = top_amount_config.value_3d_top_roll || 0" ng-value="top_amount_config.value_3d_top_roll || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_3d_top_roll" ng-value="reward_amount_config.value_3d_top_roll || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_3d_top_roll = reward_amount_config.value_3d_top_roll || 0" ng-value="reward_amount_config.value_3d_top_roll || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_2D_TOP' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_2d_top" ng-value="min_amount_config.value_2d_top || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_2d_top = min_amount_config.value_2d_top || 0" ng-model="min_amount_config.value_2d_top" ng-value="min_amount_config.value_2d_top || 0 | number" class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_2d_top" ng-value="max_amount_config.value_2d_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_2d_top = max_amount_config.value_2d_top || 0" ng-value="max_amount_config.value_2d_top || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_2d_top" ng-value="top_amount_config.value_2d_top || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_2d_top = top_amount_config.value_2d_top || 0" ng-value="top_amount_config.value_2d_top || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_2d_top" ng-value="reward_amount_config.value_2d_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_2d_top = reward_amount_config.value_2d_top || 0" ng-value="reward_amount_config.value_2d_top || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_2D_BOTTOM' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_2d_bottom" ng-value="min_amount_config.value_2d_bottom || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_2d_bottom = min_amount_config.value_2d_bottom || 0" ng-model="min_amount_config.value_2d_bottom" ng-value="min_amount_config.value_2d_bottom || 0 | number" class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_2d_bottom" ng-value="max_amount_config.value_2d_bottom || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_2d_bottom = max_amount_config.value_2d_bottom || 0" ng-value="max_amount_config.value_2d_bottom || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_2d_bottom" ng-value="top_amount_config.value_2d_bottom || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_2d_bottom = top_amount_config.value_2d_bottom || 0" ng-value="top_amount_config.value_2d_bottom || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_2d_bottom" ng-value="reward_amount_config.value_2d_bottom || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_2d_bottom = reward_amount_config.value_2d_bottom || 0" ng-value="reward_amount_config.value_2d_bottom || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_2D_TOP_ROLL' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_2d_top_roll" ng-value="min_amount_config.value_2d_top_roll || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_2d_top_roll = min_amount_config.value_2d_top_roll || 0" ng-model="min_amount_config.value_2d_top_roll" ng-value="min_amount_config.value_2d_top_roll || 0 | number"
                                                    class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_2d_top_roll" ng-value="max_amount_config.value_2d_top_roll || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_2d_top_roll = max_amount_config.value_2d_top_roll || 0" ng-value="max_amount_config.value_2d_top_roll || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_2d_top_roll" ng-value="top_amount_config.value_2d_top_roll || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_2d_top_roll = top_amount_config.value_2d_top_roll || 0" ng-value="top_amount_config.value_2d_top_roll || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_2d_top_roll" ng-value="reward_amount_config.value_2d_top_roll || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_2d_top_roll = reward_amount_config.value_2d_top_roll || 0" ng-value="reward_amount_config.value_2d_top_roll || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_1D_TOP' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_1d_top" ng-value="min_amount_config.value_1d_top || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_1d_top = min_amount_config.value_1d_top || 0" ng-model="min_amount_config.value_1d_top" ng-value="min_amount_config.value_1d_top || 0 | number" class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_1d_top" ng-value="max_amount_config.value_1d_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_1d_top = max_amount_config.value_1d_top || 0" ng-value="max_amount_config.value_1d_top || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_1d_top" ng-value="top_amount_config.value_1d_top || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_1d_top = top_amount_config.value_1d_top || 0" ng-value="top_amount_config.value_1d_top || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_1d_top" ng-value="reward_amount_config.value_1d_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_1d_top = reward_amount_config.value_1d_top || 0" ng-value="reward_amount_config.value_1d_top || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_1D_BOTTOM' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_1d_bottom" ng-value="min_amount_config.value_1d_bottom || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_1d_bottom = min_amount_config.value_1d_bottom || 0" ng-model="min_amount_config.value_1d_bottom" ng-value="min_amount_config.value_1d_bottom || 0 | number" class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_1d_bottom" ng-value="max_amount_config.value_1d_bottom || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_1d_bottom = max_amount_config.value_1d_bottom || 0" ng-value="max_amount_config.value_1d_bottom || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_1d_bottom" ng-value="top_amount_config.value_1d_bottom || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_1d_bottom = top_amount_config.value_1d_bottom || 0" ng-value="top_amount_config.value_1d_bottom || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_1d_bottom" ng-value="reward_amount_config.value_1d_bottom || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_1d_bottom = reward_amount_config.value_1d_bottom || 0" ng-value="reward_amount_config.value_1d_bottom || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_19_ROLL_TOP' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_19_roll_top" ng-value="min_amount_config.value_19_roll_top || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_19_roll_top = min_amount_config.value_19_roll_top || 0" ng-model="min_amount_config.value_19_roll_top" ng-value="min_amount_config.value_19_roll_top || 0 | number"
                                                    class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_19_roll_top" ng-value="max_amount_config.value_19_roll_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_19_roll_top = max_amount_config.value_19_roll_top || 0" ng-value="max_amount_config.value_19_roll_top || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_19_roll_top" ng-value="top_amount_config.value_19_roll_top || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_19_roll_top = top_amount_config.value_19_roll_top || 0" ng-value="top_amount_config.value_19_roll_top || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_19_roll_top" ng-value="reward_amount_config.value_19_roll_top || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_19_roll_top = reward_amount_config.value_19_roll_top || 0" ng-value="reward_amount_config.value_19_roll_top || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_19_ROLL_BOTTOM' | translate }}</td>

                                            <td width="131" align="center">{{ 'MIN' | translate }}
                                                <input type="text" format="number" size="6" ng-model="_min_amount_config._value_19_roll_bottom" ng-value="min_amount_config.value_19_roll_bottom || 0" style="text-align:right" onkeydown="return isNumber()"></td>
                                            <td width="105">&gt;=
                                                <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_19_roll_bottom = min_amount_config.value_19_roll_bottom || 0" ng-model="min_amount_config.value_19_roll_bottom" ng-value="min_amount_config.value_19_roll_bottom || 0 | number"
                                                    class="textbox-custom">

                                                <td width="159" align="center">{{ 'MAX' | translate }}
                                                    <input type="text" format="number" size="12" ng-model="_max_amount_config._value_19_roll_bottom" ng-value="max_amount_config.value_19_roll_bottom || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                <td>&lt;=
                                                    <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_19_roll_bottom = max_amount_config.value_19_roll_bottom || 0" ng-value="max_amount_config.value_19_roll_bottom || 0 | number" class="textbox-custom">

                                                    <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                        <input type="text" size="12" style="text-align:right" onkeydown="return isNumber()" format="number" ng-model="_top_amount_config._value_19_roll_bottom" ng-value="top_amount_config.value_19_roll_bottom || 0 | number"></td>
                                                    <td width="145" align="left">&lt;=
                                                        <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_19_roll_bottom = top_amount_config.value_19_roll_bottom || 0" ng-value="top_amount_config.value_19_roll_bottom || 0 | number" class="textbox-custom">

                                                        <td width="108" align="center">{{ 'REWARD' | translate }}
                                                            <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_19_roll_bottom" ng-value="reward_amount_config.value_19_roll_bottom || 0 | number" style="text-align:right" onkeydown="return isNumber()"></td>
                                                        <td width="125" align="left">&lt;=
                                                            <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_19_roll_bottom = reward_amount_config.value_19_roll_bottom || 0" ng-value="reward_amount_config.value_19_roll_bottom || 0 | number" class="textbox-custom"></td>
                                                    </td>
                                                </td>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width: 100%">
                    <thead style="background-color: #c5ffc5;">
                        <tr>
                            <th style="text-align: left; padding-left: 15px !important;">{{ 'PT_COMMISSION' | translate}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #e1ffe1;">
                                <table width="100%" border="0" cellpadding="0" cellspacing="1" id="Table3">
                                    <tbody style="background-color: #e1ffe1;">
                                        <tr>
                                            <td width="15%" rowspan="2" align="center"><span id="lblDeadball">3 ตัว</span></td>
                                            <td width="12%" height="20"></td>
                                            <td width="12%" height="20" style="font-weight:bold">3 ตัวบน</td>
                                            <td width="12%" height="20" style="font-weight:bold">3 ตัวล่าง</td>
                                            <td width="12%" height="20" style="font-weight:bold">3 ตัวโต๊ด</td>
                                            <td width="37%" height="20" colspan="2"></td>
                                        </tr>

                                        <tr height="20">
                                            <td height="20">&nbsp;</td>
                                            <td height="20">
                                                <select style="width: 50px" ng-disabled="percentCommission_3d_top.length == 0 || percentCommission_3d_top == null" ng-options="item as item.label for item in percentCommission_3d_top | orderBy:'label': true" ng-model="selected_percentCommission_3d_top"></select>
                                            </td>
                                            <td height="20">
                                                <select style="width: 50px" ng-disabled="percentCommission_3d_bottom.length == 0 || percentCommission_3d_bottom == null" ng-options="item as item.label for item in percentCommission_3d_bottom | orderBy:'label': true" ng-model="selected_percentCommission_3d_bottom"></select></td>
                                            <td height="20">
                                                <select style="width: 50px" ng-disabled="percentCommission_3d_top_roll.length == 0 || percentCommission_3d_top_roll == null" ng-options="item as item.label for item in percentCommission_3d_top_roll | orderBy:'label': true" ng-model="selected_percentCommission_3d_top_roll"></select></td>
                                            <td height="20" colspan="2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="center"><span id="lblLive">2 ตัว</span></td>
                                            <td height="20"></td>
                                            <td height="20" style="font-weight:bold">2 ตัวบน</td>
                                            <td height="20" style="font-weight:bold">2 ตัวล่าง</td>
                                            <td height="20" style="font-weight:bold">2 ตัวโต๊ด</td>
                                            <td height="20" colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td height="20">&nbsp;</td>
                                            <td height="20">
                                                <select ng-disabled="percentCommission_2d_top.length == 0 || percentCommission_2d_top == null" ng-options="item as item.label for item in percentCommission_2d_top | orderBy:'label': true" ng-model="selected_percentCommission_2d_top" style="width: 50px"></select></td>
                                            <td height="20">
                                                <select ng-disabled="percentCommission_2d_bottom.length == 0 || percentCommission_2d_bottom == null" ng-options="item as item.label for item in percentCommission_2d_bottom | orderBy:'label': true" ng-model="selected_percentCommission_2d_bottom" style="width: 50px"></select></td>
                                            <td height="20">
                                                <select ng-disabled="percentCommission_2d_top_roll.length == 0 || percentCommission_2d_top_roll == null" ng-options="item as item.label for item in percentCommission_2d_top_roll | orderBy:'label': true" ng-model="selected_percentCommission_2d_top_roll"
                                                    style="width: 50px"></select></td>
                                            <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="15%" rowspan="2" align="center"><span id="lblDeadball">1 ตัว</span></td>
                                            <td width="12%" height="20"></td>
                                            <td width="12%" height="20" style="font-weight:bold">1 ตัวบน</td>
                                            <td width="12%" height="20" style="font-weight:bold">1 ตัวล่าง</td>
                                            <td width="12%" height="20" style="font-weight:bold"></td>
                                            <td width="12%" height="20" style="font-weight:bold"></td>
                                            <td width="25%" height="20" style="font-weight:bold"></td>
                                        </tr>

                                        <tr height="20">
                                            <td height="20">&nbsp;</td>
                                            <td height="20">
                                                <select ng-disabled="percentCommission_1d_top.length == 0 || percentCommission_1d_top == null" ng-options="item as item.label for item in percentCommission_1d_top | orderBy:'label': true" ng-model="selected_percentCommission_1d_top" style="width: 50px"></select></td>
                                            <td height="20">
                                                <select ng-disabled="percentCommission_1d_bottom.length == 0 || percentCommission_1d_bottom == null" ng-options="item as item.label for item in percentCommission_1d_bottom | orderBy:'label': true" ng-model="selected_percentCommission_1d_bottom" style="width: 50px"></select></td>
                                            <td height="20"></td>
                                            <td height="20"></td>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="center"><span id="lblLive">19 กลับ</span></td>
                                            <td height="20"></td>
                                            <td height="20" style="font-weight:bold">19 กลับบน</td>
                                            <td height="20" style="font-weight:bold">19 กลับล่าง</td>
                                            <td height="20" style="font-weight:bold">&nbsp;</td>
                                            <td height="20" colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td height="20">&nbsp;</td>
                                            <td height="20">
                                                <select ng-disabled="percentCommission_19_roll_top.length == 0 || percentCommission_19_roll_top == null" ng-options="item as item.label for item in percentCommission_19_roll_top | orderBy:'label': true" ng-model="selected_percentCommission_19_roll_top"
                                                    style="width: 50px"></select></td>
                                            <td height="20">
                                                <select ng-disabled="percentCommission_19_roll_bottom.length == 0 || percentCommission_19_roll_bottom == null" ng-options="item as item.label for item in percentCommission_19_roll_bottom | orderBy:'label': true" ng-model="selected_percentCommission_19_roll_bottom"
                                                    style="width: 50px"></select></td>
                                            <td height="20">&nbsp;</td>
                                            <td height="20" colspan="2">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width: 100%" ng-if="selected_level == 0">
                    <thead style="background-color: #c5ffc5;">
                        <tr>
                            <th style="text-align: left; padding-left: 15px !important;">{{ 'PT_SHARE' | translate }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #e1ffe1;">
                                <form name="form" id="form">
                                    <input type="hidden" name="act" id="act">
                                    <span id="show_response"></span>
                                    <table>
                                        <tbody>
                                            <tr bgcolor="#D2F5D5">
                                                <td width="15%" id="TD_3T" rowspan="3" align="center"><span id="lblDeadball">3 ตัว</span></td>
                                                <td width="12%" height="20"></td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวบน</td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวล่าง</td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวโต๊ด</td>
                                                <td width="37%" height="20" colspan="2"></td>
                                            </tr>

                                            <tr height="20" bgcolor="#D2F5D5" id="show3t" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetPosition"><span id="targetlv3">ซีเนียร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl1" id="ddl1" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl3" id="ddl3" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl5" id="ddl5" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20" colspan="2"></td>
                                            </tr>

                                            <tr height="10" bgcolor="#D2F5D5">
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv3">เว็บไซต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl2" id="ddl2" style="WIDTH: 50px" onchange="changePt('ddl2','ddl1')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl4" id="ddl4" style="WIDTH: 50px" onchange="changePt('ddl4','ddl3')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl6" id="ddl6" style="WIDTH: 50px" onchange="changePt('ddl6','ddl5')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;%</td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="setDisableShare3num(this);">&nbsp;คัดลอก 3 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" id="takeshow3t" bgcolor="#DADADA" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH1" id="takeSH1" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH2" id="takeSH2" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH3" id="takeSH3" value="1">
                                                </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="CheckAllTakeShare(this,3);">&nbsp;ถือสู้ส่วนที่เหลือ 3 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td id="TD_2T" rowspan="3" align="center"><span id="lblLive">2 ตัว</span></td>
                                                <td height="20"></td>
                                                <td height="20" style="font-weight:bold">2 ตัวบน</td>
                                                <td height="20" style="font-weight:bold">2 ตัวล่าง</td>
                                                <td height="20" style="font-weight:bold">2 ตัวโต๊ด</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr id="show2t" bgcolor="#E8F9EA" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetLivePosition"><span id="targetlv2">ซีเนียร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl7" id="ddl7" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl9" id="ddl9" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl11" id="ddl11" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td height="20"><span id="lblSuperPresetLivePosition"><span id="upperlv2">เว็บไซต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl8" id="ddl8" style="WIDTH: 50px" onchange="changePt('ddl8','ddl7')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl10" id="ddl10" style="WIDTH: 50px" onchange="changePt('ddl10','ddl9')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;% </td>
                                                <td height="20">
                                                    <select name="ddl12" id="ddl12" style="WIDTH: 50px" onchange="changePt('ddl12','ddl11')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;% </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O2" id="ch_share_O2" value="1" onClick="setDisableShare2num(this);">&nbsp;คัดลอก 2 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow2t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH4" id="takeSH4" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH5" id="takeSH5" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH6" id="takeSH6" value="1">
                                                </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="CheckAllTakeShare(this,2);">&nbsp;ถือสู้ส่วนที่เหลือ 2 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#D2F5D5">
                                                <td width="15%" id="TD_1T" rowspan="3" align="center"><span id="lblDeadball">1 ตัว</span></td>
                                                <td width="12%" height="20"></td>
                                                <td width="12%" height="20" style="font-weight:bold">1 ตัวบน</td>
                                                <td width="12%" height="20" style="font-weight:bold">1 ตัวล่าง</td>
                                                <td width="12%" height="20" style="font-weight:bold"></td>
                                                <td width="12%" height="20" style="font-weight:bold"></td>
                                                <td width="25%" height="20" style="font-weight:bold"></td>
                                            </tr>

                                            <tr height="20" bgcolor="#D2F5D5" id="show1t" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetPosition"><span id="targetlv1">ซีเนียร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl13" id="ddl13" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl15" id="ddl15" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                            </tr>

                                            <tr height="10" bgcolor="#D2F5D5">
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv1">เว็บไซต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl14" id="ddl14" style="WIDTH: 50px" onchange="changePt('ddl14','ddl13')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl16" id="ddl16" style="WIDTH: 50px" onchange="changePt('ddl16','ddl15')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                </td>
                                                <td height="20">
                                                </td>
                                                <td height="20">

                                                    <!-- <input type="checkbox" name="ch_share_O1" id="ch_share_O1" value="1" onClick="setDisableShare1num(this);">&nbsp;คัดลอก 1 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow1t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH7" id="takeSH7" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH8" id="takeSH8" value="1">
                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O1" id="ch_share_O1" value="1" onClick="CheckAllTakeShare(this,1);">&nbsp;ถือสู้ส่วนที่เหลือ 1 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td id="TD_19T" rowspan="3" align="center"><span id="lblLive">19 กลับ</span></td>
                                                <td height="20"></td>
                                                <td height="20" style="font-weight:bold">19 กลับบน</td>
                                                <td height="20" style="font-weight:bold">19 กลับล่าง</td>
                                                <td height="20" style="font-weight:bold">&nbsp;</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr id="show19t" bgcolor="#E8F9EA" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetLivePosition"><span id="targetlv19">ซีเนียร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl23" id="ddl23" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl25" id="ddl25" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td height="20"><span id="lblSuperPresetLivePosition"><span id="upperlv19">เว็บไซต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl24" id="ddl24" style="WIDTH: 50px" onchange="changePt('ddl24','ddl23')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl26" id="ddl26" style="WIDTH: 50px" onchange="changePt('ddl26','ddl25')">
                                            <option value="100">100</option>
                                            <option value="95">95</option>
                                            <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option>
                                            </select>&nbsp;% </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow19t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH12" id="takeSH12" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH13" id="takeSH13" value="1">
                                                </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <input name="Hidden2" type="hidden" id="Hidden2" value="100">&nbsp;
                                    <input name="Hidden4" type="hidden" id="Hidden4" value="100">&nbsp;
                                    <input name="Hidden6" type="hidden" id="Hidden6" value="100">&nbsp;
                                    <input name="Hidden8" type="hidden" id="Hidden8" value="100">&nbsp;
                                    <input name="Hidden10" type="hidden" id="Hidden10" value="100">&nbsp;
                                    <input name="Hidden12" type="hidden" id="Hidden12" value="100">&nbsp;
                                    <input name="Hidden14" type="hidden" id="Hidden14" value="100">&nbsp;
                                    <input name="Hidden16" type="hidden" id="Hidden16" value="100">&nbsp;
                                    <input name="Hidden18" type="hidden" id="Hidden18" value="100">&nbsp;
                                    <input name="Hidden20" type="hidden" id="Hidden20" value="100">&nbsp;
                                    <input name="Hidden22" type="hidden" id="Hidden22" value="100">&nbsp;
                                    <input name="Hidden24" type="hidden" id="Hidden24" value="100">&nbsp;
                                    <input name="Hidden26" type="hidden" id="Hidden26" value="100">&nbsp;
                                    <input name="Hidden28" type="hidden" id="Hidden28">&nbsp;
                                    <input name="Hidden30" type="hidden" id="Hidden30">&nbsp;
                                    <input name="Hidden32" type="hidden" id="Hidden32">&nbsp;
                                    <input name="Hidden40" type="hidden" id="Hidden40">&nbsp;
                                    <input name="inlv" type="hidden" id="inlv" value="4">
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
                </td>
                </tr>
                </tbody>
                </table>

                <table style="width: 100%" ng-if="selected_level == 1">
                    <thead style="background-color: #c5ffc5;">
                        <tr>
                            <th style="text-align: left; padding-left: 15px !important;">{{ 'PT_SHARE' | translate }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #e1ffe1;">
                                <form name="form" id="form">
                                    <input type="hidden" name="act" id="act">
                                    <span id="show_response"></span>
                                    <table>
                                        <tbody>
                                            <tr bgcolor="#D2F5D5">
                                                <td width="15%" id="TD_3T" rowspan="3" align="center"><span id="lblDeadball">3 ตัว</span></td>
                                                <td width="12%" height="20"></td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวบน</td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวล่าง</td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวโต๊ด</td>
                                                <td width="37%" height="20" colspan="2"></td>
                                            </tr>

                                            <tr height="20" bgcolor="#D2F5D5" id="show3t" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetPosition"><span id="targetlv3">มาสเตอร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl1" id="ddl1" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl3" id="ddl3" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl5" id="ddl5" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20" colspan="2"></td>
                                            </tr>

                                            <tr height="10" bgcolor="#D2F5D5">
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv3">ซีเนียร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <!-- {{pt_shared_3d_top_when_select_master}} -->
                                                    <select name="ddl2" id="ddl2" style="WIDTH: 50px" onchange="changePt('ddl2','ddl1')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_3d_top_when_select_master)">{{n}}</option>

                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl4" id="ddl4" style="WIDTH: 50px" onchange="changePt('ddl4','ddl3')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_3d_bottom_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl6" id="ddl6" style="WIDTH: 50px" onchange="changePt('ddl6','ddl5')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_3d_top_roll_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="setDisableShare3num(this);">&nbsp;คัดลอก 3 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" id="takeshow3t" bgcolor="#DADADA" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH1" id="takeSH1" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH2" id="takeSH2" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH3" id="takeSH3" value="1">
                                                </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="CheckAllTakeShare(this,3);">&nbsp;ถือสู้ส่วนที่เหลือ 3 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td id="TD_2T" rowspan="3" align="center"><span id="lblLive">2 ตัว</span></td>
                                                <td height="20"></td>
                                                <td height="20" style="font-weight:bold">2 ตัวบน</td>
                                                <td height="20" style="font-weight:bold">2 ตัวล่าง</td>
                                                <td height="20" style="font-weight:bold">2 ตัวโต๊ด</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr id="show2t" bgcolor="#E8F9EA" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetLivePosition"><span id="targetlv2">มาสเตอร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl7" id="ddl7" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl9" id="ddl9" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl11" id="ddl11" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td height="20"><span id="lblSuperPresetLivePosition"><span id="upperlv2">ซีเนียร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl8" id="ddl8" style="WIDTH: 50px" onchange="changePt('ddl8','ddl7')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_top_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl10" id="ddl10" style="WIDTH: 50px" onchange="changePt('ddl10','ddl9')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_bottom_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20">
                                                    <select name="ddl12" id="ddl12" style="WIDTH: 50px" onchange="changePt('ddl12','ddl11')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_top_roll_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O2" id="ch_share_O2" value="1" onClick="setDisableShare2num(this);">&nbsp;คัดลอก 2 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow2t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH4" id="takeSH4" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH5" id="takeSH5" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH6" id="takeSH6" value="1">
                                                </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="CheckAllTakeShare(this,2);">&nbsp;ถือสู้ส่วนที่เหลือ 2 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#D2F5D5">
                                                <td width="15%" id="TD_1T" rowspan="3" align="center"><span id="lblDeadball">1 ตัว</span></td>
                                                <td width="12%" height="20"></td>
                                                <td width="12%" height="20" style="font-weight:bold">1 ตัวบน</td>
                                                <td width="12%" height="20" style="font-weight:bold">1 ตัวล่าง</td>
                                                <td width="12%" height="20" style="font-weight:bold"></td>
                                                <td width="12%" height="20" style="font-weight:bold"></td>
                                                <td width="25%" height="20" style="font-weight:bold"></td>
                                            </tr>

                                            <tr height="20" bgcolor="#D2F5D5" id="show1t" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetPosition"><span id="targetlv1">มาสเตอร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl13" id="ddl13" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl15" id="ddl15" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                            </tr>

                                            <tr height="10" bgcolor="#D2F5D5">
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv1">ซีเนียร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl14" id="ddl14" style="WIDTH: 50px" onchange="changePt('ddl14','ddl13')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_1d_top_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl16" id="ddl16" style="WIDTH: 50px" onchange="changePt('ddl16','ddl15')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_1d_bottom_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                </td>
                                                <td height="20">
                                                </td>
                                                <td height="20">

                                                    <!-- <input type="checkbox" name="ch_share_O1" id="ch_share_O1" value="1" onClick="setDisableShare1num(this);">&nbsp;คัดลอก 1 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow1t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH7" id="takeSH7" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH8" id="takeSH8" value="1">
                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O1" id="ch_share_O1" value="1" onClick="CheckAllTakeShare(this,1);">&nbsp;ถือสู้ส่วนที่เหลือ 1 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td id="TD_19T" rowspan="3" align="center"><span id="lblLive">19 กลับ</span></td>
                                                <td height="20"></td>
                                                <td height="20" style="font-weight:bold">19 กลับบน</td>
                                                <td height="20" style="font-weight:bold">19 กลับล่าง</td>
                                                <td height="20" style="font-weight:bold">&nbsp;</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr id="show19t" bgcolor="#E8F9EA" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetLivePosition"><span id="targetlv19">มาสเตอร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl23" id="ddl23" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl25" id="ddl25" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td height="20"><span id="lblSuperPresetLivePosition"><span id="upperlv19">ซีเนียร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl24" id="ddl24" style="WIDTH: 50px" onchange="changePt('ddl24','ddl23')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_19_roll_top_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl26" id="ddl26" style="WIDTH: 50px" onchange="changePt('ddl26','ddl25')">
                                            <option ng-repeat="n in rangePTshared(0, pt_shared_19_roll_bottom_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow19t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH12" id="takeSH12" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH13" id="takeSH13" value="1">
                                                </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <input name="Hidden2" type="hidden" id="Hidden2" value="{{pt_shared_3d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden4" type="hidden" id="Hidden4" value="{{pt_shared_3d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden6" type="hidden" id="Hidden6" value="{{pt_shared_3d_top_roll_when_select_master}}">&nbsp;
                                    <input name="Hidden8" type="hidden" id="Hidden8" value="{{pt_shared_2d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden10" type="hidden" id="Hidden10" value="{{pt_shared_2d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden12" type="hidden" id="Hidden12" value="{{pt_shared_2d_top_roll_when_select_master}}">&nbsp;
                                    <input name="Hidden14" type="hidden" id="Hidden14" value="{{pt_shared_1d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden16" type="hidden" id="Hidden16" value="{{pt_shared_1d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden18" type="hidden" id="Hidden18" value="90">&nbsp;
                                    <input name="Hidden20" type="hidden" id="Hidden20" value="90">&nbsp;
                                    <input name="Hidden22" type="hidden" id="Hidden22" value="90">&nbsp;
                                    <input name="Hidden24" type="hidden" id="Hidden24" value="{{pt_shared_19_roll_top_when_select_master}}">&nbsp;
                                    <input name="Hidden26" type="hidden" id="Hidden26" value="{{pt_shared_19_roll_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden28" type="hidden" id="Hidden28">&nbsp;
                                    <input name="Hidden30" type="hidden" id="Hidden30">&nbsp;
                                    <input name="Hidden32" type="hidden" id="Hidden32">&nbsp;
                                    <input name="Hidden40" type="hidden" id="Hidden40">&nbsp;
                                    <input name="inlv" type="hidden" id="inlv" value="4">
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
                </td>
                </tr>
                </tbody>
                </table>

                <table style="width: 100%" ng-if="selected_level == 2">
                    <thead style="background-color: #c5ffc5;">
                        <tr>
                            <th style="text-align: left; padding-left: 15px !important;">{{ 'PT_SHARE' | translate }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #e1ffe1;">
                                <form name="form" id="form">
                                    <input type="hidden" name="act" id="act">
                                    <span id="show_response"></span>
                                    <table>
                                        <tbody>
                                            <tr bgcolor="#D2F5D5">
                                                <td width="15%" id="TD_3T" rowspan="3" align="center"><span id="lblDeadball">3 ตัว</span></td>
                                                <td width="12%" height="20"></td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวบน</td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวล่าง</td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวโต๊ด</td>
                                                <td width="37%" height="20" colspan="2"></td>
                                            </tr>

                                            <tr height="20" bgcolor="#D2F5D5" id="show3t" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetPosition"><span id="targetlv3">เอเย่นต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl1" id="ddl1" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl3" id="ddl3" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl5" id="ddl5" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20" colspan="2"></td>
                                            </tr>

                                            <tr height="10" bgcolor="#D2F5D5">
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv3">มาสเตอร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl2" id="ddl2" style="WIDTH: 50px" onchange="changePt('ddl2','ddl1')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_3d_top_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl4" id="ddl4" style="WIDTH: 50px" onchange="changePt('ddl4','ddl3')">
                                                        <option ng-repeat="n in rangePTshared(0, pt_shared_3d_bottom_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl6" id="ddl6" style="WIDTH: 50px" onchange="changePt('ddl6','ddl5')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_3d_top_roll_when_select_master)">{{n}}</option>
                                                        <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="setDisableShare3num(this);">&nbsp;คัดลอก 3 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" id="takeshow3t" bgcolor="#DADADA" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH1" id="takeSH1" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH2" id="takeSH2" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH3" id="takeSH3" value="1">
                                                </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="CheckAllTakeShare(this,3);">&nbsp;ถือสู้ส่วนที่เหลือ 3 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td id="TD_2T" rowspan="3" align="center"><span id="lblLive">2 ตัว</span></td>
                                                <td height="20"></td>
                                                <td height="20" style="font-weight:bold">2 ตัวบน</td>
                                                <td height="20" style="font-weight:bold">2 ตัวล่าง</td>
                                                <td height="20" style="font-weight:bold">2 ตัวโต๊ด</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr id="show2t" bgcolor="#E8F9EA" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetLivePosition"><span id="targetlv2">เอเย่นต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl7" id="ddl7" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl9" id="ddl9" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl11" id="ddl11" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td height="20"><span id="lblSuperPresetLivePosition"><span id="upperlv2">มาสเตอร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl8" id="ddl8" style="WIDTH: 50px" onchange="changePt('ddl8','ddl7')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_top_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl10" id="ddl10" style="WIDTH: 50px" onchange="changePt('ddl10','ddl9')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_bottom_when_select_master)">{{n}}</option>
                                            <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20">
                                                    <select name="ddl12" id="ddl12" style="WIDTH: 50px" onchange="changePt('ddl12','ddl11')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_top_roll_when_select_master)">{{n}}</option>
                                                        <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O2" id="ch_share_O2" value="1" onClick="setDisableShare2num(this);">&nbsp;คัดลอก 2 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow2t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH4" id="takeSH4" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH5" id="takeSH5" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH6" id="takeSH6" value="1">
                                                </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="CheckAllTakeShare(this,2);">&nbsp;ถือสู้ส่วนที่เหลือ 2 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#D2F5D5">
                                                <td width="15%" id="TD_1T" rowspan="3" align="center"><span id="lblDeadball">1 ตัว</span></td>
                                                <td width="12%" height="20"></td>
                                                <td width="12%" height="20" style="font-weight:bold">1 ตัวบน</td>
                                                <td width="12%" height="20" style="font-weight:bold">1 ตัวล่าง</td>
                                                <td width="12%" height="20" style="font-weight:bold"></td>
                                                <td width="12%" height="20" style="font-weight:bold"></td>
                                                <td width="25%" height="20" style="font-weight:bold"></td>
                                            </tr>

                                            <tr height="20" bgcolor="#D2F5D5" id="show1t" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetPosition"><span id="targetlv1">เอเย่นต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl13" id="ddl13" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl15" id="ddl15" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                            </tr>

                                            <tr height="10" bgcolor="#D2F5D5">
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv1">มาสเตอร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl14" id="ddl14" style="WIDTH: 50px" onchange="changePt('ddl14','ddl13')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_1d_top_when_select_master)">{{n}}</option>
                                                        <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl16" id="ddl16" style="WIDTH: 50px" onchange="changePt('ddl16','ddl15')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_1d_bottom_when_select_master)">{{n}}</option>
                                                        <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                </td>
                                                <td height="20">
                                                </td>
                                                <td height="20">

                                                    <!-- <input type="checkbox" name="ch_share_O1" id="ch_share_O1" value="1" onClick="setDisableShare1num(this);">&nbsp;คัดลอก 1 ตัวบน-->
                                                </td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow1t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH7" id="takeSH7" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH8" id="takeSH8" value="1">
                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O1" id="ch_share_O1" value="1" onClick="CheckAllTakeShare(this,1);">&nbsp;ถือสู้ส่วนที่เหลือ 1 ตัว-->
                                                </td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td id="TD_19T" rowspan="3" align="center"><span id="lblLive">19 กลับ</span></td>
                                                <td height="20"></td>
                                                <td height="20" style="font-weight:bold">19 กลับบน</td>
                                                <td height="20" style="font-weight:bold">19 กลับล่าง</td>
                                                <td height="20" style="font-weight:bold">&nbsp;</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr id="show19t" bgcolor="#E8F9EA" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetLivePosition"><span id="targetlv19">เอเย่นต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl23" id="ddl23" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl25" id="ddl25" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select>
                                                </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td height="20"><span id="lblSuperPresetLivePosition"><span id="upperlv19">มาสเตอร์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl24" id="ddl24" style="WIDTH: 50px" onchange="changePt('ddl24','ddl23')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_19_roll_top_when_select_master)">{{n}}</option>
                                                        <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl26" id="ddl26" style="WIDTH: 50px" onchange="changePt('ddl26','ddl25')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_19_roll_bottom_when_select_master)">{{n}}</option>
                                                        <!-- <option value="90">90</option>
                                            <option value="85">85</option>
                                            <option value="80">80</option>
                                            <option value="75">75</option>
                                            <option value="70">70</option>
                                            <option value="65">65</option>
                                            <option value="60">60</option>
                                            <option value="55">55</option>
                                            <option value="50">50</option>
                                            <option value="45">45</option>
                                            <option value="40">40</option>
                                            <option value="35">35</option>
                                            <option value="30">30</option>
                                            <option value="25">25</option>
                                            <option value="20">20</option>
                                            <option value="15">15</option>
                                            <option value="10">10</option>
                                            <option value="5">5</option>
                                            <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2">&nbsp;</td>
                                            </tr>
                                            <tr height="10" bgcolor="#DADADA" id="takeshow19t" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH12" id="takeSH12" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH13" id="takeSH13" value="1">
                                                </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <input name="Hidden2" type="hidden" id="Hidden2" value="{{pt_shared_3d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden4" type="hidden" id="Hidden4" value="{{pt_shared_3d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden6" type="hidden" id="Hidden6" value="{{pt_shared_3d_top_roll_when_select_master}}">&nbsp;
                                    <input name="Hidden8" type="hidden" id="Hidden8" value="{{pt_shared_2d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden10" type="hidden" id="Hidden10" value="{{pt_shared_2d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden12" type="hidden" id="Hidden12" value="{{pt_shared_2d_top_roll_when_select_master}}">&nbsp;
                                    <input name="Hidden14" type="hidden" id="Hidden14" value="{{pt_shared_1d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden16" type="hidden" id="Hidden16" value="{{pt_shared_1d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden18" type="hidden" id="Hidden18" value="90">&nbsp;
                                    <input name="Hidden20" type="hidden" id="Hidden20" value="90">&nbsp;
                                    <input name="Hidden22" type="hidden" id="Hidden22" value="90">&nbsp;
                                    <input name="Hidden24" type="hidden" id="Hidden24" value="{{pt_shared_19_roll_top_when_select_master}}">&nbsp;
                                    <input name="Hidden26" type="hidden" id="Hidden26" value="{{pt_shared_19_roll_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden28" type="hidden" id="Hidden28">&nbsp;
                                    <input name="Hidden30" type="hidden" id="Hidden30">&nbsp;
                                    <input name="Hidden32" type="hidden" id="Hidden32">&nbsp;
                                    <input name="Hidden40" type="hidden" id="Hidden40">&nbsp;
                                    <input name="inlv" type="hidden" id="inlv" value="4">
                                    <!-- <input name="Hidden2" type="hidden" id="Hidden2" value="90">&nbsp;
                                                <input name="Hidden4" type="hidden" id="Hidden4" value="90">&nbsp;
                                                <input name="Hidden6" type="hidden" id="Hidden6" value="90">&nbsp;
                                                <input name="Hidden8" type="hidden" id="Hidden8" value="90">&nbsp;
                                                <input name="Hidden10" type="hidden" id="Hidden10" value="90">&nbsp;
                                                <input name="Hidden12" type="hidden" id="Hidden12" value="90">&nbsp;
                                                <input name="Hidden14" type="hidden" id="Hidden14" value="90">&nbsp;
                                                <input name="Hidden16" type="hidden" id="Hidden16" value="90">&nbsp;
                                                <input name="Hidden18" type="hidden" id="Hidden18" value="90">&nbsp;
                                                <input name="Hidden20" type="hidden" id="Hidden20" value="90">&nbsp;
                                                <input name="Hidden22" type="hidden" id="Hidden22" value="90">&nbsp;
                                                <input name="Hidden24" type="hidden" id="Hidden24" value="90">&nbsp;
                                                <input name="Hidden26" type="hidden" id="Hidden26" value="90">&nbsp;
                                                <input name="Hidden28" type="hidden" id="Hidden28">&nbsp;
                                                <input name="Hidden30" type="hidden" id="Hidden30">&nbsp;
                                                <input name="Hidden32" type="hidden" id="Hidden32">&nbsp;
                                                <input name="Hidden40" type="hidden" id="Hidden40">&nbsp;
                                                <input name="inlv" type="hidden" id="inlv" value="4"> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
                </td>
                </tr>
                </tbody>
                </table>

                <table style="width: 100%" ng-if="selected_level == 3">
                    <thead style="background-color: #c5ffc5;">
                        <tr>
                            <th style="text-align: left; padding-left: 15px !important;">{{ 'PT_SHARE' | translate }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #e1ffe1;">
                                <form name="form" id="form">
                                    <input type="hidden" name="act" id="act">
                                    <span id="show_response"></span>
                                    <table>
                                        <tbody>
                                            <tr bgcolor="#D2F5D5">
                                                <td width="15%" id="TD_3T" rowspan="3" align="center"><span id="lblDeadball">3 ตัว</span></td>
                                                <td width="12%" height="20"></td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวบน</td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวล่าง</td>
                                                <td width="12%" height="20" style="font-weight:bold">3 ตัวโต๊ด</td>
                                                <td width="37%" height="20" colspan="2"></td>
                                            </tr>

                                            <tr height="20" bgcolor="#D2F5D5" id="show3t" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetPosition"><span id="targetlv3"></span></span>
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl1" id="ddl1" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl3" id="ddl3" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl5" id="ddl5" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20" colspan="2"></td>
                                            </tr>

                                            <tr height="10" bgcolor="#D2F5D5">
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv3">เอเย่นต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl2" id="ddl2" style="WIDTH: 50px" onchange="changePt('ddl2','ddl1')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_3d_top_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                            <option value="85">85</option>
                                                            <option value="80">80</option>
                                                            <option value="75">75</option>
                                                            <option value="70">70</option>
                                                            <option value="65">65</option>
                                                            <option value="60">60</option>
                                                            <option value="55">55</option>
                                                            <option value="50">50</option>
                                                            <option value="45">45</option>
                                                            <option value="40">40</option>
                                                            <option value="35">35</option>
                                                            <option value="30">30</option>
                                                            <option value="25">25</option>
                                                            <option value="20">20</option>
                                                            <option value="15">15</option>
                                                            <option value="10">10</option>
                                                            <option value="5">5</option>
                                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl4" id="ddl4" style="WIDTH: 50px" onchange="changePt('ddl4','ddl3')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_3d_bottom_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                            <option value="85">85</option>
                                                            <option value="80">80</option>
                                                            <option value="75">75</option>
                                                            <option value="70">70</option>
                                                            <option value="65">65</option>
                                                            <option value="60">60</option>
                                                            <option value="55">55</option>
                                                            <option value="50">50</option>
                                                            <option value="45">45</option>
                                                            <option value="40">40</option>
                                                            <option value="35">35</option>
                                                            <option value="30">30</option>
                                                            <option value="25">25</option>
                                                            <option value="20">20</option>
                                                            <option value="15">15</option>
                                                            <option value="10">10</option>
                                                            <option value="5">5</option>
                                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl6" id="ddl6" style="WIDTH: 50px" onchange="changePt('ddl6','ddl5')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_3d_top_roll_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                <option value="85">85</option>
                                                <option value="80">80</option>
                                                <option value="75">75</option>
                                                <option value="70">70</option>
                                                <option value="65">65</option>
                                                <option value="60">60</option>
                                                <option value="55">55</option>
                                                <option value="50">50</option>
                                                <option value="45">45</option>
                                                <option value="40">40</option>
                                                <option value="35">35</option>
                                                <option value="30">30</option>
                                                <option value="25">25</option>
                                                <option value="20">20</option>
                                                <option value="15">15</option>
                                                <option value="10">10</option>
                                                <option value="5">5</option>
                                                <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="setDisableShare3num(this);">&nbsp;คัดลอก 3 ตัวบน-->
                                                </td>
                                            </tr>
                                            <!-- <tr height="10" id="takeshow3t" bgcolor="#DADADA" style="display: table-row;">
                                                <td height="20"></td>
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH1" id="takeSH1" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH2" id="takeSH2" value="1">
                                                </td>
                                                <td height="20">
                                                    <input type="checkbox" name="takeSH3" id="takeSH3" value="1">
                                                </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="CheckAllTakeShare(this,3);">&nbsp;ถือสู้ส่วนที่เหลือ 3 ตัว
                            </td>
                        </tr> -->
                                            <tr bgcolor="#E8F9EA">
                                                <td id="TD_2T" rowspan="3" align="center"><span id="lblLive">2 ตัว</span></td>
                                                <td height="20"></td>
                                                <td height="20" style="font-weight:bold">2 ตัวบน</td>
                                                <td height="20" style="font-weight:bold">2 ตัวล่าง</td>
                                                <td height="20" style="font-weight:bold">2 ตัวโต๊ด</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr id="show2t" bgcolor="#E8F9EA" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetLivePosition"><span id="targetlv2"></span></span>
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl7" id="ddl7" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl9" id="ddl9" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl11" id="ddl11" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td height="20"><span id="lblSuperPresetLivePosition"><span id="upperlv2">เอเย่นต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl8" id="ddl8" style="WIDTH: 50px" onchange="changePt('ddl8','ddl7')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_top_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                            <option value="85">85</option>
                                                            <option value="80">80</option>
                                                            <option value="75">75</option>
                                                            <option value="70">70</option>
                                                            <option value="65">65</option>
                                                            <option value="60">60</option>
                                                            <option value="55">55</option>
                                                            <option value="50">50</option>
                                                            <option value="45">45</option>
                                                            <option value="40">40</option>
                                                            <option value="35">35</option>
                                                            <option value="30">30</option>
                                                            <option value="25">25</option>
                                                            <option value="20">20</option>
                                                            <option value="15">15</option>
                                                            <option value="10">10</option>
                                                            <option value="5">5</option>
                                                            <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl10" id="ddl10" style="WIDTH: 50px" onchange="changePt('ddl10','ddl9')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_bottom_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                            <option value="85">85</option>
                                                            <option value="80">80</option>
                                                            <option value="75">75</option>
                                                            <option value="70">70</option>
                                                            <option value="65">65</option>
                                                            <option value="60">60</option>
                                                            <option value="55">55</option>
                                                            <option value="50">50</option>
                                                            <option value="45">45</option>
                                                            <option value="40">40</option>
                                                            <option value="35">35</option>
                                                            <option value="30">30</option>
                                                            <option value="25">25</option>
                                                            <option value="20">20</option>
                                                            <option value="15">15</option>
                                                            <option value="10">10</option>
                                                            <option value="5">5</option>
                                                            <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20">
                                                    <select name="ddl12" id="ddl12" style="WIDTH: 50px" onchange="changePt('ddl12','ddl11')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_2d_top_roll_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                <option value="85">85</option>
                                                <option value="80">80</option>
                                                <option value="75">75</option>
                                                <option value="70">70</option>
                                                <option value="65">65</option>
                                                <option value="60">60</option>
                                                <option value="55">55</option>
                                                <option value="50">50</option>
                                                <option value="45">45</option>
                                                <option value="40">40</option>
                                                <option value="35">35</option>
                                                <option value="30">30</option>
                                                <option value="25">25</option>
                                                <option value="20">20</option>
                                                <option value="15">15</option>
                                                <option value="10">10</option>
                                                <option value="5">5</option>
                                                <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!--<input type="checkbox" name="ch_share_O2" id="ch_share_O2" value="1" onClick="setDisableShare2num(this);">&nbsp;คัดลอก 2 ตัวบน-->
                                                </td>
                                            </tr>
                                            <!-- <tr height="10" bgcolor="#DADADA" id="takeshow2t" style="display: table-row;">
                            <td height="20"></td>
                            <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                            </td>
                            <td height="20">
                                <input type="checkbox" name="takeSH4" id="takeSH4" value="1">
                            </td>
                            <td height="20">
                                <input type="checkbox" name="takeSH5" id="takeSH5" value="1">
                            </td>
                            <td height="20">
                                <input type="checkbox" name="takeSH6" id="takeSH6" value="1">
                            </td>
                            <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="ch_share_O3" id="ch_share_O3" value="1" onClick="CheckAllTakeShare(this,2);">&nbsp;ถือสู้ส่วนที่เหลือ 2 ตัว
                            </td>
                        </tr> -->
                                            <tr bgcolor="#D2F5D5">
                                                <td width="15%" id="TD_1T" rowspan="3" align="center"><span id="lblDeadball">1 ตัว</span></td>
                                                <td width="12%" height="20"></td>
                                                <td width="12%" height="20" style="font-weight:bold">1 ตัวบน</td>
                                                <td width="12%" height="20" style="font-weight:bold">1 ตัวล่าง</td>
                                                <td width="12%" height="20" style="font-weight:bold"></td>
                                                <td width="12%" height="20" style="font-weight:bold"></td>
                                                <td width="25%" height="20" style="font-weight:bold"></td>
                                            </tr>

                                            <tr height="20" bgcolor="#D2F5D5" id="show1t" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetPosition"><span id="targetlv1"></span></span>
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl13" id="ddl13" style="WIDTH: 50px">

                                            
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl15" id="ddl15" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                                <td height="20">

                                                </td>
                                            </tr>

                                            <tr height="10" bgcolor="#D2F5D5">
                                                <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv1">เอเย่นต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl14" id="ddl14" style="WIDTH: 50px" onchange="changePt('ddl14','ddl13')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_1d_top_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                <option value="85">85</option>
                                                <option value="80">80</option>
                                                <option value="75">75</option>
                                                <option value="70">70</option>
                                                <option value="65">65</option>
                                                <option value="60">60</option>
                                                <option value="55">55</option>
                                                <option value="50">50</option>
                                                <option value="45">45</option>
                                                <option value="40">40</option>
                                                <option value="35">35</option>
                                                <option value="30">30</option>
                                                <option value="25">25</option>
                                                <option value="20">20</option>
                                                <option value="15">15</option>
                                                <option value="10">10</option>
                                                <option value="5">5</option>
                                                <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl16" id="ddl16" style="WIDTH: 50px" onchange="changePt('ddl16','ddl15')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_1d_bottom_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                <option value="85">85</option>
                                                <option value="80">80</option>
                                                <option value="75">75</option>
                                                <option value="70">70</option>
                                                <option value="65">65</option>
                                                <option value="60">60</option>
                                                <option value="55">55</option>
                                                <option value="50">50</option>
                                                <option value="45">45</option>
                                                <option value="40">40</option>
                                                <option value="35">35</option>
                                                <option value="30">30</option>
                                                <option value="25">25</option>
                                                <option value="20">20</option>
                                                <option value="15">15</option>
                                                <option value="10">10</option>
                                                <option value="5">5</option>
                                                <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                </td>
                                                <td height="20">
                                                </td>
                                                <td height="20">

                                                    <!-- <input type="checkbox" name="ch_share_O1" id="ch_share_O1" value="1" onClick="setDisableShare1num(this);">&nbsp;คัดลอก 1 ตัวบน-->
                                                </td>
                                            </tr>
                                            <!-- <tr height="10" bgcolor="#DADADA" id="takeshow1t" style="display: table-row;">
                            <td height="20"></td>
                            <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                            </td>
                            <td height="20">
                                <input type="checkbox" name="takeSH7" id="takeSH7" value="1">
                            </td>
                            <td height="20">
                                <input type="checkbox" name="takeSH8" id="takeSH8" value="1">
                            </td>
                            <td height="20">

                            </td>
                            <td height="20">

                            </td>
                            <td height="20">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <input type="checkbox" name="ch_share_O1" id="ch_share_O1" value="1" onClick="CheckAllTakeShare(this,1);">&nbsp;ถือสู้ส่วนที่เหลือ 1 ตัว
                            </td>
                        </tr> -->
                                            <tr bgcolor="#E8F9EA">
                                                <td id="TD_19T" rowspan="3" align="center"><span id="lblLive">19 กลับ</span></td>
                                                <td height="20"></td>
                                                <td height="20" style="font-weight:bold">19 กลับบน</td>
                                                <td height="20" style="font-weight:bold">19 กลับล่าง</td>
                                                <td height="20" style="font-weight:bold">&nbsp;</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr id="show19t" bgcolor="#E8F9EA" style="display: table-row;">
                                                <td height="20"><span id="lblMasterPresetLivePosition"><span id="targetlv19"></span></span>
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl23" id="ddl23" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20">
                                                    <!-- <select name="ddl25" id="ddl25" style="WIDTH: 50px">
                                            <option value="0">0</option>
                                            </select> -->
                                                </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2"></td>
                                            </tr>
                                            <tr bgcolor="#E8F9EA">
                                                <td height="20"><span id="lblSuperPresetLivePosition"><span id="upperlv19">เอเย่นต์ ถือสู้</span></span>
                                                </td>
                                                <td height="20">
                                                    <select name="ddl24" id="ddl24" style="WIDTH: 50px" onchange="changePt('ddl24','ddl23')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_19_roll_top_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                <option value="85">85</option>
                                                <option value="80">80</option>
                                                <option value="75">75</option>
                                                <option value="70">70</option>
                                                <option value="65">65</option>
                                                <option value="60">60</option>
                                                <option value="55">55</option>
                                                <option value="50">50</option>
                                                <option value="45">45</option>
                                                <option value="40">40</option>
                                                <option value="35">35</option>
                                                <option value="30">30</option>
                                                <option value="25">25</option>
                                                <option value="20">20</option>
                                                <option value="15">15</option>
                                                <option value="10">10</option>
                                                <option value="5">5</option>
                                                <option value="0">0</option> -->
                                            </select>&nbsp;%</td>
                                                <td height="20">
                                                    <select name="ddl26" id="ddl26" style="WIDTH: 50px" onchange="changePt('ddl26','ddl25')">
                                                            <option ng-repeat="n in rangePTshared(0, pt_shared_19_roll_bottom_when_select_master)">{{n}}</option>
                                                            <!-- <option value="90">90</option>
                                                <option value="85">85</option>
                                                <option value="80">80</option>
                                                <option value="75">75</option>
                                                <option value="70">70</option>
                                                <option value="65">65</option>
                                                <option value="60">60</option>
                                                <option value="55">55</option>
                                                <option value="50">50</option>
                                                <option value="45">45</option>
                                                <option value="40">40</option>
                                                <option value="35">35</option>
                                                <option value="30">30</option>
                                                <option value="25">25</option>
                                                <option value="20">20</option>
                                                <option value="15">15</option>
                                                <option value="10">10</option>
                                                <option value="5">5</option>
                                                <option value="0">0</option> -->
                                            </select>&nbsp;% </td>
                                                <td height="20">&nbsp;</td>
                                                <td height="20" colspan="2">&nbsp;</td>
                                            </tr>
                                            <!-- <tr height="10" bgcolor="#DADADA" id="takeshow19t" style="display: table-row;">
                            <td height="20"></td>
                            <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                            </td>
                            <td height="20">
                                <input type="checkbox" name="takeSH12" id="takeSH12" value="1">
                            </td>
                            <td height="20">
                                <input type="checkbox" name="takeSH13" id="takeSH13" value="1">
                            </td>
                            <td height="20">&nbsp;</td>
                            <td height="20" colspan="2">&nbsp;</td>
                        </tr> -->
                                        </tbody>
                                    </table>

                                    <input name="Hidden2" type="hidden" id="Hidden2" value="{{pt_shared_3d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden4" type="hidden" id="Hidden4" value="{{pt_shared_3d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden6" type="hidden" id="Hidden6" value="{{pt_shared_3d_top_roll_when_select_master}}">&nbsp;
                                    <input name="Hidden8" type="hidden" id="Hidden8" value="{{pt_shared_2d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden10" type="hidden" id="Hidden10" value="{{pt_shared_2d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden12" type="hidden" id="Hidden12" value="{{pt_shared_2d_top_roll_when_select_master}}">&nbsp;
                                    <input name="Hidden14" type="hidden" id="Hidden14" value="{{pt_shared_1d_top_when_select_master}}">&nbsp;
                                    <input name="Hidden16" type="hidden" id="Hidden16" value="{{pt_shared_1d_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden18" type="hidden" id="Hidden18" value="90">&nbsp;
                                    <input name="Hidden20" type="hidden" id="Hidden20" value="90">&nbsp;
                                    <input name="Hidden22" type="hidden" id="Hidden22" value="90">&nbsp;
                                    <input name="Hidden24" type="hidden" id="Hidden24" value="{{pt_shared_19_roll_top_when_select_master}}">&nbsp;
                                    <input name="Hidden26" type="hidden" id="Hidden26" value="{{pt_shared_19_roll_bottom_when_select_master}}">&nbsp;
                                    <input name="Hidden28" type="hidden" id="Hidden28">&nbsp;
                                    <input name="Hidden30" type="hidden" id="Hidden30">&nbsp;
                                    <input name="Hidden32" type="hidden" id="Hidden32">&nbsp;
                                    <input name="Hidden40" type="hidden" id="Hidden40">&nbsp;
                                    <input name="inlv" type="hidden" id="inlv" value="4">
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
                </td>
                </tr>
                </tbody>
                </table>

                <div style="text-align:center; background-color: #d8e5fd; padding-top: 10px; padding-bottom: 10px;"> <button ng-click="addAccount()">{{ 'SAVE' | translate }}</button> <button ng-click="addAccount()">{{ 'CANCEL' | translate }}</button></div>

            </div>
        </div>
    </div>
</div>

<script>
    function isNumber() {
        return (event.ctrlKey || event.altKey ||
            (47 < event.keyCode && event.keyCode < 58 && event.shiftKey == false) ||
            (95 < event.keyCode && event.keyCode < 106) ||
            (event.keyCode == 8) || (event.keyCode == 9) ||
            (event.keyCode > 34 && event.keyCode < 40) ||
            (event.keyCode == 46))
    }

    function changePt(name, name2) {
        var val = form['Hidden' + name.replace('ddl', '')].value - form[name].value;
        form[name2].options.length = 0;
        var count = 1;
        for (i = val; i >= 0; i -= 5) {
            form[name2].options[count] = new Option(i, i);
            count++;
        }
    }
</script>