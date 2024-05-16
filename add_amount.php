<?php
ob_start();
session_start();

 include('./assets/template/header.php');


 
 ?>


<?php



if(isset($_POST['submit']))

{


 $payment_date=$_POST['payment_date'];
 $user_id=$_POST['user_id'];
 $op_amount=$_POST['op_amount'];
 $paid_amt=$_POST['paid_amt'];
 $entry_by=$_SESSION['user'];
 $entry_at=date('Y-m-d H:i:s');

 $sql2="Insert into payment (user_id,payment_date,opening_amt,paid_amt,entry_by,entry_at) values ('$user_id','$payment_date','$op_amount','$paid_amt','$entry_by','$entry_at')";
$query=mysqli_query($conn,$sql2);


header('Location:add_amount.php');
}



?>






<div class="form-container_large">

	<div class="container-fluid pb-1 pt-3">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 bg-info">
					<h4 style="text-align:center; padding:10px; color:white;"> Payment Add</h4>
				</div>
			</div>
		</div>

	<form action="" method="post">
		<div class="container-fluid bg-form-titel">
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="container n-form2">
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1">Payment Date :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input type="date" class="form-control" id="payment_date" name="payment_date"  required="required">
								</div>
							</div>
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1">Student Name :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input list="user_ids" type="text" name="user_id" id="user_id" class="form-control" required="required" />
									<datalist id="user_ids" name="user_id">
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
					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<div class="container n-form2">
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1">Total Amount :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input type="text" class="form-control" id="op_amount" name="op_amount">
								</div>
							</div>
							<div class="form-group row m-0 pb-1">
								<label class="col-sm-4 col-md-4 col-xl-4 col-lg-4 m-0 label-input align-items-center pr-1">Paid Amount :</label>
								<div class="col-sm-8 col-md-8 col-xl-8 col-lg-8 pr-2">
									<input type="text" class="form-control" id="paid_amt" name="paid_amt" required="required">
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="n-form-btn-class">
					<input type="submit" name="submit" value="Submit" class="btn1 btn1-bg-submit" />
				</div>
		</div>
	</form>
	
	<br /><br /><br />
	
	<div class="container">
		<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
				<th>User ID</th>
                <th>Student Name</th>
				<th>Payment Date</th>
                <th>Payable Amount</th>
                <th>Paid Amount</th>
                <th>Receipt By</th>
				
                
            </tr>
        </thead>
		<tbody>
		<?php 
		$s=1;
		$sql=" Select * from payment p,user_activity_management u where u.user_id=p.user_id order by u.user_id";
		$query=mysqli_query($conn,$sql);
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
                <td><a href="money_receipt.php?user_id=<?php  echo $row->user_id;?>&payment_date=<?php echo $row->payment_date?>&paid_amount=<?php echo $row->paid_amt;?>&user_name=<?php echo $t_all->user_name;?>"><?php echo $row->paid_amt?></a></td>
              
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
                <th>Payable Amount</th>
                <th>Paid Amount</th>
                <th>Receipt By</th>
				
                
            </tr>
        </tfoot>
    </table>

</div>
</div>




<?php include('./assets/template/footer.php');?>