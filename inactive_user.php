<?php 
ob_start();
session_start();
include('./assets/template/header.php');

?>




<div class="form-container_large">
	<div class="container-fluid pb-1 pt-3">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xl-12 col-lg-12" style="background:#066A61;">
					<h4 style="text-align:center; padding:10px; color:white;"> Inactive User Information</h4>
				</div>
			</div>
		</div>

<br /><br />
	<div class="container-fluid">
		<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
				<th>User ID</th>
                <th>Full Name</th>
                <th>Designation</th>
                <th>Date of Birth</th>
                <th>Admission Date</th>
				<th>Phone No</th>
				<th>User Image</th>
                
            </tr>
        </thead>
		<tbody>
		<?php 
		$s=1;
		$sql=" Select * from personnel_basic_info where status='Inactive' ";
		$query=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_object($query))
		{
		
		?>
        
            <tr>
                <td><?php echo $s++;?></td>
                <td><?php echo $row->id;?></td>
                <td><?php echo $row->s_name;?></td>
                <td><?php  echo $row->designation?></td>
                <td><?php echo $row->dob?></td>
                <td><?php echo $row->admission_date?></td>
				<td><?php echo $row->phone_no?></td>
				<td><a href="admission_form.php?id=<?php echo $row->id;?>"><img src="assets/img/basic_info/<?php echo $row->image_name?>" width="50px" height="50px"/></td>
            </tr>
            
           
        
		
		<?php } ?>
		</tbody>
        <tfoot>
            <tr>
                <th>SL</th>
				<th>User ID</th>
                <th>Full Name</th>
                <th>Designation</th>
                <th>Date of Birth</th>
                <th>Admission Date</th>
				<th>Phone No</th>
                <th>User Image</th>
            </tr>
        </tfoot>
    </table>

</div>
</div>
<?php include('./assets/template/footer.php')?>