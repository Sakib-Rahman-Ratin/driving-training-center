<?php
ob_start();
session_start();
 include('./assets/template/header.php');
 
 ?>

 	
	
	
<div class="container">

	<div class="container-fluid pb-1 pt-3">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 bg-info">
					<h4 style="text-align:center; padding:10px; color:white;"> Daily Schedule</h4>
				</div>
			</div>
		</div>

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
			
			 $sql="select * from schedule s,user_activity_management u where u.user_id='".$_SESSION['user']."' and u.user_id=s.user_id";
			$query=mysqli_query($conn,$sql);
			
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
	

 
 
 
 <?php include('./assets/template/footer.php')?>