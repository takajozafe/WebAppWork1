<div class="row-full">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><span class="card-header-content">ผู้ใช้งาน ออนไลน์</span></div>
            <div class="card-body">
                <table class="table-hover">
                    <thead>
                        <tr class="table table-th">
                            <th>ลำดับ</th>
                            <th>รหัสผู้ใช้งาน</th>
                            <th>เวลาเข้าใช้ระบบ</th>
                            <th>เวลา online</th>
                            <th>หมายเลขไอพี</th>
                            <th>Domain</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body" style="text-align:center;" ng-repeat="i in onlineAccountList">
                            <td>{{$index + 1}}</td>
                            <td>{{i.account_code}}</td>
                            <td>{{i.login_transaction_datetime}}</td>
                            <td>{{i.time_ago}}</td>
                            <td>{{i.login_transaction_ip_address}}</td>
                            <td>{{i.login_transaction_domain}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>