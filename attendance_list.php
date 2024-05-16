<?php
ob_start();
session_start();
 include('./assets/template/header.php');
 
 ?>
 <?php 
 
 

 if(isset($_POST['Search']))
	{
	
	 $sql="select u.fname,a.entry_at,a.attendance_time,a.entry_by,a.attendance_date from attendance a,user_activity_management u where u.user_id=a.user_id and a.attendance_date between '".$_POST['f_date']."' and '".$_POST['t_date']."' ";
	
	$query=mysqli_query($conn,$sql);
	
	}
 

 ?>
 	<div class="container" >
	
			<div class="card">
		<div class="card-header" style="background:#CDEBE5;">
		  	<form action="" method="post">
				<div class="row p-2">
				
				<div class="col-sm-8">
					<div class="input-group mb-2">
						<label class="p-2 text-dark">Date Interval</label>
					  <input type="date" name="f_date" id="f_date" class="form-control" value="<?php echo date('Y-m-01');?>" >
					  <label class="p-2 text-dark">To</label>
					  <input type="date" name="t_date" id="t_date" class="form-control" value="<?php echo date('Y-m-d');?>">
					  
					</div>
					
					
				</div>
				<div class="col-sm-2  ">
					<input type="submit" name="Search" value="Search" class=" btn1 btn1-bg-submit" />
				</div>
				
				
			</div>
			
			</form>
		</div>
		
		<br /><br />
	
<div class="container-fluid">
	<table class="display table table-primary table-hover table-striped" style="width:100%">
        
            <tr>
				<th style="font-weight:bold; font-size:16px;">Serial No</th>
                <th style="font-weight:bold; font-size:16px;">Attendance Date</th>
                <th style="font-weight:bold; font-size:16px;">Student Name</th>
                <th style="font-weight:bold; font-size:16px;">Attendance Time</th>
                <th style="font-weight:bold; font-size:16px;">Entry By</th>
                
            </tr>
      
		<?php 
			
			$s=1;
			//$query=mysqli_query($conn,$sql);
			
			while($row=mysqli_fetch_object($query)){
		
		
		$t_sql='select * from user_activity_management where user_id="'.$row->entry_by.'"';
		$t_query=mysqli_query($conn,$t_sql);
		$t_all=mysqli_fetch_object($t_query);
		?>
		
      
            <tr>
				 <td><?php echo $s++;?></td>
                <td><?php echo $row->fname?></td>
                <td><?php echo $row->attendance_date?></td>
                <td><?php echo $row->attendance_time?></td>
                <td><?php echo $t_all->user_name?></td>
                
            </tr>
            
        
		<?php } ?>
	
        
    </table>

		</div>
	
	</div>
	
	
	
	
	
	
	
	
	</div>

 
 
 
 
 
 
 
 
 
 <?php include('./assets/template/footer.php')?>