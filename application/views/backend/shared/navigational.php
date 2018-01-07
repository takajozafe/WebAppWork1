<?php
$request_uri = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1); ?>

    <div ng-app="app" ng-controller="<?php echo $request_uri; ?>Controller" class="ng-cloak" ng-init="init()">

        <header>
            <div class="header-image">

                <div class="header-navigation-group">
                    <a href="<?php echo base_url('/backend/managements/SettingBetPercentage') ?>" class="header-navigation-button"><i class="fa fa-home" aria-hidden="true"></i> {{ 'NAVIGATION_HOME' | translate }}</a>
                    <a href="javascript: void(0)" ng-mouseover="navigationBinding('management')" class="header-navigation-button"><i class="fa fa-wrench" aria-hidden="true"></i> {{ 'NAVIGATION_MANAGEMENT' | translate }}</a>
                    <a href="javascript: void(0)" ng-mouseover="navigationBinding('bet')" class="header-navigation-button"><i class="fa fa-money" aria-hidden="true"></i> {{ 'NAVIGATION_BET' | translate }}</a>
                    <a href="javascript: void(0)" ng-mouseover="navigationBinding('report')" class="header-navigation-button"><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ 'NAVIGATION_REPORT' | translate }}</a>
                    <a href="javascript: void(0)" ng-mouseover="navigationBinding('user')" class="header-navigation-button"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ 'NAVIGATION_ACCOUNT' | translate }}</a>
                    <a href="javascript: void(0)" onclick="signOut()" class="header-navigation-button"><i class="fa fa-power-off" aria-hidden="true"></i> {{ 'BUTTON_SIGNOUT' | translate }}</a>
                </div>

                <div class="header-navigation-child">
                    <div ng-show="currentMenu == 'management'" style="padding: 7px;">
                        <span class="h5 submenu breadcrumb-link"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/managements/AddAccount') ?>">{{ 'NAVIGATION_MANAGEMENT_ADD_USER' | translate }}</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/managements/AddCoAccount') ?>">{{ 'NAVIGATION_MANAGEMENT_ADD_SUBUSER' | translate }}</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/managements/AccountList') ?>">{{ 'NAVIGATION_MANAGEMENT_USER_LIST' | translate }}</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/managements/SettingCredit') ?>">{{ 'NAVIGATION_MANAGEMENT_CREDIT_BALANCE' | translate }}</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/managements/SettingSharedPercentage') ?>">{{ 'NAVIGATION_MANAGEMENT_PT_SETTINGMEMBER' | translate }}</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/managements/SettingBetPercentage') ?>">{{ 'NAVIGATION_MANAGEMENT_PT_SETTINGBET' | translate }}</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/managements/CommissionManage') ?>">{{ 'NAVIGATION_MANAGEMENT_COMMISSION' | translate }}</a></span>
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
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/account/Financial') ?>">ข้อมูลการเงิน</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/account/Announcement') ?>">ติดตามประกาศ</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/account/ResetPassword') ?>">เปลี่ยนรหัสผ่าน</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/account/OnlineAccount') ?>">ผู้ใช้งานที่กำลังออนไลน์</a></span>
                        <span class="h5 submenu"><i class="fa fa-caret-right" aria-hidden="true"></i> <a href="<?php echo base_url('/backend/account/LoginHistory') ?>">ประวัติการเข้าสู่ระบบ</a></span>
                    </div>

                </div>

                <div class="header-announcement">{{ 'ANNOUNCEMENT' | translate }}:
                    <marquee class="header-announcement-content" width="350px" scrollamount="3" class="description" scrolldelay="100" onmouseover="this.stop()" onmouseout="this.start()">
                        {{announcementLast}}
                    </marquee>
                </div>

                <div class="header-account-greeting">{{ 'HELLO' | translate }}{{accountNickname}}
                    <span class="header-account-language-flags">
                        <a href="javascript: void(0)" ng-click="changeLanguage('th')"><img src="<?php echo base_url('private/images/thai_flag.png') ?>"></a>
                        <a href="javascript: void(0)" ng-click="changeLanguage('en')"><img src="<?php echo base_url('private/images/uk_flag.png') ?>"></a>
                    </span>
                </div>

            </div>
        </header>

        <script>
            function signOut() {
                document.cookie = "_language=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                document.cookie = "_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                location.reload();
            }
        </script>