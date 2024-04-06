<style>
  .userhead {
    height: 100px;
    border-radius: 100% 50px 10px 10px;
    background-color: #fce8e9;
  }

  .user_pics{
    width: fit-content;
    text-align: right;
  }

  .uplode {
    position: relative;
    top: 80px;
    left: -50px;
    cursor: pointer;
    color: rgb(236, 99, 99);

  }

  .username {
    font-size: 50px;
    text-transform: capitalize;
    font-weight: 600;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #fe4c50;
  }

  .details {
    line-height: 25px;
    font-size: 15px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
</style>
<?php include "header.php";
if (!isset($_SESSION['username'])) {
?>
  <script>
    window.location.href = "user_login.php";
  </script>
<?php
}
$user_id = $_SESSION['user_id'];
$result = $object->UserDitaile($user_id);
if (mysqli_num_rows($result) > 0) {
  $user = mysqli_fetch_assoc($result);




?>

  <section class="container " style="margin-top: 300px;">
    <div class="row mt-5  userhead">
      <div class="col-lg-4 user_pics" style="margin-top: -120px;">
        <img src="images/user.png" id="userpic" class="pic" alt="" height="200px" width="200px" style="border-radius: 50%;">
        <input type="file" hidden="true" id="picid" name="userpic">
        <i id="uplodepic" class="fa fa-camera uplode" style="font-size: 30px;"></i>
      </div>
      <div class="col-lg-4" style="margin-top: -50px;">
        <h2 class="mt-4 username"><?php echo $user['Name']; ?></h2>
        <div class="details">
          <span class="mx-2 " style="text-transform: capitalize;width:500px;"><?php echo $user['Email']; ?></span><br>
          <span class="mx-2 " style="text-transform: capitalize;">+91 <?php echo $user['Phone']; ?></span>
        </div>
      </div>
      <div class="col-lg-4 py-2 pl-4" style="align-content: center; ">
        <a href="code.php?logout_do=logout" class="btn btn-danger px-2 mx-5" style="margin-top: 20px;" type="submit">LogOut</a>
      </div>
    </div>
    <div class="card mt-5">
      <details class="card-header">
        <summary style="font-size: 30px;" class="">Your Orders</summary>
        <table border class="mt-3">
          <tr>
            <th>order</th>
            <th>price</th>
            <th>delivery</th>
          </tr>
          <tr>
            <td>apple</td>
            <td>70</td>
            <td>kal</td>
          </tr>
          <tr>
            <td>papita</td>
            <td>30</td>
            <td>parso</td>
          </tr>
          <tr>
            <td>sapdi</td>
            <td>20</td>
            <td>abhiyal</td>
          </tr>
        </table>
      </details>
    </div>
  </section>


<?php
}
include "footer.php";
?>
<script>
  // $(function() {
  //   $.("#uplodepic").click(function() {
  //     var file = $.("#picid");

  //   })
  // })
</script>