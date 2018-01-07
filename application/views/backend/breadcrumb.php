<style>
    .bg {
        background: rgba(74, 166, 191, 1);
        background: -moz-linear-gradient(top, rgba(74, 166, 191, 1) 0%, rgba(255, 255, 255, 1) 78%, rgba(218, 241, 252, 1) 93%, rgba(200, 234, 250, 1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(74, 166, 191, 1)), color-stop(78%, rgba(255, 255, 255, 1)), color-stop(93%, rgba(218, 241, 252, 1)), color-stop(100%, rgba(200, 234, 250, 1)));
        background: -webkit-linear-gradient(top, rgba(74, 166, 191, 1) 0%, rgba(255, 255, 255, 1) 78%, rgba(218, 241, 252, 1) 93%, rgba(200, 234, 250, 1) 100%);
        background: -o-linear-gradient(top, rgba(74, 166, 191, 1) 0%, rgba(255, 255, 255, 1) 78%, rgba(218, 241, 252, 1) 93%, rgba(200, 234, 250, 1) 100%);
        background: -ms-linear-gradient(top, rgba(74, 166, 191, 1) 0%, rgba(255, 255, 255, 1) 78%, rgba(218, 241, 252, 1) 93%, rgba(200, 234, 250, 1) 100%);
        background: linear-gradient(to bottom, rgba(74, 166, 191, 1) 0%, rgba(255, 255, 255, 1) 78%, rgba(218, 241, 252, 1) 93%, rgba(200, 234, 250, 1) 100%);
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#4aa6bf', endColorstr='#c8eafa', GradientType=0);
    }
    .button-breadcrumb {
        color: white !important;
        border-top: 1px solid #96d1f8;
        background: #65a9d7;
        background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
        background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
        background: -moz-linear-gradient(top, #3e779d, #65a9d7);
        background: -ms-linear-gradient(top, #3e779d, #65a9d7);
        background: -o-linear-gradient(top, #3e779d, #65a9d7);
        padding: 9.5px 19px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
        -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
        box-shadow: rgba(0,0,0,1) 0 1px 0;
        text-shadow: rgba(0,0,0,.4) 0 1px 0;
        font-size: 11px;
        font-weight: bold;
        font-family: Verdana;
        text-decoration: none !important;
        vertical-align: middle;
        }
        .button-breadcrumb > a {
            color: white;
        }
        .button-breadcrumb:hover {
        border-top-color: #28597a;
        background: #28597a;
        color: #ccc;
        }
        .button-breadcrumb:active {
        border-top-color: #1b435e;
        background: #1b435e;
        }

        .classname {
            color: white !important;
            font-size: 11px;
            font-weight: bold;
            font-family: Verdana;
            text-decoration: none !important;
            -moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
            -webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
            box-shadow:inset 0px 1px 0px 0px #bbdaf7;
            background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
            background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
            background-color:#79bbff;
            -webkit-border-top-left-radius:42px;
            -moz-border-radius-topleft:42px;
            border-top-left-radius:42px;
            -webkit-border-top-right-radius:0px;
            -moz-border-radius-topright:0px;
            border-top-right-radius:0px;
            -webkit-border-bottom-right-radius:42px;
            -moz-border-radius-bottomright:42px;
            border-bottom-right-radius:42px;
            -webkit-border-bottom-left-radius:0px;
            -moz-border-radius-bottomleft:0px;
            border-bottom-left-radius:0px;
            text-indent:0px;
            display:inline-block;
            font-style:normal;
            height:29px;
            line-height:29px;
            width:90px;
            text-align:center;
            text-shadow:1px 1px 0px #528ecc;
        }
        .classname:hover {
            background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
            background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
            background-color:#378de5;
        }.classname:active {
            position:relative;
            top:1px;
        }
</style>

<div ng-app="app" ng-controller="BackendController" class="ng-cloak" ng-init="init()">

    <div class="row-no-margin" style="text-align:center;">
        <div class="col-md-12" style="color: #FFFFFF;">
            <h4 style="color: #FFFFFF;padding-bottom: 0.75em;"><strong>{{ 'HELLO' | translate }}{{accountNickname}}</strong>
                <span style="padding-left: 20px;">
                    <a href="javascript: void(0)" ng-click="changeLanguage('th')"><img src="<?php echo base_url('private/images/thai_flag.png') ?>"></a>
                    <a href="javascript: void(0)" ng-click="changeLanguage('en')"><img src="<?php echo base_url('private/images/uk_flag.png') ?>"></a>
                </span>
            </h4>
        </div>
    </div>

    <div class="row-no-margin" style="text-align:center; background: -webkit-linear-gradient(top, #edf6ff 16%,#6f8cc9 82%);">

    <!-- <a href="<?php echo base_url('/backend/home') ?>" class="classname"><i class="fa fa-home" aria-hidden="true"></i> {{ 'NAVIGATION_HOME' | translate }}</a>
    <a href="javascript: void(0)" ng-mouseover="showMenu('management')" class="classname"><i class="fa fa-wrench" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT' | translate }}</a> -->

        <div class="col-md-12" style="">
            <div class="btn-group btn-breadcrumb">
                <a style="padding-left: 15px; padding-right: 10px;" href="<?php echo base_url('/backend/home') ?>" class="btn btn-success"><i class="fa fa-home" aria-hidden="true"></i> {{ 'NAVIGATION_HOME' | translate }}</a>
                <a href="javascript: void(0)" ng-mouseover="showMenu('management')" class="btn btn-success"><i class="fa fa-wrench" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT' | translate }}</a>
                <a href="javascript: void(0)" ng-mouseover="showMenu('bet')" class="btn btn-success"><i class="fa fa-money" aria-hidden="true"></i> {{ 'NAVIGATION_BET' | translate }}</a>
                <a href="javascript: void(0)" ng-mouseover="showMenu('report')" class="btn btn-success"><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ 'NAVIGATION_REPORT' | translate }}</a>
                <a href="javascript: void(0)" ng-mouseover="showMenu('user')" class="btn btn-success"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ 'NAVIGATION_ACCOUNT' | translate }}</a>
                <a href="javascript: void(0)" ng-click="signOut()" class="btn btn-success"><i class="fa fa-power-off" aria-hidden="true"></i> {{ 'BUTTON_SIGNOUT' | translate }}</a>
            </div>
        </div>
    </div>

    <div class="row-no-margin" style="text-align:center;">
        <div class="col-md-12" style="color: #FFFFFF;">
            <div ng-show="currentMenu == 'management'" style="padding: 7px;">
                <span class="h5 submenu breadcrumb-link"><i class="fa fa-caret-right" aria-hidden="true"></i> <a style="color: white!important;text-decoration: none!important;" href="<?php echo base_url('/backend/management/addAccount') ?>">{{ 'NAVIGATION_MANAGEMENT_ADD_USER' | translate }}</a></span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a style="color: white!important;text-decoration: none!important;" href="<?php echo base_url('/backend/management/addCoAccount') ?>">{{ 'NAVIGATION_MANAGEMENT_ADD_SUBUSER' | translate }}</a></span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a style="color: white!important;text-decoration: none!important;" href="<?php echo base_url('/backend/management/accountList') ?>">{{ 'NAVIGATION_MANAGEMENT_USER_LIST' | translate }}</a></span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT_CREDIT_BALANCE' | translate }}</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT_PT_SETTINGMEMBER' | translate }}</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a style="color: white!important;text-decoration: none!important;" href="<?php echo base_url('/backend/home') ?>">{{ 'NAVIGATION_MANAGEMENT_PT_SETTINGBET' | translate }}</a></span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT_COMMISSION' | translate }}</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT_MIN_REWARD' | translate }}</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT_TRANSFER' | translate }}</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT_SET_TIME' | translate }}</span>
            </div>

            <div ng-show="currentMenu == 'bet'" style="padding: 7px;">
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> ยอดพนันตามประเภท</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> ยอดพนันตามสมาชิก</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> สรุปยอดพนัน</span>
            </div>

            <div ng-show="currentMenu == 'report'" style="padding: 7px;">
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> แพ้ชนะสุทธิ</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> แพ้ชนะตามประเภท</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> รายงานการเงิน</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> ผลการออกรางวัล</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> รายการพนันที่ถูกยกเลิก</span>
            </div>

            <div ng-show="currentMenu == 'user'" style="padding: 7px;">
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> ข้อมูลการเงิน</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> ติดตามประกาศ</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> ผู้ใช้งานที่กำลังออนไลน์</span>
                <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> ประวัติการเข้าสู่ระบบ</span>
            </div>

        </div>
    </div>