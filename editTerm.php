<?php
include_once("./datasource/config.php");

if(isset($_POST['editTermUpdate']))
{
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $title = mysqli_real_escape_string($mysqli, $_POST['title']);
    $content = mysqli_real_escape_string($mysqli, $_POST['content']);
    $updated_at = date("Y-m-d H:i:s");

    $result = mysqli_query($mysqli, "UPDATE terms_and_conditions SET `title` = '$title', `content` = '$content', `updated_at` = '$updated_at' WHERE `id` = $id");

    header("Location: terms_and_conditions.php");
//    mysqli_close($mysqli);
}

?>
<?php
$is_sub="Y";
$tag_title = "terms_and_conditions edit";

//getting id from url
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT id, type, reservation_type, title, trim(content), content, created_at, updated_at FROM terms_and_conditions WHERE 1=1 AND id = $id");

while($res = mysqli_fetch_array($result))
{
    $id = $res['id'];
    $type = $res['type'];
    $reservation_type = $res['reservation_type'];
    $title = $res['title'];
    $content = $res['content'];
    $created_at = $res['created_at'];
    $updated_at = $res['updated_at'];
}

include_once("./include/header.php");
include_once("./include/left.php");
?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="margin: 0 auto">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <form action="editTerm.php" method='post'>
                <div class="contentBox">►유의사항 및 취소규정
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info04">
                            타입 유형
                            <div class="top_main_reservation_desc">type</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="type" class="reservation_input" id="reservation_code" value="<?php echo $type;?>" disabled>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            규정 유형
                            <div class="top_main_reservation_desc">reservation_type</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="reservation_type" class="reservation_input" id="golf-course-name" value="<?php echo $reservation_type;?>" disabled>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            규정 제목
                            <div class="top_main_reservation_desc">title</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="title" class="reservation_input" id="golf-company-info" value="<?php echo $title;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            규정 내용
                            <div class="top_main_reservation_desc">content</div>
                        </div>
                        <div class="textAreaUpperWrap">
                            <textarea name="content" class="textAreaWrap" placeholder="규정 추가" required><?php echo $content;?></textarea>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $id;?>" name="id">
                    <input type="submit" name="editTermUpdate" class="btn btn-primary btn-block" value="수정">
                </div>
            </form>
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