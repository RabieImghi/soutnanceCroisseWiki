<?php
$dashboard="ok";
ob_start();
?>
<div class="headerSection">
    <h2>Dashboard</h2>
    <span><span>Home</span> / Dashboard</span>
</div>
<div class="mt-3 cards d-flex flex-wrap gap-4 justify-content-between w-full  mx-3">
    <div class="shadow rounded-1">
        <div class="card border-0 info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Total <span>| Items</span></h5>

            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="card_footr ml-2">
                    <h6><?=$statisticals['countItems']["total"]?></h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
            </div>
        </div>

        </div>
    </div>
    <div class="shadow rounded-1">
        <div class="card border-0 info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Total <span>| Category</span></h5>

            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="card_footr ml-2">
                    <h6><?=$statisticals['countCateg']["total"]?></h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
            </div>
        </div>

        </div>
    </div>
    <div class="shadow rounded-1">
        <div class="card border-0 info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Total <span>| Tags</span></h5>

            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="card_footr ml-2">
                    <h6><?=$statisticals['countTags']["total"]?></h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
            </div>
        </div>

        </div>
    </div>
    <div class="shadow rounded-1">
        <div class="card border-0 info-card sales-card">
            <div class="card-body">
            <h5 class="card-title">Total <span>| User</span></h5>

            <div class="d-flex align-items-center">
                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card_footr ml-2">
                    <h6><?=$statisticals['countUser']["total"]?></h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
            </div>
        </div>

        </div>
    </div>

</div>
<div class="card-body mt-5 shadow p-2 m-3 ">
    <div class="datatable-container">
        <table class="table table-borderless datatable datatable-table">
            <thead>
                <tr>
                    <th data-sortable="true" style="width: 10.648148148148149%;">
                        #
                    </th>
                    <th data-sortable="true" style="width: 23.456790123456788%;">
                        Customer
                    </th>
                    <th data-sortable="true" style="width: 11.728395061728394%;">
                        Price
                    </th>
                    <th data-sortable="true" class="red" style="width: 14.814814814814813%;">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr data-index="0">
                    <td><a href="#">#2457</a></td>
                    <td>Brandon Jacob</td>
                    <td>$64</td>
                    <td class="green"><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr data-index="1">
                    <td><a href="#">#2147</a></td>
                    <td>Bridie Kessler</td>
                    <td>$47</td><td class="green"><span class="badge bg-warning">Pending</span></td>
                </tr>
                <tr data-index="2">
                    <td><a href="#">#2049</a></td>
                    <td>Ashleigh Langosh</td>
                    <td>$147</td>
                    <td class="green"><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr data-index="3">
                    <td><a href="#">#2644</a></td>
                    <td>Angus Grady</td>
                    <td>$67</td><td class="green"><span class="badge bg-danger">Rejected</span></td>
                </tr>
                <tr data-index="4">
                    <td><a href="#">#2644</a></td>
                    <td>Raheem Lehner</td>
                    <td>$165</td>
                    <td class="green"><span class="badge bg-success">Approved</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="datatable-bottom">
        <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
        <nav class="datatable-pagination"><ul class="datatable-pagination-list"></ul></nav>
    </div>
</div>

<?php 
$content=ob_get_clean();
include "../views/admin/header.php";
?>
