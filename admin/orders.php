<?php include "header.php" ?>
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Orders</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Order Id</th>
                    <th>User Name</th>
                    <th>Payment Mode</th>
                    <th>Payment Status</th>
                    <th>Order Address</th>
                    <!-- <th>Order Photos</th> -->
                    <th>Date</th>
                    <th>Order Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $pay_res = $admin_obj->OrderPaymentList();
                  $count = 0;
                  while ($pay_row = mysqli_fetch_assoc($pay_res)) {
                    $count++;
                    $oder_id = $pay_row['order_id'];
                    $user_id = $pay_row['user_id'];
                    $det_res = $admin_obj->OrderDetailList($oder_id);
                    if (mysqli_num_rows($det_res) > 0) {
                      $det_row = mysqli_fetch_assoc($det_res);
                    }
                    $user_res = $admin_obj->OrderUserList($user_id);
                    if (mysqli_num_rows($user_res) > 0) {
                      $user_row = mysqli_fetch_assoc($user_res);
                    }

                  ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $pay_row['order_id']; ?></td>
                      <td><?php echo $user_row['Name']; ?></td>
                      <td><?php echo $pay_row['payment_type']; ?></td>
                      <td><?php if ($pay_row['payment_status'] == 1) {
                            echo "Successful";
                          } else {
                            echo "Padding";
                          }
                          ?></td>
                      <td> <?php echo $det_row['address1'] ?>,<?php echo $det_row['address2'] ?>
                        <?php echo $det_row['town_city'] ?>(<?php echo $det_row['pincode'] ?>),
                        <?php echo $det_row['state'] ?>(<?php echo $det_row['contry'] ?>)</td>
                      <!-- <td><?php //echo $det_row['current_order'] 
                                ?></td> -->
                      <td><?php echo $pay_row['date']; ?></td>
                      <td><?php
                          if ($det_row['Order_Status'] == 0) {
                            $status = "canceled";
                            $btncolor = "btn-danger";
                          } else {
                            if ($det_row['Order_Status'] == 1) {
                              $status = "process";
                              $btncolor = "btn-primary";
                            } else {
                              if ($det_row['Order_Status'] == 2) {
                                $status = "dispached";
                                $btncolor = "btn-secondary";
                              } else {
                                if ($det_row['Order_Status'] == 3) {
                                  $status = "delivered";
                                  $btncolor = "btn-success";
                                } else {
                                  if ($det_row['Order_Status'] == 4) {
                                    $status = "return";
                                    $btncolor = "btn-warning";
                                  }
                                }
                              }
                            }
                          }



                          ?>
                        <div class="btn-group">
                          <button type="button" class="btn <?php echo $btncolor; ?>"><?php echo $status; ?></button>
                          <button type="button" class="btn <?php echo $btncolor; ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" style="cursor:pointer">
                            <?php 
                            $i=0;
                            ?>
                              <span class="dropdown-item" id="order_status<?php echo $i;?>">Canceled <i id="status_val<?php echo $i;?>" style="display: none;"><?php echo $i;?></i></span>
                              <script>
                        $(function() {
                          $("#order_status<?php echo $i;?>").click(function() {
                            var ord_status = $("#status_val<?php echo $i;?>").html();
                            var orderid ="<?php echo $pay_row['order_id']; ?>" ;
                            var action = "UpadateOrderStatus";
                            $.ajax({
                              type: "POST",
                              url: "code.php",
                              data: {
                                orderid: orderid,
                                status: ord_status,
                                orderdo: action
                              },
                              success(res){
                                alert("ho gya");
                              }
                            })

                          })
                        })
                      </script>
                              <span class="dropdown-item" id="order_status<?php echo ++$i;?>">process <i id="status_val<?php echo $i;?>" style="display: none;"><?php echo $i;?></i></span>
                              <script>
                        $(function() {
                          $("#order_status<?php echo $i;?>").click(function() {
                            var ord_status = $("#status_val<?php echo $i;?>").html();
                            var orderid ="<?php echo $pay_row['order_id']; ?>" ;
                            var action = "UpadateOrderStatus";
                            $.ajax({
                              type: "POST",
                              url: "code.php",
                              data: {
                                orderid: orderid,
                                status: ord_status,
                                orderdo: action
                              },
                              success(res){
                                alert("ho gya");
                              }
                            })

                          })
                        })
                      </script>
                              <span class="dropdown-item" id="order_status<?php echo ++$i;?>">dispached <i id="status_val<?php echo $i;?>" style="display: none;"><?php echo $i;?></i></span>
                              <script>
                        $(function() {
                          $("#order_status<?php echo $i;?>").click(function() {
                            var ord_status = $("#status_val<?php echo $i;?>").html();
                            var orderid ="<?php echo $pay_row['order_id']; ?>" ;
                            var action = "UpadateOrderStatus";
                            $.ajax({
                              type: "POST",
                              url: "code.php",
                              data: {
                                orderid: orderid,
                                status: ord_status,
                                orderdo: action
                              },
                              success(res){
                                alert("ho gya");
                              }
                            })

                          })
                        })
                      </script>
                              <span class="dropdown-item" id="order_status<?php echo ++$i;?>">delivered <i id="status_val<?php echo $i;?>" style="display: none;"><?php echo $i;?></i></span>
                              <script>
                        $(function() {
                          $("#order_status<?php echo $i;?>").click(function() {
                            var ord_status = $("#status_val<?php echo $i;?>").html();
                            var orderid ="<?php echo $pay_row['order_id']; ?>" ;
                            var action = "UpadateOrderStatus";
                            $.ajax({
                              type: "POST",
                              url: "code.php",
                              data: {
                                orderid: orderid,
                                status: ord_status,
                                orderdo: action
                              },
                              success(res){
                                alert("ho gya");
                              }
                            })

                          })
                        })

                      </script>
                              <span class="dropdown-item" id="order_status<?php echo ++$i;?>">return <i id="status_val<?php echo $i;?>" style="display: none;"><?php echo $i;?></i></span>
                              <script>
                        $(function() {
                          $("#order_status<?php echo $i;?>").click(function() {
                            var ord_status = $("#status_val<?php echo $i;?>").html();
                            var orderid ="<?php echo $pay_row['order_id']; ?>" ;
                            var action = "UpadateOrderStatus";
                            $.ajax({
                              type: "POST",
                              url: "code.php",
                              data: {
                                orderid: orderid,
                                status: ord_status,
                                orderdo: action
                              },
                              success(res){
                                alert("ho gya");
                              }
                            })

                          })
                        })
                      </script>
                            
                          </div>
                        </div>
                      </td>
                     
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>


              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include "footer.php" ?>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>