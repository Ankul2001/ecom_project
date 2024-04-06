<?php include "header.php"; ?>



<div class="container " style="margin-top:150px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center my-2 py-1 px-3 rounded" style="background:#fe4c50;">
            <h2 class="my-4 font-weight-bold display-5 text-light">Sign Up A/C </h2>
            </div>
            <form action="code.php" method="post">
                <div class="form-group">
                    <label for="fullName" class="font-weight-bold h5 mb-3">Full Name <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="text" name="name" class="form-control" id="fullName" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email" class="font-weight-bold h5 my-3">Email address <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address" required>
                    <p id="emailmsg" class="mx-3 mt-1 text-danger" ></p>

                </div>
                <div class="form-group">
                    <label for="phone" class="font-weight-bold h5 my-3">Phone no. <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your phone no." required>
                    <p id="phonemsg" class="mx-3 mt-1 text-danger" ></p>

                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold h5 my-3">Password <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="password" name="password" class="form-control text-dark" id="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword" class="font-weight-bold h5 my-3">Confirm Password <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="password" name="confirm"  class="form-control text-dark" id="confirmPassword" placeholder="Confirm your password" required>
                    <p id="msg" class="mx-3 mt-1 text-danger" style="display:none;">Password not match..!!</p>
                </div>
                <div class="form-group">
                    <label for="gender" class="font-weight-bold h5 my-3">Gender <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <select name="gender" class="form-control text-dark" id="gender" required>
                        <option value="" disabled selected>---Select your gender---</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dob" class="font-weight-bold h5 my-3">Date of Birth <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="date" name="dob" class="form-control text-dark" id="dob" required>
                </div>
                
                <button type="submit" id="signupbtn" name="registerbtn" class="btn text-light btn-danger" style="background-color:#fe4c50; outline: -2px solid #ffff;">SignUp</button><a href="user_login.php" class="mx-4 text-decoration-underline">I have alrady an A/C</a>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>

<script>
    $(function(){
        $("#confirmPassword").blur(function(){
            var pass=$("#password").val();
            var conpass=$("#confirmPassword").val();
            var msg=$("#msg");
            if( conpass == pass){
                msg.css('display','none');
                $("#signupbtn").removeAttr("disabled");
            }else{
                msg.css('display','block');
                msg.css('color','red');
                $("#signupbtn").attr("disabled", "true");

            }

        })
        $("#email").blur(function(){
            
            var emailnphone=$("#email").val();
            
            var msg=$("#emailmsg");
            $.ajax({
                url: "code.php",
                type: "POST",
                data: {emailnphone:emailnphone, do:"checkemailandphone"},
                success:function(res){
                //    alert(res);
                    if(res==1){
                        msg.html("User Email Already Exist")
                        msg.css('display', 'block');
                        $("#signupbtn").attr("disabled", "true");
                        
                    }else{
                        msg.html('')
                        $("#signupbtn").removeAttr("disabled");
                    }
                }
            })
           
        })
        $("#phone").blur(function(){
            
            var emailnphone=$("#phone").val();
            
            var msg=$("#phonemsg");
            $.ajax({
                url: "code.php",
                type: "POST",
                data: {emailnphone:emailnphone, do:"checkemailandphone"},
                success:function(res){
                   
                    if(res==1){
                        msg.html("User Phone Already Exist")
                        msg.css('display', 'block');
                        $("#signupbtn").attr("disabled", "true");
                        
                    }else{
                        msg.html('')
                        $("#signupbtn").removeAttr("disabled");
                    }
                }
            })
           
        })
        // $("#phone").blur(function(){
        //     var phone=$("#phone").val(); 
        //     var msg=$("#phonemsg");

        //     <?php
        //     $phone=$_GET['phone'];
        //     $result=$object->CheckEmail($phone);
        //     if(mysqli_num_rows($result)>0)
        //     {
        //           ?>
        //             msg.css("display","block")
        //             msg.css("color","red")
        //         <?php
        //     }
        //     ?>
        // })
    })
 

</script>



