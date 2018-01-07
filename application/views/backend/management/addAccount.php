<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <style>
        .textbox-custom {
            text-align: left;
            font-weight: bold;
            border: none;
            /*background-color:#c3ffc3;*/
            background-color: #d2fbd2;
            color: #999999;
            cursor: pointer;
        }
    </style>

    <table style="width: 100%;">
        <tr>
            <td style="vertical-align:top;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ 'NAVIGATION_MANAGEMENT_ADD_USER' | translate}}</h3>
                    </div>
                    <div class="panel-body">

                        <table style="width: 100%">
                            <thead style="background-color: #fde8e7;">
                                <tr>
                                    <th style="text-align: left; padding-left: 15px !important;">{{ 'USER' | translate}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background-color: #fff1f1;">
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
                                                    <input type="text" ng-model="_credit_transaction_balance" format="number" ng-value="credit_transaction_balance || 0 | number" style="text-align:right">
                                                    <font color="#999999">&lt;=</font> <input type="text" readonly ng-click="_credit_transaction_balance = credit_transaction_balance || 0" format="number" ng-value="credit_transaction_balance || 0 | number" class="textbox-custom"
                                                        style="background-color:#ffdcdc">
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
                                        <table width="100%" border="0" cellpadding="0" cellspacing="1" id="Table3">
                                            <tbody>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_3D_TOP' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_3d_top" ng-value="_min_amount_config._value_3d_top || 0 | number" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_3d_top = min_amount_config.value_3d_top || 0" ng-value="min_amount_config.value_3d_top || 0 | number" class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" id="_max_amount_config._value_3d_top" ng-model="_max_amount_config._value_3d_top" ng-value="max_amount_config.value_3d_top || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_3d_top = max_amount_config.value_3d_top || 0" ng-value="max_amount_config.value_3d_top || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" id="_top_amount_config._value_3d_top" format="number" ng-model="_top_amount_config._value_3d_top" ng-value="top_amount_config.value_3d_top || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_3d_top = top_amount_config.value_3d_top || 0" ng-value="top_amount_config.value_3d_top || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6"  id="_reward_amount_config._value_3d_top" ng-model="_reward_amount_config._value_3d_top" ng-value="reward_amount_config.value_3d_top || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_3d_top = reward_amount_config.value_3d_top || 0" ng-value="reward_amount_config.value_3d_top || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_3D_BOTTOM' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_3d_bottom" ng-value="min_amount_config.value_3d_bottom || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_3d_bottom = min_amount_config.value_3d_bottom || 0" ng-model="min_amount_config.value_3d_bottom" ng-value="min_amount_config.value_3d_bottom || 0 | number" class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_3d_bottom" ng-value="max_amount_config.value_3d_bottom || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_3d_bottom = max_amount_config.value_3d_bottom || 0" ng-value="max_amount_config.value_3d_bottom || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_3d_bottom" ng-value="top_amount_config.value_3d_bottom || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_3d_bottom = top_amount_config.value_3d_bottom || 0" ng-value="top_amount_config.value_3d_bottom || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_3d_bottom" ng-value="reward_amount_config.value_3d_bottom || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_3d_bottom = reward_amount_config.value_3d_bottom || 0" ng-value="reward_amount_config.value_3d_bottom || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_3D_TOP_ROLL' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_3d_top_roll" ng-value="min_amount_config.value_3d_top_roll || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_3d_top_roll = min_amount_config.value_3d_top_roll || 0" ng-model="min_amount_config.value_3d_top_roll" ng-value="min_amount_config.value_3d_top_roll || 0 | number"
                                                            class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_3d_top_roll" ng-value="max_amount_config.value_3d_top_roll || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_3d_top_roll = max_amount_config.value_3d_top_roll || 0" ng-value="max_amount_config.value_3d_top_roll || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_3d_top_roll" ng-value="top_amount_config.value_3d_top_roll || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_3d_top_roll = top_amount_config.value_3d_top_roll || 0" ng-value="top_amount_config.value_3d_top_roll || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_3d_top_roll" ng-value="reward_amount_config.value_3d_top_roll || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_3d_top_roll = reward_amount_config.value_3d_top_roll || 0" ng-value="reward_amount_config.value_3d_top_roll || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_2D_TOP' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_2d_top" ng-value="min_amount_config.value_2d_top || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_2d_top = min_amount_config.value_2d_top || 0" ng-model="min_amount_config.value_2d_top" ng-value="min_amount_config.value_2d_top || 0 | number" class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_2d_top" ng-value="max_amount_config.value_2d_top || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_2d_top = max_amount_config.value_2d_top || 0" ng-value="max_amount_config.value_2d_top || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_2d_top" ng-value="top_amount_config.value_2d_top || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_2d_top = top_amount_config.value_2d_top || 0" ng-value="top_amount_config.value_2d_top || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_2d_top" ng-value="reward_amount_config.value_2d_top || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_2d_top = reward_amount_config.value_2d_top || 0" ng-value="reward_amount_config.value_2d_top || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_2D_BOTTOM' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_2d_bottom" ng-value="min_amount_config.value_2d_bottom || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_2d_bottom = min_amount_config.value_2d_bottom || 0" ng-model="min_amount_config.value_2d_bottom" ng-value="min_amount_config.value_2d_bottom || 0 | number" class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_2d_bottom" ng-value="max_amount_config.value_2d_bottom || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_2d_bottom = max_amount_config.value_2d_bottom || 0" ng-value="max_amount_config.value_2d_bottom || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_2d_bottom" ng-value="top_amount_config.value_2d_bottom || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_2d_bottom = top_amount_config.value_2d_bottom || 0" ng-value="top_amount_config.value_2d_bottom || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_2d_bottom" ng-value="reward_amount_config.value_2d_bottom || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_2d_bottom = reward_amount_config.value_2d_bottom || 0" ng-value="reward_amount_config.value_2d_bottom || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_2D_TOP_ROLL' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_2d_top_roll" ng-value="min_amount_config.value_2d_top_roll || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_2d_top_roll = min_amount_config.value_2d_top_roll || 0" ng-model="min_amount_config.value_2d_top_roll" ng-value="min_amount_config.value_2d_top_roll || 0 | number"
                                                            class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_2d_top_roll" ng-value="max_amount_config.value_2d_top_roll || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_2d_top_roll = max_amount_config.value_2d_top_roll || 0" ng-value="max_amount_config.value_2d_top_roll || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_2d_top_roll" ng-value="top_amount_config.value_2d_top_roll || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_2d_top_roll = top_amount_config.value_2d_top_roll || 0" ng-value="top_amount_config.value_2d_top_roll || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_2d_top_roll" ng-value="reward_amount_config.value_2d_top_roll || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_2d_top_roll = reward_amount_config.value_2d_top_roll || 0" ng-value="reward_amount_config.value_2d_top_roll || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_1D_TOP' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_1d_top" ng-value="min_amount_config.value_1d_top || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_1d_top = min_amount_config.value_1d_top || 0" ng-model="min_amount_config.value_1d_top" ng-value="min_amount_config.value_1d_top || 0 | number" class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_1d_top" ng-value="max_amount_config.value_1d_top || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_1d_top = max_amount_config.value_1d_top || 0" ng-value="max_amount_config.value_1d_top || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_1d_top" ng-value="top_amount_config.value_1d_top || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_1d_top = top_amount_config.value_1d_top || 0" ng-value="top_amount_config.value_1d_top || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_1d_top" ng-value="reward_amount_config.value_1d_top || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_1d_top = reward_amount_config.value_1d_top || 0" ng-value="reward_amount_config.value_1d_top || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_1D_BOTTOM' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_1d_bottom" ng-value="min_amount_config.value_1d_bottom || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_1d_bottom = min_amount_config.value_1d_bottom || 0" ng-model="min_amount_config.value_1d_bottom" ng-value="min_amount_config.value_1d_bottom || 0 | number" class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_1d_bottom" ng-value="max_amount_config.value_1d_bottom || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_1d_bottom = max_amount_config.value_1d_bottom || 0" ng-value="max_amount_config.value_1d_bottom || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_1d_bottom" ng-value="top_amount_config.value_1d_bottom || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_1d_bottom = top_amount_config.value_1d_bottom || 0" ng-value="top_amount_config.value_1d_bottom || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_1d_bottom" ng-value="reward_amount_config.value_1d_bottom || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_1d_bottom = reward_amount_config.value_1d_bottom || 0" ng-value="reward_amount_config.value_1d_bottom || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_19_ROLL_TOP' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_19_roll_top" ng-value="min_amount_config.value_19_roll_top || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_19_roll_top = min_amount_config.value_19_roll_top || 0" ng-model="min_amount_config.value_19_roll_top" ng-value="min_amount_config.value_19_roll_top || 0 | number"
                                                            class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_19_roll_top" ng-value="max_amount_config.value_19_roll_top || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_19_roll_top = max_amount_config.value_19_roll_top || 0" ng-value="max_amount_config.value_19_roll_top || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_19_roll_top" ng-value="top_amount_config.value_19_roll_top || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_19_roll_top = top_amount_config.value_19_roll_top || 0" ng-value="top_amount_config.value_19_roll_top || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_19_roll_top" ng-value="reward_amount_config.value_19_roll_top || 0 | number" style="text-align:right"></td>
                                                                <td width="125" align="left">&lt;=
                                                                    <input type="text" format="number" size="6" readonly ng-click="_reward_amount_config._value_19_roll_top = reward_amount_config.value_19_roll_top || 0" ng-value="reward_amount_config.value_19_roll_top || 0 | number" class="textbox-custom"></td>
                                                            </td>
                                                        </td>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="84" align="center" style="font-weight:bold">{{ 'LABEL_19_ROLL_BOTTOM' | translate }}</td>

                                                    <td width="131" align="center">{{ 'MIN' | translate }}
                                                        <input type="text" format="number" size="6" ng-model="_min_amount_config._value_19_roll_bottom" ng-value="min_amount_config.value_19_roll_bottom || 0" style="text-align:right"></td>
                                                    <td width="105">&gt;=
                                                        <input type="text" format="number" size="6" readonly ng-click="_min_amount_config._value_19_roll_bottom = min_amount_config.value_19_roll_bottom || 0" ng-model="min_amount_config.value_19_roll_bottom" ng-value="min_amount_config.value_19_roll_bottom || 0 | number"
                                                            class="textbox-custom">

                                                        <td width="159" align="center">{{ 'MAX' | translate }}
                                                            <input type="text" format="number" size="12" ng-model="_max_amount_config._value_19_roll_bottom" ng-value="max_amount_config.value_19_roll_bottom || 0 | number" style="text-align:right"></td>
                                                        <td>&lt;=
                                                            <input type="text" format="number" size="12" readonly ng-click="_max_amount_config._value_19_roll_bottom = max_amount_config.value_19_roll_bottom || 0" ng-value="max_amount_config.value_19_roll_bottom || 0 | number" class="textbox-custom">

                                                            <td width="225" align="center">{{ 'MAX_1_NUMBER' | translate }}
                                                                <input type="text" size="12" style="text-align:right" format="number" ng-model="_top_amount_config._value_19_roll_bottom" ng-value="top_amount_config.value_19_roll_bottom || 0 | number"></td>
                                                            <td width="145" align="left">&lt;=
                                                                <input type="text" format="number" size="12" readonly ng-click="_top_amount_config._value_19_roll_bottom = top_amount_config.value_19_roll_bottom || 0" ng-value="top_amount_config.value_19_roll_bottom || 0 | number" class="textbox-custom">

                                                                <td width="108" align="center">{{ 'REWARD' | translate }}
                                                                    <input type="text" format="number" size="6" ng-model="_reward_amount_config._value_19_roll_bottom" ng-value="reward_amount_config.value_19_roll_bottom || 0 | number" style="text-align:right"></td>
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

                        <table style="width: 100%" ng-if="selected_under.id !== undefined || account_level == 4">
                            <thead style="background-color: #c5ffc5;">
                                <tr>
                                    <th style="text-align: left; padding-left: 15px !important;">{{ 'PT_SHARE' | translate }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background-color: #e1ffe1;">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="1">
                                            <tbody style="background-color: #e1ffe1;">
                                                <tr bgcolor="#D2F5D5">
                                                    <td width="15%" id="TD_3T" rowspan="3" align="center"><span id="lblDeadball">3 ตัว</span></td>
                                                    <td width="12%" height="20"></td>
                                                    <td width="12%" height="20" style="font-weight:bold">3 ตัวบน</td>
                                                    <td width="12%" height="20" style="font-weight:bold">3 ตัวล่าง</td>
                                                    <td width="12%" height="20" style="font-weight:bold">3 ตัวโต๊ด</td>
                                                    <td width="37%" height="20" colspan="2"></td>
                                                </tr>

                                                <tr height="20" bgcolor="#D2F5D5" id="show3t" style="display: table-row;">
                                                    <td height="20">
                                                        <span ng-if="selected_level == 1">มาสเตอร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 2">เอเย่นต์ ถือสู้</span>
                                                        <span ng-if="selected_level == 0">ซีเนียร์ ถือสู้</span>
                                                    </td>
                                                    <td height="20">
                                                        <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_3d_top" ng-change="on(selected_master_pt_3d_top)" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_3d_top.id, pt_shared_3d_top_when_select_master) track by option.id | orderBy: 'id' : true"> -->
                                                        <select ng-if="selected_level != 3" ng-selected="{{selected_master_pt_3d_top-10 == selected_senior_pt_3d_top}}" ng-model="selected_master_pt_3d_top" ng-change="on_selected_master_pt_3d_top(selected_master_pt_3d_top)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_3d_top.id, pt_shared_3d_top_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    <td height="20">
                                                        <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_3d_bottom" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_3d_bottom.id, pt_shared_3d_bottom_when_select_master) track by option.id | orderBy: 'id' : true"></select> -->
                                                        <select ng-if="selected_level != 3" ng-model="selected_master_pt_3d_bottom" ng-change="on_selected_master_pt_3d_bottom(selected_master_pt_3d_bottom)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_3d_bottom.id, pt_shared_3d_bottom_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    <td height="20">
                                                    <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_3d_top_roll" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_3d_top_roll.id, pt_shared_3d_top_roll_when_select_master) track by option.id | orderBy: 'id' : true"></select></td> -->
                                                    <select ng-if="selected_level != 3" ng-model="selected_master_pt_3d_top_roll" ng-change="on_selected_master_pt_3d_top_roll(selected_master_pt_3d_top_roll)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_3d_top_roll.id, pt_shared_3d_top_roll_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    <td height="20" colspan="2"></td>
                                                </tr>

                                                <tr height="10" bgcolor="#D2F5D5">
                                                    <td height="20">
                                                        <span ng-if="selected_level == 1">ซีเนียร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 2">มาสเตอร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 3">เอเย่นต์ ถือสู้</span>
                                                        <span ng-if="selected_level == 0">เว็บไซต์ ถือสู้</span>
                                                    </td>
                                                    <td height="20">
                                                        <select ng-model="selected_senior_pt_3d_top" ng-change="on_selected_senior_pt_3d_top(selected_senior_pt_3d_top)" ng-options="item as item.id for item in opt_senior_senior_pt_3d_top | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20"><select ng-model="selected_senior_pt_3d_bottom" ng-change="on_selected_senior_pt_3d_bottom(selected_senior_pt_3d_bottom)" ng-options="item as item.id for item in opt_senior_senior_pt_3d_bottom | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20"><select ng-model="selected_senior_pt_3d_top_roll" ng-change="on_selected_senior_pt_3d_top_roll(selected_senior_pt_3d_top_roll)" ng-options="item as item.id for item in opt_senior_senior_pt_3d_top_roll | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20" colspan="2">
                                                </tr>
                                                <tr ng-if="selected_level != 3" height="10" id="takeshow3t" bgcolor="#DADADA" style="display: table-row;">
                                                    <td height="20"></td>
                                                    <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                    </td>
                                                    <td height="20"><input type="checkbox" ng-model="take_3d_top" ng-change="on_take_3d_top(1)"></td>
                                                    <td height="20"><input type="checkbox" ng-model="take_3d_bottom" ng-change="on_take_3d_bottom(1)"></td>
                                                    <td height="20"><input type="checkbox" ng-model="take_3d_top_roll" ng-change="on_take_3d_top_roll(1)"></td>
                                                    <td height="20" colspan="2"></td>
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
                                                    <td height="20">
                                                        <span ng-if="selected_level == 1">มาสเตอร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 2">เอเย่นต์ ถือสู้</span>
                                                        <span ng-if="selected_level == 0">ซีเนียร์ ถือสู้</span>
                                                    </td>
                                                    <td height="20">
                                                        <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_2d_top" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_2d_top.id, pt_shared_2d_top_when_select_master) track by option.id | orderBy: 'id' : true"></select> -->
                                                        <select ng-if="selected_level != 3" ng-model="selected_master_pt_2d_top" ng-change="on_selected_master_pt_2d_top(selected_master_pt_2d_top)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_2d_top.id, pt_shared_2d_top_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    <td height="20">
                                                        <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_2d_bottom" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_2d_bottom.id, pt_shared_2d_bottom_when_select_master) track by option.id | orderBy: 'id' : true"></select> -->
                                                        <select ng-if="selected_level != 3" ng-model="selected_master_pt_2d_bottom" ng-change="on_selected_master_pt_2d_bottom(selected_master_pt_2d_bottom)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_2d_bottom.id, pt_shared_2d_bottom_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    <td height="20">
                                                    <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_2d_top_roll" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_2d_top_roll.id, pt_shared_2d_top_roll_when_select_master) track by option.id | orderBy: 'id' : true"></select> -->
                                                    <select ng-if="selected_level != 3" ng-model="selected_master_pt_2d_top_roll" ng-change="on_selected_master_pt_2d_top_roll(selected_master_pt_2d_top_roll)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_2d_top_roll.id, pt_shared_2d_top_roll_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    <td height="20" colspan="2"></td>
                                                </tr>
                                                <tr bgcolor="#E8F9EA">
                                                    <td height="20">
                                                        <span ng-if="selected_level == 1">ซีเนียร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 2">มาสเตอร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 3">เอเย่นต์ ถือสู้</span>
                                                        <span ng-if="selected_level == 0">เว็บไซต์ ถือสู้</span>
                                                    </td>
                                                    <td height="20">
                                                        <!-- <select ng-model="selected_senior_pt_2d_top" ng-options="item as item.id for item in opt_senior_senior_pt_2d_top | orderBy: 'id' : true">
                                                            </select>  -->
                                                        <select ng-model="selected_senior_pt_2d_top" ng-change="on_selected_senior_pt_2d_top(selected_senior_pt_2d_top)" ng-options="item as item.id for item in opt_senior_senior_pt_2d_top | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20">
                                                    <!-- <select ng-model="selected_senior_pt_2d_bottom" ng-options="item as item.id for item in opt_senior_senior_pt_2d_bottom | orderBy: 'id' : true">
                                                            </select> -->
                                                            <select ng-model="selected_senior_pt_2d_bottom" ng-change="on_selected_senior_pt_2d_bottom(selected_senior_pt_2d_bottom)" ng-options="item as item.id for item in opt_senior_senior_pt_2d_bottom | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20">
                                                    <!-- <select ng-model="selected_senior_pt_2d_top_roll" ng-options="item as item.id for item in opt_senior_senior_pt_2d_top_roll | orderBy: 'id' : true">
                                                            </select> -->
                                                            <select ng-model="selected_senior_pt_2d_top_roll" ng-change="on_selected_senior_pt_2d_top_roll(selected_senior_pt_2d_top_roll)" ng-options="item as item.id for item in opt_senior_senior_pt_2d_top_roll | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20" colspan="2"></td>
                                                </tr>
                                                <tr ng-if="selected_level != 3" height="10" bgcolor="#DADADA" id="takeshow2t" style="display: table-row;">
                                                    <td height="20"></td>
                                                    <td height="20">
                                                        <span>ถือสู้ส่วนที่เหลือ</span>
                                                    </td>
                                                    <td height="20"><input type="checkbox" ng-model="take_2d_top" ng-change="on_take_2d_top(1)"></td>
                                                    <td height="20"><input type="checkbox" ng-model="take_2d_bottom" ng-change="on_take_2d_bottom(1)"></td>
                                                    <td height="20"><input type="checkbox" ng-model="take_2d_top_roll" ng-change="on_take_2d_top_roll(1)"></td>
                                                    <td height="20" colspan="2"></td>
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
                                                    <td height="20">
                                                        <span ng-if="selected_level == 1">มาสเตอร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 2">เอเย่นต์ ถือสู้</span>
                                                        <span ng-if="selected_level == 0">ซีเนียร์ ถือสู้</span>
                                                    </td>
                                                    <td height="20">
                                                    <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_1d_top" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_1d_top.id, pt_shared_1d_top_when_select_master) track by option.id  | orderBy: 'id' : true"></select> -->
                                                    <select ng-if="selected_level != 3" ng-model="selected_master_pt_1d_top" ng-change="on_selected_master_pt_1d_top(selected_master_pt_1d_top)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_1d_top.id, pt_shared_1d_top_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    </td>
                                                    <td height="20">
                                                    <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_1d_bottom" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_1d_bottom.id, pt_shared_1d_bottom_when_select_master) track by option.id | orderBy: 'id' : true"></select> -->
                                                    <select ng-if="selected_level != 3" ng-model="selected_master_pt_1d_bottom" ng-change="on_selected_master_pt_1d_bottom(selected_master_pt_1d_bottom)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_1d_bottom.id, pt_shared_1d_bottom_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    <td height="20"></td>
                                                    <td height="20"></td>
                                                    <td height="20"></td>
                                                </tr>

                                                <tr height="10" bgcolor="#D2F5D5">
                                                    <td height="20">
                                                        <span ng-if="selected_level == 1">ซีเนียร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 2">มาสเตอร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 3">เอเย่นต์ ถือสู้</span>
                                                        <span ng-if="selected_level == 0">เว็บไซต์ ถือสู้</span>
                                                    </td>
                                                    <td height="20">
                                                    <!-- <select ng-model="selected_senior_pt_1d_top" ng-options="item as item.id for item in opt_senior_senior_pt_1d_top | orderBy: 'id' : true">
                                                        </select>  -->
                                                        <select ng-model="selected_senior_pt_1d_top" ng-change="on_selected_senior_pt_1d_top(selected_senior_pt_1d_top)" ng-options="item as item.id for item in opt_senior_senior_pt_1d_top | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20">
                                                    <!-- <select ng-model="selected_senior_pt_1d_bottom" ng-options="item as item.id for item in opt_senior_senior_pt_1d_bottom | orderBy: 'id' : true">
                                                        </select> -->
                                                        <select ng-model="selected_senior_pt_1d_bottom" ng-change="on_selected_senior_pt_1d_bottom(selected_senior_pt_1d_bottom)" ng-options="item as item.id for item in opt_senior_senior_pt_1d_bottom | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20"></td>
                                                    <td height="20"></td>
                                                    <td height="20"></td>
                                                </tr>
                                                <tr ng-if="selected_level != 3" height="10" bgcolor="#DADADA" id="takeshow1t" style="display: table-row;">
                                                    <td height="20"></td>
                                                    <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                    </td>
                                                    <td height="20"><input type="checkbox" ng-model="take_1d_top" ng-change="on_take_1d_top(1)"></td>
                                                    <td height="20"><input type="checkbox" ng-model="take_1d_bottom" ng-change="on_take_1d_bottom(1)"></td>
                                                    <td height="20"></td>
                                                    <td height="20"></td>
                                                    <td height="20"></td>
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
                                                    <td height="20">
                                                        <span ng-if="selected_level == 1">มาสเตอร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 2">เอเย่นต์ ถือสู้</span>
                                                        <span ng-if="selected_level == 0">ซีเนียร์ ถือสู้</span>
                                                    </td>
                                                    <td height="20">
                                                    <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_19_roll_top" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_19_roll_top.id, pt_shared_19_roll_top_when_select_master) | orderBy: 'id' : true"></select> -->
                                                    <select ng-if="selected_level != 3" ng-model="selected_master_pt_19_roll_top" ng-change="on_selected_master_pt_19_roll_top(selected_master_pt_19_roll_top)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_19_roll_top.id, pt_shared_19_roll_top_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    <td height="20">
                                                    <!-- <select ng-if="selected_level != 3" ng-model="selected_master_pt_19_roll_bottom" ng-options="option for option in onChangePercentShared(0, selected_senior_pt_19_roll_bottom.id, pt_shared_19_roll_bottom_when_select_master) | orderBy: 'id' : true"></select> -->
                                                    <select ng-if="selected_level != 3" ng-model="selected_master_pt_19_roll_bottom" ng-change="on_selected_master_pt_19_roll_bottom(selected_master_pt_19_roll_bottom)">
                                                            <option ng-repeat="option in onChangePercentShared(5, selected_senior_pt_19_roll_bottom.id, pt_shared_19_roll_bottom_when_select_master) | orderBy: 'option' : true" value="{{option}}">{{option}}</option>
                                                            <option value>0</option>
                                                        </select>
                                                    </td>
                                                    <td height="20">&nbsp;</td>
                                                    <td height="20" colspan="2"></td>
                                                </tr>
                                                <tr bgcolor="#E8F9EA">
                                                    <td height="20">
                                                        <span ng-if="selected_level == 1">ซีเนียร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 2">มาสเตอร์ ถือสู้</span>
                                                        <span ng-if="selected_level == 3">เอเย่นต์ ถือสู้</span>
                                                        <span ng-if="selected_level == 0">เว็บไซต์ ถือสู้</span>
                                                    </td>
                                                    <td height="20">
                                                    <!-- <select ng-model="selected_senior_pt_19_roll_top" ng-options="item as item.id for item in opt_senior_senior_pt_19_roll_top | orderBy: 'id' : true">
                                                        </select> -->
                                                        <select ng-model="selected_senior_pt_19_roll_top" ng-change="on_selected_senior_pt_19_roll_top(selected_senior_pt_19_roll_top)" ng-options="item as item.id for item in opt_senior_senior_pt_19_roll_top | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20">
                                                    <!-- <select ng-model="selected_senior_pt_19_roll_bottom" ng-options="item as item.id for item in opt_senior_senior_pt_19_roll_bottom | orderBy: 'id' : true">
                                                        </select> -->
                                                        <select ng-model="selected_senior_pt_19_roll_bottom" ng-change="on_selected_senior_pt_19_roll_bottom(selected_senior_pt_19_roll_bottom)" ng-options="item as item.id for item in opt_senior_senior_pt_19_roll_bottom | orderBy: 'id' : true">
                                                        </select> %</td>
                                                    <td height="20">&nbsp;</td>
                                                    <td height="20" colspan="2">&nbsp;</td>
                                                </tr>
                                                <tr ng-if="selected_level != 3" height="10" bgcolor="#DADADA" id="takeshow19t" style="display: table-row;">
                                                    <td height="20"></td>
                                                    <td height="20"><span id="lblSuperPresetPosition"><span id="upperlv111">ถือสู้ส่วนที่เหลือ</span></span>
                                                    </td>
                                                    <td height="20"><input type="checkbox" ng-model="take_19_roll_top" ng-change="on_take_19_roll_top(1)"></td>
                                                    <td height="20"><input type="checkbox" ng-model="take_19_roll_bottom" ng-change="on_take_19_roll_bottom(1)"></td>
                                                    <td height="20">&nbsp;</td>
                                                    <td height="20" colspan="2">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <div style="text-align:center; background-color: #a7ecca; padding-top: 10px; padding-bottom: 10px;"> <button ng-click="addAccount()">{{ 'SAVE' | translate }}</button> <button ng-click="addAccount()">{{ 'CANCEL' | translate }}</button></div>
                    </div>
                </div>
            </td>
        </tr>
    </table>


    </div>
    <?php // End of BackendController in breadcrumb.php ?>
    <script src="<?php echo base_url('commons/js/core/sha512.min.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/services/language.service.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/services/backend.service.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/backend/controllers/backendController.js') ?>"></script>