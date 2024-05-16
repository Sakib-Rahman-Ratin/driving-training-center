<?php
ob_start();
session_start();

 include('./assets/template/header.php');


?>

	<script>
        // JavaScript code to update the clock in real-time
        function updateClock() {
            const clockField = document.getElementById("attendance_time");
            const now = new Date();
            const formattedTime = now.toLocaleTimeString();
            clockField.value = formattedTime;
        }

        // Update the clock every second
        setInterval(updateClock, 1000);

        // Initial update when the page loads
        updateClock();
    </script>
	
	
	
	
	 
	
	<?php 
	
	
				if(isset($_POST['submit'])){
				
			$attendance_time=$_POST['attendance_time'];
			$entry_by=$_SESSION['user'];
			$entry_at=date('Y-m-d H:i:s');
			$attendance_date=date('Y-m-d');
			$sql="Insert into attendance (user_id,attendance_time,entry_by,entry_at,attendance_date) values ('$entry_by','$attendance_time','$entry_by','$entry_at','$attendance_date')";
			if($conn->query($sql)==true)
			{
				echo "Attendance Successfully";
				
			}else{
				echo "Error".$sql."<br>".$conn->error;
			}
			
			
			//header('Location: attendance.php');
			}
	
	?>
	
	
	
	<div class="container-fluid">
		<div class="card ">
			<div class="card-head">
			
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="row bg-info">
						<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
							
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 p-2">
							
										
								<label>Attendance Time: </label>
							<input type="text" name="attendance_time" class="form-control" style="text-align:center" readonly="readonly" id="attendance_time"  value="<?php echo date("h:i:sa");?>" />	
								
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
							
							
							
						</div>
					</div>
				
				<div class="row">
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
						
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 pt-2" style="text-align:center">
						<input class="btn btn-danger" class="form-control" type="submit" name="submit" id="submit" style="height: 100px; width: 100px; border-radius: 50%;" value="PRESS">
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
						
					</div>
					</div>
				</form>
			</div>
		</div>
		
		
		
	</div>
	
	
	<br /><br />

<div class="container">
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Attendance Date</th>
                <th>Attendance Time</th>
                <th>Entry By</th>
                
            </tr>
        </thead>
		  <tbody>
			<?php 
			
			
				$sql2="select u.fname,a.entry_at,a.attendance_time,a.attendance_date,a.entry_by from attendance a,user_activity_management u where u.user_id=a.user_id and a.user_id='".$_SESSION['user']."' order by a.attendance_date desc";
				
				$query=mysqli_query($conn,$sql2);
				while($row=mysqli_fetch_object($query))
				{
			
			
			
			$t_sql='select * from user_activity_management where user_id="'.$row->entry_by.'"';
			$t_query=mysqli_query($conn,$t_sql);
			$t_all=mysqli_fetch_object($t_query);
			
			?>
			<tr>
				<td><?php echo $row->fname?></td>
				<td><?php echo $row->attendance_date?></td>
				<td><?php echo $row->attendance_time?></td>
				<td><?php echo $t_all->user_name?></td>
			</tr>
			
			<?php } ?>
		</tbody>
        <tfoot>
            <tr>
                <th>User Name</th>
                <th>Attendance Date</th>
                <th>Attendance Time</th>
                <th>Entry By</th>
                
            </tr>
        </tfoot>
    </table>
</div>



</div>











<?php include('./assets/template/footer.php')?>