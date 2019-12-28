<?php
   include('session.php');
   
   $reg_id_check = $_SESSION['reg_id'];
   
   $ses_sql = mysqli_query($db,"SELECT reg_id, full_name, mail_id FROM registration_beta WHERE reg_id = '".$reg_id_check."'") or die("ERROR @session : " . mysqli_error($db));
   
   $row = mysqli_fetch_array($ses_sql);
   
   $uregid = $row['reg_id'];
   $uname = $row['full_name'];
   $umailid = $row['mail_id'];
   
   if(!isset($_SESSION['reg_id'])){ 
      header("location:registration.php");
   }
   

?>

<html>
	<head>
		<meta charset="utf-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta content="user-scalable=no, width=device-width" name="viewport">
		<title>Welcome to MYSTRIX 2020</title>
		<meta content="#000" name="theme-color">
		<meta content="#1E88E5" name="msapplication-TileColor">
		<link rel="stylesheet" href="./style.css">
		<style>
			body {
				height: auto;
                		font-family: o;
				display: flex;
				flex-direction: column;
				align-items: center;
				}
			.ticket {
				background-image:url('./images/reg_tick.svg');
				height: 1020px;
				width: 682px;
				}

			.url{
				font-size: 20px;
				position: relative;
				font-family: extralight;
				top: 30%;
				margin: 10px 0px;
				left: 30%;
				}
				
			.qr{ height: 300px;
				width: 300px;
				position: relative;
				top: 35%;
				left: 20%;
				mix-blend-mode: multiply;
				margin: 12px 0 0 0px;
				display: block;
				}
			.gethim{
				font-size: 30px;
				position: relative;
				font-family: bb;
				top: 35%;
				margin: 10px 0px;
				left: 27%;
				}	
			.gether{
				font-size: 20px;
				position: relative;
				font-weight: bolder;
				margin: 0px 0px;
				top: 35%;
				left: 27%;
				}
			.ticket p{
				font-size: 15px;
				font-weight: bolder;
				font-family: extralight;
				position: relative;
				top: 35%;
				left: 27%;
				width: 60%;
				}       
		</style>
		<script>
			function myFunction() {
			window.print();
			}
		</script>
	</head>
	<body onload = myFunction()>
		<div id='ticket' class='ticket'>
			<h3 class='url' align='left'>www.mystrix.in</h3>
			<h2 class='gethim'><?php echo $uname; ?></h2> 
			<h2 class='gether'><?php echo $uregid; ?></h2>
			<img class='qr' src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=<?php echo $uregid ?>" alt="QR_code">
			<p align='left'>Please present this QR Code at registration of the event.</p>
		</div>
	</body>
 </html>
