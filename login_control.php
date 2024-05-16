
<?php 
ob_start();
session_start();
error_reporting(0);
include('./assets/template/header.php')?>
 
 
 
 
 
 
 

<?php
//Image file code
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

//Insert Code



if(isset($_POST['submit']))
{

 $user_name=$_POST['user_name'];
 $password=$_POST['password'];
 $fname=$_POST['fname'];
 $status=$_POST['status'];
$unique_id=$_POST['unique_id'];
$designation=$_POST['designation'];
$entry_by=$_SESSION['user'];
$entry_at=date('Y-m-d H:i:s');



$sql22="select * from user_activity_management where unique_id='".$_POST['unique_id']."'";
$query=mysqli_query($conn,$sql22);

$all_datas=mysqli_fetch_object($query);

if($all_datas->unique_id==$_POST['unique_id'])

{

echo "This User Exists";


}else{

$sql="Insert into user_activity_management (user_name,fname,password,unique_id,status,designation,image_name,entry_by,entry_at) values ( '".$user_name."','".$fname."','".$password."','".$unique_id."','".$status."','".$designation."','".$image_name."','".$entry_by."','".$entry_at."')";



if ($conn->query($sql) === TRUE) {
    echo "record inserted successfully";
header("Location:login_control.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

}
//if($_GET['user_id']>0)
//{

$sql2="select * from user_activity_management where user_id='".$_GET['user_id']."'";
$query=mysqli_query($conn,$sql2);

$all_data=mysqli_fetch_object($query);

//}
//Update user




 $get_user=$_GET['user_id'];

if(isset($_POST['update']))
{

 $get_user=$_POST['user_id'];


$user_name=$_POST['user_name'];
 $password=$_POST['password'];
 $fname=$_POST['fname'];
 $status=$_POST['status'];
$unique_id=$_POST['unique_id'];
$designation=$_POST['designation'];
$entry_by=$_SESSION['user'];
$entry_at=date('Y-m-d H:i:s');

	 $update="Update user_activity_management set user_name='".$user_name."',password='".$password."',fname='".$fname."',status='".$status."',image_name='".$image_name."',
	entry_by='".$entry_by."',designation='".$designation."' where user_id='".$get_user."' ";
	
	if ($conn->query($update) === TRUE) {
    echo "Update successfully";
header("Location:login_control.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}





?>







	<div class="container-fluid pb-1 pt-3">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 bg-info">
					<h4 style="text-align:center; padding:10px; color:white;"> Profile Create</h4>
				</div>
			</div>
	</div>

	<form action="login_control.php" method="post" enctype="multipart/form-data">
		<div class="container-fluid bg-form-titel">
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="container n-form2">
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0   label-input align-items-center pr-1">User Name:</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2 ">
									<input type="text" id="user_name" name="user_name" class="form-control" required="required" value="<?php echo $all_data->user_name?>" />
									<input type="hidden" id="user_id" name="user_id" class="form-control" value="<?php echo $_GET['user_id'];?>" />
						 			
								</div>
							</div>
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0   label-input align-items-center pr-1">Password :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input type="password" id="password" name="password" class="form-control"  value="<?php echo $all_data->password?>"/>
								
								</div>
							</div>
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0   label-input align-items-center pr-1">Designation :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<select id="designation" name="designation" class="form-control">
										<option value="<?php echo $all_data->designation?>"><?php echo $all_data->designation?></option>
										<option value="Trainee">Trainee</option>
										<option value="Trainer">Trainer</option>
										<option value="Administrator">Administrator</option>
								  </select>
								
								</div>
							</div>
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0   label-input align-items-center pr-1">Status :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<select id="status" name="status" class="form-control">
										<option value="<?php echo $all_data->status?>"><?php echo $all_data->status?></option>
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
						 			 </select>
								
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="container n-form2">
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0   label-input align-items-center pr-1">Full Name :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input type="text" id="fname" name="fname" class="form-control" value="<?php echo $all_data->fname?>" />
								</div>
							</div>
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0   label-input align-items-center pr-1">Unique ID :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input list="names" type="text" id="unique_id" name="unique_id" class="form-control" required="required" />
							
									<datalist id="names">
										<option value="<?php echo $all_data->unique_id?>"> <?php echo $all_data->unique_id?></option>
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
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0   label-input align-items-center pr-1">User Picture :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input type="file" id="image" name="image" class="form-control" />
								
								</div>
							</div>
							<br /><br />
							<!--<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0   label-input align-items-center pr-1">Password :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input type="text" id="password" name="password" class="form-control" />
								
								</div>
							</div>-->
						</div>
					</div>
				</div>
				
				<div class="n-form-btn-class">
				<?php 
					if($_GET['user_id']>0){
					
					
					?>
					<input type="submit" name="update" value="Update" class="btn1 btn1-bg-submit" />
					
					<?php } else {?>
					
					<input type="submit" name="submit" value="Submit" class="btn1 btn1-bg-submit" />
					
					<?php } ?>
				</div>
		</div>
	</form>



<br /><br />


<div class="container">
		<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
				<th>User ID</th>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Designation</th>
                <th>Status</th>
				<th>User Image</th>
				<th>Action</th>
                
            </tr>
        </thead>
		<tbody>
		<?php 
		$s=1;
		$sql=" Select * from user_activity_management where status='Active'";
		$query=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_object($query))
		{
		
		?>
        
            <tr>
                <td><?php echo $s++;?></td>
                <td><?php echo $row->user_id;?></td>
                <td><?php echo $row->user_name;?></td>
                <td><?php  echo $row->fname?></td>
                <td><?php echo $row->designation?></td>
                <td><?php echo $row->status?></td>
				<?php if($row->image_name!=''){?>
				 <td><img src="assets/img/user/<?php echo $row->image_name;?>" width="50px" height="50px" /></td>
				 <?php } else { ?> <td>Empty Image</td> <?php } ?>
				 
				<td><a href="login_control.php?user_id=<?php echo $row->user_id?>"><input type="submit" name="update_user" id="update_user" value="Update" class="btn2 btn2-bg-submit"></a></td>
            </tr>
            
           
        
		
		<?php } ?>
		</tbody>
        <tfoot>
            <tr>
                <th>SL</th>
				<th>User ID</th>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Designation</th>
                <th>Status</th>
				<th>User Image</th>
				<th>Action</th>
                
            </tr>
        </tfoot>
    </table>

</div>


		
<?php include('./assets/template/footer.php')?>