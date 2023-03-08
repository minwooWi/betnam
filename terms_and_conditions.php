<?php
//including the database connection file
include_once("./datasource/config.php");

$is_sub="";
$tag_title = "terms_and_conditions";

include_once("./include/header.php");
include_once("./include/left.php");


$list_query = "(SELECT * FROM terms_and_conditions)";

$result = mysqli_query($mysqli, $list_query); // using mysqli_query instead
?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">주의사항 및 규정관리</h1>
                <p class="mb-4">필독, 유의사항, 취소규정 관리 리스트 입니다.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr class="textCenter">
                                    <th>번호</th>
                                    <th>타입 유형</th>
                                    <th>규정 유형</th>
                                    <th>규정 제목</th>
                                    <th>규정 내용</th>
                                    <th>관리</th>
                                    <th>등록일</th>
                                    <th>수정일</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                                while($res = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td class=\"textCenter\">".$res['id']."</td>";
                                    echo "<td class=\"textCenter\">".$res['type']."</td>";
                                    echo "<td class=\"textCenter\">".$res['reservation_type']."</td>";
                                    echo "<td>".$res['title']."</td>";
                                    echo "<td>".$res['content']."</td>";
                                    echo "<td class=\"textCenter\"><a href=\"editTerm.php?id=$res[id]\">내용 수정</a></td>";
//                                    echo "<td><a href=\"editTerm.php?id=$res[id]\">Edit</a> | <a href=\"deleteTerm.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                    echo "<td class=\"textCenter\">".$res['created_at']."</td>";
                                    echo "<td class=\"textCenter\">".$res['updated_at']."</td>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer include-html="footer.html" class="sticky-footer bg-white"></footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
<?php
$footer_gb = "main";
include_once("./include/footer.php");
?>