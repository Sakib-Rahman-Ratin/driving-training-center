

<style>

  @media print {
 
  .printer{
  display:none;
  }
  }
table tr td{

border:0px;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;

}


</style>
 <script>
        function printPage() {
            window.print(); 
			//document.getElementById('print-btn').display='none';// This triggers the browser's print dialog
        }
    </script>
<?php 
	include('./assets/support/db_connection.php');


		$sql="select * from personnel_basic_info where id='".$_GET['id']."'";
		$query=mysqli_query($conn,$sql);
		$row=mysqli_fetch_object($query);
		
		
		 $amount="select p.opening_amt,sum(p.paid_amt) as paid ,u.user_id,p.user_id from user_activity_management u,payment p where p.user_id='".$_GET['id']."' and u.user_id=p.user_id";
		$query2=mysqli_query($conn,$amount);
		$taka=mysqli_fetch_object($query2);

?>



<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:0px auto; padding:0px; width:800px;">
  <tr>
    <td rowspan="3"><img src="./assets/img/logo/Car.jpg" width="180px;"/></td>
    <td style="font-size:32px; font-weight:bold; ine-height: 20px;">R.S Driving Training School</td>
  </tr>
  <tr>
    
    <td style="padding-left:25px; font-size:14px; ">Road: #02, House: #154/A, Mirpur, Pallabi, Dhaka-1216</td>
  </tr>
  <tr>
    
    <td style="padding-left:32px; font-size:14px; ">Cell: 01675-565222, 01819-479508, 01812-802967</td>
  </tr>
</table><br />
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:0px auto; padding:0px; width:800px;">
  <tr>
    <td>&nbsp;</td>
    <td style="text-align:center; font:Arial, Helvetica, sans-serif; font-size:28px; font-weight:bold">Admission Form</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="50%" align="center">&nbsp;</td>
    <td width="25%" rowspan="3" align="right"><img src="assets/img/basic_info/<?php echo $row->image_name?>" width="120px" /></td>
  </tr>
  <tr>
    <td><img src="./assets/img/logo/Car.jpg" width="70px" />Car Driving</td>
    <td><img src="assets/img/basic_info/motor.jpg" width="70px" />Motor Cycle Driving</td>
    
  </tr>
  
</table>


<div style="width:800px; margin:0px auto">
	<button onclick="print()" class="btn1 btn1-bg-submit printer">Print</button>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:0px auto; padding:0px; width:800px;">
  <tr>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%" style="font-weight:bold;">Course Name</td>
			<td width="5%">:</td>
			<td><?php echo $row->course_name;?></td>
		  </tr>
		</table>

	
	 </td>
    <td>
	<table width="100%" border="0">
		  <tr>
			<td width="45%">Admission Date </td>
			<td width="5%">:</td>
			<td><?php echo $row->admission_date?></td>
		  </tr>
		</table>
	
	</td>
  </tr>
  <tr>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Admission Expaired </td>
			<td width="5%">:</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
	</td>
    <td>
		<table width="100%" border="0">
		  <tr>
			<td width="45%">National ID </td>
			<td width="5%">:</td>
			<td><?php echo $row->national_id?></td>
		  </tr>
		</table>
	</td>
  </tr>
  <tr>
    <td>
		<table width="100%" border="0">
		  <tr>
			<td width="45%"><strong>Applicant Name  </strong></td>
			<td width="5%">:</td>
			<td><?php echo $row->s_name?></td>
		  </tr>
		</table>
	 </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Father's/ Hband Name </td>
			<td width="5%">:</td>
			<td><?php echo $row->f_name?></td>
		  </tr>
		</table>
	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> 
	<table width="100%" border="0">
		  <tr>
			<td width="45%">Mother's Name</td>
			<td width="5%">:</td>
			<td><?php echo $row->m_name?></td>
		  </tr>
		</table>
	
	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Date of Birth</td>
			<td width="5%">:</td>
			<td><?php echo $row->dob?></td>
		  </tr>
		</table>
	 </td>
    <td>
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Blood Group </td>
			<td width="5%">:</td>
			<td><?php echo $row->blood_group?></td>
		  </tr>
		</table>
	</td>
  </tr>
  <tr>
    <td>
	<table width="100%" border="0">
		  <tr>
			<td width="45%">Mobile No</td>
			<td width="5%">:</td>
			<td><?php echo $row->phone_no?></td>
		  </tr>
		</table>
	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="font-weight:bold;">Present Address  </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%">House No</td>
			<td width="5%">:</td>
			<td><?php echo $row->pr_house_no?></td>
		  </tr>
		</table>
	</td>
    <td>
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Road No</td>
			<td width="5%">:</td>
			<td><?php echo $row->road?></td>
		  </tr>
		</table>
	 </td>
	<td>
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Block</td>
			<td width="5%">:</td>
			<td><?php echo $row->pr_block?></td>
		  </tr>
		</table>
	 </td>
  </tr>
  <tr>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Police Station</td>
			<td width="5%">:</td>
			<td><?php echo $row->pr_police_station?></td>
		  </tr>
		</table>
	</td>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%">District</td>
			<td width="5%">:</td>
			<td><?php echo $row->pr_district?></td>
		  </tr>
		</table>
	</td>
  </tr>
  
  <tr>
    <td style="font-weight:bold;">Permanent Address  </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Village</td>
			<td width="5%">:</td>
			<td><?php echo $row->village?></td>
		  </tr>
		</table>
	</td>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Post Office</td>
			<td width="5%">:</td>
			<td><?php echo $row->post_office?></td>
		  </tr>
		</table>
	</td>
  </tr>
  <tr>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%">Upazilla</td>
			<td width="5%">:</td>
			<td><?php echo $row->police_station?></td>
		  </tr>
		</table>
	</td>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="45%">District</td>
			<td width="5%">:</td>
			<td><?php echo $row->district?></td>
		  </tr>
		</table>
	</td>
  </tr>
</table>


<br />
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:0px auto; padding:0px; width:800px;">
  <tr>
    <td colspan="2" style="text-align:justify;line-height:20px; ">I hereby declare that I will abide by all the rules and regulations of this institution. 
If I fail to complete the course within 1 month or 45 days of the course period, I will be bound to accept the decision of the center authority. I will not engage in any activity against the interest of this organization. If there is any irregularity in my activities, I will accept the decision of the center authority.</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;
	
	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;
	
	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
		<table width="100%" border="0">
		  <tr>
			<td width="25%">Course Fee  </td>
			<td width="5%">:</td>
			<td><?php echo $taka->opening_amt;?></td>
		  </tr>
		</table>

	</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>
	
		<table width="100%" border="0">
		  <tr>
			<td width="25%">Deposit  </td>
			<td width="5%">:</td>
			<td><?php echo $taka->paid; $due_amt=$taka->opening_amt-$taka->paid?></td>
		  </tr>
		</table>
	</td>
    <td style="text-align:center; font-size:12px; font-weight:bold;font-family:Arial, Helvetica, sans-serif; text-decoration:overline;">Applicant Signature</td>
  </tr>
  <tr>
    <td> 
		<table width="100%" border="0">
		  <tr>
			<td width="25%">Due  </td>
			<td width="5%">:</td>
			<td><?php echo $due_amt;?></td>
		  </tr>
		</table>
		
	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp; </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align:center; font-size:12px; font-weight:bold;font-family:Arial, Helvetica, sans-serif; text-decoration:overline;"> Authority Signature</td>
  </tr>
</table><br /><br />

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:0px auto; padding:0px; width:800px;">
  <tr>
    <td style="text-align:center;font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">N.B Course fee is non-refundable, if the course fee is not paid in full after 7 classes, the class will be closed. </td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;">Email: 1ubrahim565222@gmail.com</td>
  </tr>
</table>



