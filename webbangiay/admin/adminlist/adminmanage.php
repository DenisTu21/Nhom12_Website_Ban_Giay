<?php
require_once('../../DB/dbhelper.php');
require_once('../../common/utility.php');
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


    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Admin Management</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Admin</a></li>
                        <li><i class="fa fa-table"></i>Admin Management</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="addadmin.php">
                        <button class="btn btn-primary" style="margin-bottom: 15px;">Add New Admin</button>
                    </a>
                </div>
                <div class="col-lg-6">
                    <form method="get">
                        <div class="form-group" style="width: 300px; float: right;">
                            <input type="text" class="form-control" placeholder="Searching..." id="s" name="s">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            List of Admins
                        </header>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:50px;">#</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th style="width:100px;"></th>
                                    <th style="width:100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Lay danh sach danh muc tu database
                                $limit = 10;
                                $page  = 1;
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                }
                                if ($page <= 0) {
                                    $page = 1;
                                }
                                $firstIndex = ($page - 1) * $limit;

                                $sql         = 'select * from admin';
                                $adminList = executeResult($sql);

                                $sql         = 'select count(id) as total from admin where 1 ';
                                $countResult = executeSingleResult($sql);
                                $number      = 0;
                                if ($countResult != null) {
                                    $count  = $countResult['total'];
                                    $number = ceil($count / $limit);
                                }

                                $index = 1;
                                foreach ($adminList as $item) {
                                    echo '<tr>
                                            <td>' . (++$firstIndex) . '</td>
                                            <td>' . $item['username'] . '</td>
                                            <td>' . $item['password'] . '</td>
                                            <td>
                                                <a href="addadmin.php?id=' . $item['id'] . '"><button class="btn btn-warning">Modify</button></a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="deleteAdmin(' . $item['id'] . ')">Delete</button>
                                            </td>
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>

                    </section>
                </div>
            </div>
            <?=paginarion($number, $page, '')?>
        </section>
    </section>

    <!-- delete product function -->

    
	<script type="text/javascript">
		function deleteAdmin(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá admin này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>

    <!-- javascripts -->
    <?php
    require_once "../main/js.php"
    ?>
</body>

</html>