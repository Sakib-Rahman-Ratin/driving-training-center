<?php
ob_start();
session_start();
 include('./assets/template/header.php');
 
 ?>
  
  
  
 <?php 
 
 if(isset($_POST['submit']))
 
 {
  $sch_date=$_POST['sch_date'];
 $user_id=$_POST['user_id'];
 $trainer_id=$_POST['trainer_id'];
 $t_time=$_POST['t_time'];
 $entry_by=$_SESSION['user'];
 $entry_at=date('Y-m-d h:i:sa');
 
  $sql2="Insert into schedule (schedule_date,trainer_id,user_id,entry_by,entry_at,schedule_time) values ('$sch_date','$trainer_id','$user_id','$entry_by','$entry_at','$t_time')";
 
 $query=mysqli_query($conn,$sql2);
 header('Location:schedule.php');
 }
 ?>



<div class="form-container_large">

		<div class="container-fluid pb-1 pt-3">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 bg-info">
					<h4 style="text-align:center; padding:10px; color:white;"> Daily Schedule</h4>
				</div>
			</div>
		</div>


		



		<form action="" method="post">
			<!--        top form start hear-->
			<div class="container-fluid bg-form-titel">
				<div class="row">
					<!--left form-->
					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="container n-form2">
							<div class="form-group row m-0 pb-1">
							  <label for="sch_date" class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1">Schedule Date:</label>
							  <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8  pr-2 ">
									<input name="sch_date" type="date" id="sch_date" class="form-control" required="required">
								</div>
							</div>

							<div class="form-group row m-0 pb-1">
								<label for="oi_date" class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1">Student Name:</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input list="user_ids" name="user_id" type="text" id="user_id" class="form-control" required="required">
									<datalist  id="user_ids">
							   		<option></option>
							  <?php 
							  		$sql="select user_id, fname from user_activity_management where designation='Trainee' and status='Active'";
									$res=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_object($res))
									{
							  
							  ?>
							 
							  		<option value="<?php echo $row->user_id?>"><?php echo $row->fname;?></option>
									
									
									<?php } ?>
							  </datalist>
								</div>
							</div>

						
						</div>

					</div>

					<!--Right form-->
					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="container n-form2">
							<div class="form-group row m-0 pb-1">
							    <label for="oi_subject" class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1">Trainer Name:</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									 <input list="trainer_ids" name="trainer_id" type="text" id="trainer_id" class="form-control" required="required">
									 <datalist id="trainer_ids" >
							   		<option></option>
							  <?php 
							  		$sql="select user_id, fname from user_activity_management where designation='Trainer' and status='Active'";
									$res=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_object($res))
									{
							  
							  ?>
							 
							  		<option value="<?php echo $row->user_id?>"><?php echo $row->fname;?></option>
									
									
									<?php } ?>
							  </datalist>
								</div>
							</div>
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1">Training Time:</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
								<input type="time" class="form-control" id="t_time" name="t_time" required="required">
								</div>
							</div>
							


						</div>



					</div>


				</div>

			  <div class="n-form-btn-class">
				      <input name="submit" type="submit" class="btn1 btn1-bg-submit" value="Submit">
				</div>

			</div>

		</form>
<br /><br />

<div class="container">
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Schedule Date</th>
                <th>Student Name</th>
                <th>Training Time</th>
                <th>Trainer Name</th>
                
            </tr>
        </thead>
		  <tbody>
		<?php 
			
			$sql="select u.fname,s.schedule_date,s.schedule_time,s.user_id,s.trainer_id from schedule s,user_activity_management u where u.user_id=s.user_id ";
			$query=mysqli_query($conn,$sql);
			
			while($row=mysqli_fetch_object($query)){
		
		
		$t_sql='select * from user_activity_management where user_id="'.$row->trainer_id.'"';
		$t_query=mysqli_query($conn,$t_sql);
		$t_all=mysqli_fetch_object($t_query);
		?>
		
      
            <tr>
                <td><?php echo $row->schedule_date?></td>
                <td><?php echo $row->fname?></td>
                <td><?php echo $row->schedule_time?></td>
                <td><?php echo $t_all->fname?></td>
                
            </tr>
            
        
		<?php } ?>
		</tbody>
        <tfoot>
            <tr>
                <th>Schedule Date</th>
                <th>Student Name</th>
                <th>Training Time</th>
                <th>Trainer Name</th>
            </tr>
        </tfoot>
    </table>
</div>



</div>







<?php include('./assets/template/footer.php')?>