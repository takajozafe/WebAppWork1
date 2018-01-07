<div class="row-full">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><span class="card-header-content">ประวัติการเข้าสู่ระบบ</span></div>
            <div class="card-body">
                <table class="table-hover">
                    <thead>
                        <tr class="table table-th">
                            <th>วันที่</th>
                            <th>รหัสผู้ใช้งาน</th>
                            <th>เวลาเข้าใช้ระบบ</th>
                            <th>หมายเลขไอพี</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body" style="text-align:center;" ng-repeat="i in loginHistoryList">
                            <td>{{i.login_transaction_datetime}}</td>
                            <td>{{i.account_code}}</td>
                            <td>{{i.time_ago}}</td>
                            <td>{{i.login_transaction_ip_address}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>