<div class="row-full">
    <div class="col-md-12">

        <div class="card" ng-if="account_level == 4">
            <div class="card-header"><span class="card-header-content">เพิ่มประกาศใหม่</span></div>
            <div class="card-body">
                <table class="table-hover">
                    <thead>
                        <tr class="table table-th">
                            <th>ประกาศ (ภาษาไทย)</th>
                            <th>ประกาศ (ภาษาอังกฤษ)</th>
                            <th>ประกาศ (ภาษาจีน)</th>
                            <th width="77"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body">
                            <td style="text-align:center;"><input type="text" size="50" ng-model="announcement_th"></td>
                            <td style="text-align:center;"><input type="text" size="50" ng-model="announcement_en"></td>
                            <td style="text-align:center;"><input type="text" size="50" ng-model="announcement_cn"></td>
                            <td style="text-align:center;"><button ng-click="setAnnouncement(announcement_th, announcement_en, announcement_cn)">เพิ่ม</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div ng-if="account_level == 4" style="padding-bottom:20px;"></div>

        <div class="card">
            <div class="card-header"><span class="card-header-content">ประกาศ</span></div>
            <div class="card-body">
                <table class="table-hover">
                    <thead>
                        <tr class="table table-th">
                            <th>ลำดับ</th>
                            <th>วันที่</th>
                            <th>ข้อความ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body" ng-repeat="i in announcementList">
                            <td width="77" style="text-align:center;">{{$index + 1}}</td>
                            <td width="160">{{i.announcement_created_date}}</td>
                            <td ng-if="current_language == 'th'">{{i.announcement_content_th}}</td>
                            <td ng-if="current_language == 'en'">{{i.announcement_content_en}}</td>
                            <td ng-if="current_language == 'cn'">{{i.announcement_content_cn}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>