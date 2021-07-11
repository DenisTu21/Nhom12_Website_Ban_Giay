<?php
require_once('../../DB/dbhelper.php');

$id = $thumnail =$tieude = $noidung  = $ngaydang ='';
if (!empty($_POST)) {
    if (isset($_POST['thumnail'])) {
        $thumnail = $_POST['thumnail'];
        $thumnail = str_replace('"', '\\"', $thumnail);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['tieude'])) {
        $tieude = $_POST['tieude'];
        $tieude = str_replace('"', '\\"', $tieude);
    }
   
    if (isset($_POST['noidung'])) {
        $noidung = $_POST['noidung'];
        $noidung = str_replace('"', '\\"', $noidung);
    }

    if (!empty($thumnail)) {
        $ngaydang = date('Y-m-d H:s:i');
        //Luu vao database
        if ($id == '') {
            $sql = 'insert into tintuc(thumnail, tieude, noidung, ngaydang) values ("' . $thumnail . '", "' . $tieude . '", "' . $noidung . '", "' . $ngaydang . '")';
        } else {
            $sql = 'update tintuc set thumnail = "' . $thumnail . '", tieude = "' . $tieude . '", noidung = "' . $noidung . '" where id = ' . $id;
        }

        execute($sql);

        header('Location: newsmanage.php');
        die();
    }
}

if (isset($_GET['id'])) {
    $id      = $_GET['id'];
    $sql     = 'select * from tintuc where id = ' . $id;
    $news = executeSingleResult($sql);
    if ($news != null) {
        $thumnail       = $news['thumnail'];
        $tieude       = $news['tieude'];
        $noidung     = $news['noidung'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../main/main.php"
    ?>
</head>

<body>
    <!-- header -->
    <?php
    require_once "../main/header.php"
    ?>
    <!-- sidebar -->
    <?php
    require_once "../main/sidebar.php"
    ?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Add News</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="icon_document_alt"></i>News</li>
                        <li><i class="fa fa-files-o"></i>Add News</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add News
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="form-validate form-horizontal">
                                    <form method="post">
                                        <div class="form-group ">
                                        <label  class="control-label col-lg-2">Thumnail <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="thumnail" name="thumnail" minlength="5" type="text" required="true" value="<?= $thumnail ?>" onchange="updateThumbnail()" />
                                                <img src="<?= $thumnail ?>" style="max-width: 200px" id="img_thumbnail">
                                            </div>
                                        </div>
                        
                                        <div class="form-group ">
                                            <label  class="control-label col-lg-2">Heading <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="tieude" name="tieude" value="<?= $tieude ?>" minlength="5" type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="content" class="control-label col-sm-2">Content<span class="required">*</span></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control ckeditor" name="noidung" id="noidung" rows="5"><?= $noidung ?></textarea>
                                            </div>
                                        </div>
                                        <button style="float:right;" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>

    <!-- update thumnail immediately -->
    <script type="text/javascript">
        function updateThumbnail() {
            $('#img_thumbnail').attr('src', $('#thumnail').val())
        }

        $(function() {
            //doi website load noi dung => xu ly phan js
            $('#content').summernote({
                height: 350
            });
        })
    </script>
    <!-- javascripts -->
    <?php
    require_once "../main/js.php"
    ?>
</body>

</html>