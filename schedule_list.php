<?php
ob_start();
session_start();
 include('./assets/template/header.php');
 
 ?>
 <?php 
 
 

 if(isset($_POST['Search']))
	{
	
		if($_POST['trainer_id']>0)
		{
		
			 $sql="select u.fname,s.schedule_date,s.schedule_time,s.user_id,s.trainer_id from schedule s,user_activity_management u where u.user_id=s.user_id and s.schedule_date between '".$_POST['f_date']."' and '".$_POST['t_date']."' and s.trainer_id='".$_POST['trainer_id']."' ";
	
	$query=mysqli_query($conn,$sql);
	
	}else{
	
	
		 $sql="select u.fname,s.schedule_date,s.schedule_time,s.user_id,s.trainer_id from schedule s,user_activity_management u where u.user_id=s.user_id and s.schedule_date between '".$_POST['f_date']."' and '".$_POST['t_date']."' ";
	
	$query=mysqli_query($conn,$sql);
	
	}
		
	
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
					<div class="input-group mb-2">
						<label class="p-2 text-dark">Trainer Name</label>
					  <input list="trainer_ids" name="trainer_id" type="text" id="trainer_id" class="form-control">
							<datalist id="trainer_ids" >
							   		<option></option>
							  <?php 
							  		$sql="select user_id, fname from user_activity_management where designation='trainer' and status='Active'";
									$res=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_object($res))
									{
							  
							  ?>
							 
							  		<option value="<?php echo $row->user_id?>"><?php echo $row->fname;?></option>
									
									
									<?php } ?>
						 </datalist>
					  
					</div>
					
				</div>
				<div class="col-sm-2 pt-4 ">
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
                <th style="font-weight:bold; font-size:16px;">Schedule Date</th>
                <th style="font-weight:bold; font-size:16px;">Student Name</th>
                <th style="font-weight:bold; font-size:16px;">Training Time</th>
                <th style="font-weight:bold; font-size:16px;">Trainer Name</th>
                
            </tr>
      
		<?php 
			
			$s=1;
			//$query=mysqli_query($conn,$sql);
			
			while($row=mysqli_fetch_object($query)){
		
		
		$t_sql='select * from user_activity_management where user_id="'.$row->trainer_id.'"';
		$t_query=mysqli_query($conn,$t_sql);
		$t_all=mysqli_fetch_object($t_query);
		?>
		
      
            <tr>
				 <td><?php echo $s++;?></td>
                <td><?php echo $row->schedule_date?></td>
                <td><?php echo $row->fname?></td>
                <td><?php echo $row->schedule_time?></td>
                <td><?php echo $t_all->fname?></td>
                
            </tr>
            
        
		<?php } ?>
	
        
    </table>

		</div>
	
	</div>
	
	
	
	
	
	
	
	
	</div>

 
 
 
 
 
 
 
 
 
 <?php include('./assets/template/footer.php')?>