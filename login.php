
<?php
 include('./assets/support/css.php');
ob_start();
session_start();


include('./assets/support/db_connection.php');

?>
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
  
  <?php 
  
  
  
if(isset($_POST['login']))
{
	 $username=$_POST['user_name'];
	 $pass=$_POST['password'];
	 $user_id=$_POST['user_id'];
	 

	// SQL to check whether the username and password matched or Not 
	
	echo $sql= "Select user_id,user_name,password from user_activity_management 
	where user_name='$username' AND password='$pass' and status='Active'
	";
	
	$res=mysqli_query($conn,$sql);
	$all_login_data=mysqli_fetch_object($res);
	if($res==true)
	{
	$count=mysqli_num_rows($res);
		if($count==1)
		{
			
			$_SESSION['user']=$all_login_data->user_id;  //To check the whether in logged in or Not and logout will unset it.
			
			$_SESSION['user-log']= $username;
			header('location:index.php');
		
		}
		else
		{
		
			header('Location: login.php');
			session_destroy();
 
			
		}
	
	}
}


		
  
  
  ?>
  

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          R.S Driving <br />
          <span style="color: hsl(218, 81%, 75%)">Training Centre</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
		  
        </p>
      </div>
		
	
      <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass" style="width:350px;">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="login.php" method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              

              <!-- Email input -->
              <div class="form-group mb-3">
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" />
				<input type="hidden" name="user_id" id="user_id" class="form-control" />
                <!--<label class="form-label" for="user_name">User Name</label>-->
              </div>

              <!-- Password input -->
              <div class="form-group mb-2">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                <!--<label class="form-label" for="password">Password</label>-->
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-2">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                  Remember me
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" name="login" id="login" class="btn btn-primary  btn-block mb-4" style="width:250px" >
                Login
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Design Block -->