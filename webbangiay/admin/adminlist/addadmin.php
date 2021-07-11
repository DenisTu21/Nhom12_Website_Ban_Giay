<?php
require_once('../../DB/dbhelper.php');

$id = $username = $password ='';
if (!empty($_POST)) {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $username = str_replace('"', '\\"', $username);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password = str_replace('"', '\\"', $password);
    }
    

    if (!empty($username)) {
     
        //Luu vao database
        if ($id == '') {
            $sql = 'insert into admin(username, password) values ("' . $username . '", "' . $password . '")';
        } else {
            $sql = 'update admin set username = "' . $username . '", password = "' . $password . '" where id = ' . $id;
        }

        execute($sql);

        header('Location: adminmanage.php');
        die();
    }
}

if (isset($_GET['id'])) {
    $id      = $_GET['id'];
    $sql     = 'select * from admin where id = ' . $id;
    $admin = executeSingleResult($sql);
    if ($admin != null) {
        $username       = $admin['username'];
        $password       = $admin['password'];
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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Add Admin</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="icon_document_alt"></i>Admin</li>
                        <li><i class="fa fa-files-o"></i>Add Admin</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Admin
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="form-validate form-horizontal">
                                    <form method="post">
                                        <div class="form-group ">
                                            <label  class="control-label col-lg-2">Username <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="text" name="id" value="<?= $id ?>" hidden="true">
                                                <input class="form-control" id="username" name="username" value="<?= $username ?>" minlength="5" type="text" required />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group ">
                                            <label  class="control-label col-lg-2">Password <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="password" name="password" value="<?= $password ?>" minlength="5" type="text" required />
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

    <?php
    require_once "../main/js.php"
    ?>
</body>

</html>