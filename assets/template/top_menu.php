<?php  
ob_start();
//session_start();
error_reporting(0);


 $sql="select * from user_activity_management where user_id='".$_SESSION['user']."'";
	
	$query=mysqli_query($conn,$sql);
	$all_data_user=mysqli_fetch_object($query);


?>

<style>

        .hour{
            
            padding: 5px;
            background-color: red;
            border-radius: 10%;
			color:whitesmoke;
            
        }

        .min{
           
            padding: 5px;
            background-color:green;
            border-radius: 10%;
			color:whitesmoke;
            
        }

        .sec{
            
         
            padding:5px;
            background-color:#161b58;
            border-radius: 10%;
			color:whitesmoke;
            
        }

        .M{
            
            padding: 5px;
            background-color: rgb(130, 51, 187);
            border-radius: 10%;
			color:whitesmoke;
			
            
        }
        
		.date{
		
		color:#52196e;
		font-size:13px;
		font-weight:bold;
		
		}
    </style>



            <header class='dashboard-toolbar'>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>

                <a class="navbar-brand" style=" font-weight: 600; font-size: 25px; color: #52196e !important; ">R.S Driving Training Centre</a>
                <div class="d-flex container-fluid">
                    <div class="p-2 ms-auto">
                        <button type="button" class="btn btn-outline-success"><i class="fa-light fa-user"></i> <?php echo $all_data_user->fname;?></button>
                    </div>
                    <div class="p-2"><button type="button" class="btn btn-outline-danger"><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></button></div>
                    <div class="p-2">
							<div class="clock">
								<span class="hour">
						
								</span>
								<span class="min">
						
								</span>
								<span class="sec">
						
								</span>
								<span class="M"> 
						
								</span><br>
								<span class="date">
						
								</span>
    						</div>
					
					</div> 
                </div>
           
            
            </header>

<script>
            function myTime(){
                var mydate = new Date();
				var hr =(mydate.getHours()<10)? "0" + mydate.getHours():mydate.getHours();
                var min = (mydate.getMinutes()<10)? "0" + mydate.getMinutes():mydate.getMinutes();
               var sec =(mydate.getSeconds()<10)? "0" + mydate.getSeconds():mydate.getSeconds();
               var M=(mydate.getHours()>=12)? "PM":"AM";
            



			
            if( mydate.getHours() == 0 )
            {
                hr=12;
				
            }
			
            else if( mydate.getHours() > 12)
            {
					hor=mydate.getHours();
                	hr= hor - 12;
				
					//alert(hr);
					if(hr<10)
					{
					
						hr= "0" + hr;
					
					}
            }
			else
			
			{
			
				 hr = mydate.getHours();
			
			}
            //var currentTime= hr + ":"+ min + ":"+ sec + ":";
 
              //  document.getElementsByClassName('H')[0].innerHTML=currentTime;

              document.getElementsByClassName('hour')[0].innerHTML=hr;
              document.getElementsByClassName('min')[0].innerHTML=min;
              document.getElementsByClassName('sec')[0].innerHTML=sec;

                document.getElementsByClassName('M')[0].innerHTML=M;

                var myDay=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

                var myMonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

                var day =mydate.getDate();


                var currentDate= myDay[mydate.getDay()]+ "," + myMonth[mydate.getMonth()] +" "+ day;


                document.getElementsByClassName("date")[0].innerHTML=currentDate;
				
				
				
            }   
			
			
			

            myTime();
            
            setInterval(function(){
                myTime();
            },1000);

            </script>