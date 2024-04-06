<style>
    .signup{
        /* align-items: center!important; */
        /* border: 1px solid red; */
        height: 70px;
        margin: 40px 0;
        text-decoration: underline;
    }
</style>
<?php include "header.php"; ?>


<div class="container " style="margin-top:150px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center my-2 py-1 px-3 rounded" style="background:#fe4c50;">
            <h2 class="my-4 font-weight-bold display-5 text-light">Log In</h2>
            </div>
            <form action="code.php" method="post">
               
                <!-- <div class="form-group">
                    <label for="email" class="font-weight-bold h5 my-3">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address" required>
                </div> -->
                <div class="form-group">
                    <label for="phone" class="font-weight-bold h5 my-3">LogIn Id</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone no. , Email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold h5 my-3">Password</label>
                    <input type="password" name="password" class="form-control text-dark" id="password" placeholder="Enter your password" required>
                </div>
                
                
                <button type="submit" name="loginbtn" class="btn mt-3 text-light btn-danger" style="background-color:#fe4c50; outline: -2px solid #ffff;">LogIn</button>
                <a href="user_register.php" class="signup">sign up new account</a>
            </form>
        </div>
    </div>
</div>





<?php include "footer.php"; ?>