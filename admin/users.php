<?php include "header.php"; ?>


<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <!-- Main content -->
    <section class="content row">
        <!-- <div class="col-lg-1"></div> -->
        <div class="col-lg-12 card">
            <div class="card-header bg-primary text-light text-center">
                <h3>Users Data</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-condensed">
                    <thead>
                        <th>S.No.</th>
                        <th>Name </th>
                        <th>Pic</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $sn = 1;
                        $result = $admin_obj->ViewUsers();
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $sn; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><img src="uploads/<?php echo $row['Pic'];  ?>" width="50px" alt=""></td>
                                    <td><?php echo $row['Phone']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Gender']; ?></td>
                                    <td><?php if ($row['Status'] == 1) {
                                            echo "Active";
                                        } else {
                                            echo "Deactive";
                                        }
                                        ?></td>
                                    <td><a href="add-product.php?editproid=<?php echo $row['user_id']; ?>" class="btn btn-success">View/Edit</a> <a href="admin-code.php?deleteuserid=<?php echo $row['user_id']; ?>" class="btn btn-danger">Remove</a></td>
                                </tr>
                        <?php
                                $sn++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="col-lg-1"></div> -->

    </section>
    <!-- /.content -->
</div>





<?php include "footer.php"; ?>