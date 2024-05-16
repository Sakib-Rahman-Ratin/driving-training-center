<?php
ob_start();
session_start();
 include('./assets/template/header.php');
 
 ?>
 
  <script>
        function printPage() {
            window.print(); 
			//document.getElementById('print-btn').display='none';// This triggers the browser's print dialog
        }
    </script>
 
 
 <?php 

  	$sql="select p.pr_police_station,p.pr_district,sum(pay.paid_amt) as paid_amt, pay.opening_amt,pay.payment_date,pay.entry_by,u.fname from personnel_basic_info p,payment pay,user_activity_management u where p.id='".$_GET['user_id']."' and pay.user_id='".$_GET['user_id']."' and u.user_id='".$_GET['user_id']."' order by pay.payment_date desc";
	$qeury=mysqli_query($conn,$sql);
	
	$all_data=mysqli_fetch_object($qeury);
	
 
 ?>
 
 
 
 
 
   <?php 
  
  function AmountInWords(float $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
   else $string[] = null;
   }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paisa' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'Taka Only' : '') . $get_paise;
}
?>

<!-- call the function here -->
 <?php $amt_words=$_GET['paid_amount'];
  // nummeric value in variable
 
 $get_amount= AmountInWords($amt_words);
 //echo $get_amount;
  
  ?>
  
  <style>
  @media print {
  .dashboard-toolbar{
  display:none !important;
  }
  .printer{
  display:none;
  }
  .dashboard-nav{
  
  display:none;
  }
  }
  
  
  table tr td{
  font-weight:bold;
  font-size:11px;
  
  }
  </style>

  
  		
			<div>
			<button onclick="print()" class="btn1 btn1-bg-submit printer">Print</button>
			</div>
			<div class="left" style=" width:45%; float:left;">
				<table width="100%" border="1" class="">
					  <tr>
						<td colspan="2" align="center" ><span style="font-weight:bold; font-size:20px; color:#2C436A;" >R.S Driving Training Centre</span></td>
						
					  </tr>
					  <tr>
						<td colspan="2" align="center">Road: #2 House: #154/A, Mirpur,Pallabi,Dhaka-1216</td>
					   
					  </tr>
					  <tr>
						<td colspan="2" align="center"><i class="fa-solid fa-phone"></i> 01819479508, 01675565222</td>
						
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td align="center">Date : &nbsp; <?php echo $_GET['payment_date']?></td>
					  </tr>
					  <tr>
						<td>Name : &nbsp;<?php echo $all_data->fname?></td>
						<td>&nbsp;</td>
					  </tr>
					  <tr>
						<td>Address : &nbsp;<?php echo $all_data->pr_police_station.", ".$all_data->pr_district;?>.</td>
						<td>&nbsp;</td>
					  </tr>
					  <tr>
						<td>Total Amount : &nbsp;<?php echo $all_data->opening_amt?></td>
						<td>
							<table width="80%" border="0">
								  <tr>
									<td width="60%">Total</td>
									<td width="5%">:</td>
									<td><?php echo $all_data->opening_amt?></td>
								  </tr>
								</table>

						
						</td>
						
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td>
							<table width="80%" border="0">
							  <tr>
								<td width="60%">Last Paid</td>
								<td width="5%">: </td>
								<td><?php echo $all_data->paid_amt-$_GET['paid_amount'];?></td>
							  </tr>
							</table>

						</td>
						
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td>
							<table width="80%" border="0">
							  <tr>
								<td width="60%">Pr. Paid Amount</td>
								<td width="5%">:</td>
								<td><?php echo $_GET['paid_amount']; $due_amt=$all_data->opening_amt-$all_data->paid_amt?></td>
							  </tr>
							</table>

						
						 </td>
						
					  </tr>
					  
					  <tr>
							<td style="padding-left:40px;"><?php echo $_GET['user_name'];?></td>
							<td>
								<table width="80%" border="0">
								  <tr>
									<td width="60%">Due</td>
									<td width="5%">: </td>
									<td><?php echo $due_amt;?></td>
								  </tr>
								</table>

							</td>
							
						  </tr>
						  <tr>
							<td style="text-decoration:overline;">Signature of Authorize</td>
							<td><span style="color:black; font-weight:bold;">In Word:</span> <?php echo $get_amount;?></td>
						  </tr>
					  
					</table>
			</div>
			
			<div class="right" style=" width:45%; float:left; padding-left:10px;">
					<table width="100%" border="1" class="">
					  <tr>
						<td colspan="2" align="center" ><span style="font-weight:bold; font-size:20px;color:#2C436A;">R.S Driving Training Centre</span></td>
						
					  </tr>
					  <tr>
						<td colspan="2" align="center">Road: #2 House: #154/A, Mirpur,Pallabi,Dhaka-1216</td>
					   
					  </tr>
					  <tr>
						<td colspan="2" align="center"><i class="fa-solid fa-phone"></i> 01819479508, 01675565222</td>
						
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td align="center">Date :  &nbsp;<?php echo $_GET['payment_date']?></td>
					  </tr>
					  <tr>
						<td>Name : &nbsp;<?php echo $all_data->fname?></td>
						<td>&nbsp;</td>
					  </tr>
					  <tr>
						<td>Address : &nbsp; <?php echo $all_data->pr_police_station.", ".$all_data->pr_district;?>.</td>
						<td>&nbsp;</td>
					  </tr>
					  <tr>
						<td>Total Amount : &nbsp;<?php echo $all_data->opening_amt?></td>
						<td>
							<table width="80%" border="0">
								  <tr>
									<td width="60%">Total</td>
									<td width="5%">:</td>
									<td><?php echo $all_data->opening_amt?></td>
								  </tr>
								</table>

						
						</td>
						
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td>
							<table width="80%" border="0">
							  <tr>
								<td width="60%">Last Paid</td>
								<td width="5%">: </td>
								<td><?php echo $all_data->paid_amt-$_GET['paid_amount'];?></td>
							  </tr>
							</table>

						</td>
						
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td>
							<table width="80%" border="0">
							  <tr>
								<td width="60%">Pr. Paid Amount</td>
								<td width="5%">:</td>
								<td><?php echo $_GET['paid_amount']; $due_amt=$all_data->opening_amt-$all_data->paid_amt?></td>
							  </tr>
							</table>

						
						 </td>
						
					  </tr>
					  
					  <tr>
							<td style="padding-left:40px;"><?php echo $_GET['user_name'];?></td>
							<td>
								<table width="80%" border="0">
								  <tr>
									<td width="60%">Due</td>
									<td width="5%">: </td>
									<td><?php echo $due_amt;?></td>
								  </tr>
								</table>

							</td>
							
						  </tr>
						  <tr>
							<td style="text-decoration:overline;">Signature of Authorize</td>
							<td><span style="color:black; font-weight:bold;">In Word:</span> <?php echo $get_amount;?></td>
						  </tr>
					  
					</table>
			</div>
		
  

  

  
  
 <?php include('./assets/template/footer.php')?>