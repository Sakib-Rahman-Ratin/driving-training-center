
<?php 

ob_start();
//session_start();
error_reporting(0);




 $sql="select * from user_activity_management where user_id='".$_SESSION['user']."'";
	
	$query=mysqli_query($conn,$sql);
	$all_data_user=mysqli_fetch_object($query);

	

?>



<div class="dashboard-nav">
				
				
            <header>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <a href="index.php" class="brand-logo"><img src="./assets/img/logo/rs.png"  width="35%" style="margin-left:55px;"></a>
            </header>

            <nav class="dashboard-nav-list">
                <a href="index.php" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i> dashboard
            </a>
				<?php if($all_data_user->designation=='Trainee') { ?>
				
				
				<div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-users"></i> Attdendance </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="attendance.php"
                                                                class="dashboard-nav-dropdown-item">Attdendance</a>
								
							<a
                            href="ind_schedule_list.php"
                            class="dashboard-nav-dropdown-item">Schedule List</a></div>
                </div>
				
				<?php } else { ?>
				
				
				
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-photo-video"></i> Basic Info </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="basic_info.php"
                                                                class="dashboard-nav-dropdown-item">Basic Information</a><a
                            href="student_list.php" class="dashboard-nav-dropdown-item">Trainee List</a><a
                            href="trainer_list.php" class="dashboard-nav-dropdown-item">Trainer List</a><a
                            href="inactive_user.php" class="dashboard-nav-dropdown-item">Inactive User</a></div>
                </div>
				
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-users"></i> Attdendance </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="attendance.php"
                                                                class="dashboard-nav-dropdown-item">Attdendance</a>
																
															
																<a href="attendance_list.php"
                                                                class="dashboard-nav-dropdown-item">Attdendance List</a>
																
																<a
                            href="schedule.php" class="dashboard-nav-dropdown-item">Schedule</a>
							
							<a
                            href="schedule_list.php"
                            class="dashboard-nav-dropdown-item">Schedule List</a></div>
                </div>
					
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-money-check-alt"></i> Payments </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="add_amount.php"
                                                                class="dashboard-nav-dropdown-item">Payment</a><a
                            href="payment_list.php" class="dashboard-nav-dropdown-item">Payment List</a>
                    </div>
                </div>
				
               <!-- <a href="money_receipt.php" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Money Receipt </a>--><a
                        href="login_control.php" class="dashboard-nav-item"><i class="fas fa-user"></i> Profile </a>
              <div class="nav-item-divider"></div>
			  <?php } ?>
			  
              <a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
