<?php
session_start();
ob_start();
 ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


 include('./assets/template/header.php');
 
 ?>

<?php 


//Image file code


	// Insert Code
	
	if(isset($_POST['submit']))
	{
	
		$student_id=$_POST['student_id'];
		$m_name=$_POST['m_name'];
		$religion=$_POST['religion'];
		$phone=$_POST['phone'];
		$blood_group=$_POST['blood_group'];
		$admission_date=$_POST['admission_date'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$edu_qual=$_POST['edu_qual'];
		$email=$_POST['email'];
		$designation=$_POST['designation'];
		$f_name=$_POST['f_name'];
		$m_status=$_POST['m_status'];
		$dob=$_POST['dob'];
		$house_no=$_POST['house_no'];
		$police_station=$_POST['police_station'];
		$floor=$_POST['floor'];
		$district=$_POST['district'];
		$village=$_POST['village'];
		$district2=$_POST['district2'];
		$p_office=$_POST['p_office'];
		$p_station=$_POST['p_station'];
		$institute=$_POST['institute'];
		$nid=$_POST['nid'];
		$block=$_POST['block'];
		$road=$_POST['road'];
		$status=$_POST['status'];
		$expaired_date=$_POST['expaired_date'];
		$course_name=$_POST['course_name'];
		
		
		if(isset($_FILES['image']['name']))
		{
		
			//Upload the image
			//To upload image,we need image name and source path and destination path 
			$image_name=$_FILES['image']['name'];
			
			//Auto rename our image
			//Get the extension of our image(.jpg, .png,.gif etc) food.jpg
			
			$ext=end(explode('.',$image_name));
			
			$image_name="user".rand(000,999).'.'.$ext; //e.g Food_category_125
			
			$source_path=$_FILES['image']['tmp_name'];
			$destination="assets/img/user/".$image_name;
			
			//Finally upload the image
			$upload=move_uploaded_file($source_path,$destination);
			
			// Check whether the image is uploaded or not 
			//And if the image is not uploaded then we will step the process and Redirect with error message
			//if($upload==false)
			//{
				//Set message
			//	$_SESSION['upload']="<div class='error'>Failed to upload Image</div>";
				//Redirect to add category page
				//header('location:'.SITEURL.'admin/add-category.php');
				//Stop to the proccess
				//die();
			
			//}
		}
		else
		{
			//Don't upload image and set the image_name value as blank
			$image_name="";
		
		}

		
		
		
		
		  $sql="Insert into personnel_basic_info (unique_id ,s_name,f_name,m_name,gender,marital_status,religion,	edu_qual,institute_name,phone_no,email,dob,blood_group,national_id,image_name,admission_date,designation,pr_house_no,pr_flat_no,pr_block,pr_police_station	,pr_district,village,	post_office,police_station,district,road,status,expaired_date,course_name) values ('$student_id','$name','$f_name','$m_name','$gender','$m_status','$religion','$edu_qual','$institute','$phone','$email','$dob','$blood_group','$nid','$image_name','$admission_date','$designation','$house_no','$floor','$block','$police_station','$district','$village','$p_office','$p_station','$district2','$road','$status','$expaired_date','$course_name')";
		
				if ($conn->query($sql) === TRUE) {
			echo "record inserted successfully";
			header("Location:basic_info.php");
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
			
	}
	
	// after submitting for get id
	
	
	if(isset($_POST['sumitt']))
	{
	
 header("Location:basic_info.php?user_id=".$_POST['user_name']."");
 
 }
	// find all data 
 
	if($_GET['user_id']>0){	
  $get_user_id=$_GET['user_id']; 
   $sql="select * from personnel_basic_info where id=$get_user_id";
	
	$query=mysqli_query($conn,$sql);
	$all_data=mysqli_fetch_object($query);
	}
 
	
	
	
	
	//Update Code
	
	
	if(isset($_POST['update']))
	{
	$student_id=$_POST['student_id'];
		$m_name=$_POST['m_name'];
		$religion=$_POST['religion'];
		$phone=$_POST['phone'];
		$blood_group=$_POST['blood_group'];
		$admission_date=$_POST['admission_date'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$edu_qual=$_POST['edu_qual'];
		$email=$_POST['email'];
		$designation=$_POST['designation'];
		$f_name=$_POST['f_name'];
		$m_status=$_POST['m_status'];
		$dob=$_POST['dob'];
		$house_no=$_POST['house_no'];
		$police_station=$_POST['police_station'];
		$floor=$_POST['floor'];
		$district=$_POST['district'];
		$village=$_POST['village'];
		$district2=$_POST['district2'];
		$p_office=$_POST['p_office'];
		$p_station=$_POST['p_station'];
		$institute=$_POST['institute'];
		$nid=$_POST['nid'];
		$block=$_POST['block'];
		$road=$_POST['road'];
		$status=$_POST['status'];
		$expaired_date=$_POST['expaired_date'];
		$course_name=$_POST['course_name'];
		
		
		
		if(isset($_FILES['image']['name']))
		{
		
			//Upload the image
			//To upload image,we need image name and source path and destination path 
			$image_name=$_FILES['image']['name'];
			
			//Auto rename our image
			//Get the extension of our image(.jpg, .png,.gif etc) food.jpg
			
			$ext=end(explode('.',$image_name));
			
			$image_name="user".rand(000,999).'.'.$ext; //e.g Food_category_125
			
			$source_path=$_FILES['image']['tmp_name'];
			$destination="assets/img/basic_info/".$image_name;
			
			//Finally upload the image
			$upload=move_uploaded_file($source_path,$destination);
			
			// Check whether the image is uploaded or not 
			//And if the image is not uploaded then we will step the process and Redirect with error message
			//if($upload==false)
			//{
				//Set message
			//	$_SESSION['upload']="<div class='error'>Failed to upload Image</div>";
				//Redirect to add category page
				//header('location:'.SITEURL.'admin/add-category.php');
				//Stop to the proccess
				//die();
			
			//}
		}
		else
		{
			//Don't upload image and set the image_name value as blank
			$image_name="";
		
		}

		
		
		 $update="update personnel_basic_info set unique_id='".$student_id."',s_name='".$name."',f_name='".$f_name."',m_name='".$m_name."',gender='".$gender."',marital_status='".$m_status."',religion='".$religion."',	edu_qual='".$edu_qual."',institute_name='".$institute."',phone_no='".$phone."',email='".$email."',dob='".$dob."',blood_group='".$blood_group."',national_id='".$nid."',admission_date='".$admission_date."',designation='".$designation."',pr_house_no='".$house_no."',pr_flat_no='".$floor."',pr_block='".$block."',pr_police_station='".$police_station."',pr_district='".$district."',village='".$village."',post_office='".$p_office."',police_station='".$p_station."',district='".$district2."',road='".$road."',status='".$status."',image_name='".$image_name."',expaired_date='".$expaired_date."',course_name='".$course_name."' where id='".$_GET['user_id']."'";
		
		
		
		if($conn->query($update) === TRUE)
		{
			echo "Update Successfully";
			header('Location: basic_info.php');
		}else{
		
			echo "Error".$query2."<br>".$conn->error;
		}
	
	
	}
	
	
	
	
	
  
  
?>
 
<div class="form-container_large">

	<form action="" method="post" enctype="multipart/form-data">
	<div class="container-fluid pb-2 pt-3 ">
			<div class="row m-0 p-0 pt-3 pb-2"  style="background:#24cbac;">
				<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 ">
					<div class="form-group row m-0 pb-1">
						<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1 label-align" style="color:white">Name :</label>
						<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
							<input list="names" type="text" id="user_name" name="user_name" class="form-control" />
							
							<datalist id="names">
								<option></option>
								<?php 
										$sql="select id, s_name from personnel_basic_info where 1";
										$res=mysqli_query($conn,$sql);
										while($row=mysqli_fetch_object($res))
										{
								  
								  ?>
								 
										<option value="<?php echo $row->id?>"><?php echo $row->s_name;?></option>
										
										
										<?php } ?>
							
							</datalist>
							
								
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-md-4 col-xl-4 col-lg-4 d-flex justify-content-start align-items-center">
					<input type="submit" name="sumitt" class="btn1 btn1-bg-submit btn-align" />
				</div>
			</div>
		</div>
	</form>
	<div class="container-fluid pb-1 pt-3">
			<div class="row m-0 p-0">
				<div class="col-sm-12 col-md-12 col-xl-12 col-lg-12" style="background:#066A61;">
					<h4 style="text-align:center; padding:10px; color:white;"> Basic Information</h4>
				</div>
			</div>
		</div>
</div>


<div class="container-fluid">
	<div class="card">
		
		
		
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row  p-0 m-0" style="background-color:#d1e5f7;">
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<div class="mb-2">
					  <label for="Name" class="form-label">Student Id</label>
					  <input type="text" class="form-control" id="student_id" readonly="readonly" name="student_id" value="<?php echo $all_data->id;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Mohter's Name</label>
					  <input type="text" class="form-control" id="m_name" name="m_name" value="<?php echo $all_data->m_name;?>" >
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Religion</label>
					  <select type="text" class="form-control" id="religion" name="religion" >
					  	<option value="<?php echo $all_data->religion;?>"><?php echo $all_data->religion;?></option>
						<option value="Muslim">Muslim</option>
						<option value="Hindu">Hindu</option>
						<option value="Buddo">Buddo</option>
						<option value="Christian">Christian</option>
						<option value="Other">Other</option>
						</select>
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Phone No</label>
					  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $all_data->phone_no;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Blood Group</label>
					  <select type="text" class="form-control" id="blood_group" name="blood_group" >
					  	<option value="<?php echo $all_data->blood_group;?>"><?php echo $all_data->blood_group;?></option>
						<option value="O(+)">O(+)</option>
						<option value="O(-)">O(-)</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					  </select>
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Admission /Joining Date</label>
					  <input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo $all_data->admission_date;?>">
					</div>
					
					<div class="mb-2">
					  <label for="Name" class="form-label">Course Name: </label>
					  		<select id="course_name" name="course_name" class="form-control">
								<option><?php echo $all_data->course_name;?></option>
								<option value="Car Driving">Car Driving</option>
								<option value="Motor Cycle Driving">Motor Cycle Driving</option>
							
							</select>
					</div>
					</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<div class="mb-2">
					  <label for="Name" class="form-label">Name</label>
					  <input type="text" class="form-control" id="name" name="name" value="<?php echo $all_data->s_name;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Gender</label>
					  <select type="text" class="form-control" id="gender" name="gender" >
					  	<option value="<?php echo $all_data->gender;?>"><?php echo $all_data->gender;?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					  </select>
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Educational Qualification</label>
					  <select type="text" class="form-control" id="edu_qual" name="edu_qual">
					  	<option value="<?php echo $all_data->edu_qual;?>"><?php echo $all_data->edu_qual;?></option>
						<option value="JSC">JSC</option>
						<option value="SSC">SSC</option>
						<option value="HSC">HSC</option>
						<option value="Honours">Honour's</option>
						<option value="Masters">Master's</option>
						<option value="Other">Other</option>
					  </select>
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Email</label>
					  <input type="text" class="form-control" id="email" name="email" value="<?php echo $all_data->email;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">National ID</label>
					  <input type="text" class="form-control" id="nid" name="nid" value="<?php echo $all_data->national_id?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Designation</label><?php echo $all_data->designation?>
					  <select  class="form-control" id="designation" name="designation">
					  
					  		<?php if($all_data->id>0) { ?>
					  	<option><?php echo $all_data->designation?></option>
					  	<?php } else {?>
						
						<option></option>
						
						<?php } ?>
						<option value="Trainee">Trainee</option>
						<option value="Trainer">Trainer</option>
						<option value="Administrator">Administrator</option>
						
					  </select>
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Course Expaired Date</label>
					  <input type="date" class="form-control" id="expaired_date" name="expaired_date" value="<?php echo $all_data->expaired_date;?>">
					</div>
				
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<div class="mb-2">
					  <label for="Name" class="form-label">Father's Name</label>
					  <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo $all_data->f_name;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Marital Status</label>
					  <select type="text" class="form-control" id="m_status" name="m_status">
					  	<option value="<?php echo $all_data->marital_status;?>"><?php echo $all_data->marital_status;?></option>
						<option value="YES">YES</option>
						<option value="YES">NO</option>
					  </select>
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Institute Name</label>
					  <input type="text" class="form-control" id="institute" name="institute" value="<?php echo $all_data->institute_name;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Date of Birth</label>
					  <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $all_data->dob;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Picture Upload</label>
					  <input type="file" id="image" name="image" class="form-control" value="<?php echo $all_data->image_name?>" />
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Status</label>
					  <select class="form-control" id="status" name="status">
					  		<option><?php echo $all_data->status?></option>
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
					  </select>
					</div>
				</div>
		
			</div>
			
		<div class="row m-0 p-0">
				<div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 " style="background:#066A61;">
					<h4 style="text-align:center; padding:10px; color:white;"> Present Address</h4>
				</div>
		</div>
		<div class="row m-0 p-0" style="background-color:#d1e5f7;">
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<div class="mb-2">
					  <label for="Name" class="form-label">House No</label>
					  <input type="text" class="form-control" id="house_no" name="house_no" value="<?php echo $all_data->pr_house_no;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Road No</label>
					  <input type="text" class="form-control" id="road" name="road" value="<?php echo $all_data->road;?>">
					</div>
					
					
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<div class="mb-2">
					  <label for="Name" class="form-label">Flat/Floor</label>
					  <input type="text" class="form-control" id="floor" name="floor" value="<?php echo $all_data->pr_flat_no;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">Police Station</label>
					  <input type="text" class="form-control" id="police_station" name="police_station" value="<?php echo $all_data->pr_police_station;?>">
					</div>
					
					
				
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<div class="mb-2">
					  <label for="Name" class="form-label">Block</label>
					  <input type="text" class="form-control" id="block" name="block" value="<?php echo $all_data->pr_block;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">District</label>
					  <input type="text" class="form-control" id="district" name="district" value="<?php echo $all_data->pr_district;?>">
					</div>
				
				</div>
		
			</div>
		
		
			<div class="row m-0 p-0">
				<div class="col-sm-12 col-md-12 col-xl-12 col-lg-12" style="background:#066A61;">
					<h4 style="text-align:center; padding:10px; color:white;"> Parmanent Addess</h4>
				</div>
			</div>
			<div class="row m-0 p-0" style="background-color:#d1e5f7;">
				<div class="col-sm-4">
					<div class="mb-2">
					  <label for="Name" class="form-label text-color">Village</label>
					  <input type="text" class="form-control" id="village" name="village" value="<?php echo $all_data->village;?>">
					</div>
					<div class="mb-2">
					  <label for="Name" class="form-label">District</label>
					  <input type="text" class="form-control" id="district2" name="district2" value="<?php echo $all_data->district;?>">
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="mb-2">
					  <label for="Name" class="form-label">Post Office</label>
					  <input type="text" class="form-control" id="p_office" name="p_office" value="<?php echo $all_data->post_office;?>">
					</div>
					
				
				</div>
				<div class="col-sm-4">
					<div class="mb-2">
					  <label for="Name" class="form-label">Police Station</label>
					  <input type="text" class="form-control" id="p_station" name="p_station" value="<?php echo $all_data->police_station;?>">
					</div>
					
				
				</div>
		
			</div>
			
		
		<div class="row">
			<?php if($get_user_id>0){?>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-grid" style="text-align:center">
				<input type="submit" class="btn btn-block" style="background-color:#24cbac; color:white;" name="update" value="Update" style="font-size:18px;">
			</div>
			<?php } else {?>
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-grid" style="text-align:center">
				<input type="submit" class="btn btn-success btn-block " name="submit" value="Submit" style="font-size:18px;">
			</div>
			
			<?php } ?>
		</div>
		</form>
	</div>
</div>


<?php include('./assets/template/footer.php')?>