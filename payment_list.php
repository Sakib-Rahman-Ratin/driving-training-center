
<?php 
ob_start();
session_start();

include('./assets/template/header.php')?>

<?php 

	if(isset($_POST['Search']))
	{
	
	 $sql=" Select * from payment p,user_activity_management u where u.user_id=p.user_id and p.payment_date between '".$_POST['f_date']."' and '".$_POST['t_date']."' order by u.user_id";
	
	$query=mysqli_query($conn,$sql);
	
	}


?>

<div class="container-fluid">
	<div class="card">
		<div class="card-header" style="background:#CDEBE5;">
		  	<form action="" method="post">
				<div class="row p-2">
				
				<div class="col-sm-8">
					<div class="input-group mb-2">
						<label class="p-2 text-dark">Date Interval</label>
					  <input type="date" name="f_date" id="f_date" class="form-control" >
					  <label class="p-2 text-dark">To</label>
					  <input type="date" name="t_date" id="t_date" class="form-control">
					  
					</div>
					
				</div>
				<div class="col-sm-2 ">
					<input type="submit" name="Search" value="Search" class=" btn1 btn1-bg-submit" />
				</div>
				
				
			</div>
			
			</form>
		</div>
		
		<br /><br />
		<div class="card-body">
<div class="container">
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>User ID</th>
                <th>Student Name</th>
				 <th>Payment Date</th>
                <th>Total Amount</th>
				<th>Paid Amount</th>
				<th>Receipt By</th>
                
            </tr>
        </thead>
		  <tbody>
		<?php 
		$s=1;
		
		//$query=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_object($query))
		{
		
			$t_sql='select * from user_activity_management where user_id="'.$row->entry_by.'"';
		$t_query=mysqli_query($conn,$t_sql);
		$t_all=mysqli_fetch_object($t_query);
		
		?>
        
            <tr>
                <td><?php echo $s++;?></td>
                <td><?php echo $row->user_id;?></td>
                <td><?php echo $row->fname;?></td>
				<td><?php echo $row->payment_date;?></td>
                <td><?php  echo $row->opening_amt?></td>
                <td><?php echo $row->paid_amt; $tot_paid+=$row->paid_amt?></td>
              
				<td><?php echo $t_all->user_name?></td>
            </tr>
            
           
        
		
		<?php } ?>
		</tbody>
        <tfoot>
            <tr>
                <th>SL</th>
                <th>User ID</th>
                <th>Student Name</th>
				<th>Payment Date</th>
                <th>Total Amount</th>
				<th style="color:red;">Paid Amount= <?php echo $tot_paid;?></th>
				<th>Receipt By</th>
                
            </tr>
        </tfoot>
    </table>
</div>
		</div>
	
	</div>
</div>

<?php include('./assets/template/footer.php')?>