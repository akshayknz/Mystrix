
<?php
   include('config.php');
   session_start();
   
   $reg_id_check = $_SESSION['reg_id'];
   
   $ses_sql = mysqli_query($db,"SELECT reg_id, full_name FROM registration WHERE reg_id = '".$reg_id_check."'") or die("ERROR @session : " . mysqli_error($db));
   
   $row = mysqli_fetch_array($ses_sql);
   
   $uregid = $row['reg_id'];
   $uname = $row['full_name'];
   
   if(!isset($_SESSION['reg_id'])){ 
      header("location:oops.html");
   }
   
   //session_destroy(); // Don't uncomment : will cause oops.php when reload - SESSION DESTROYED
   // Don't HOST HAS BUGS SESSION_START : Under Development Purposes.. 
   
   
?>



<html>
   
   <head>
      <meta charset="utf-8">
        <!--<meta content="public" http-equiv="Cache-control">-->
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <meta content="yoyo" name="description">
        <title>Mystrix</title>
        <meta content="#000" name="theme-color">
        <meta content="yoyo" name="application-name">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style">
        <meta content="yoyo" name="apple-mobile-web-app-title">
        <meta content="#1E88E5" name="msapplication-TileColor">
        <meta content="./images/touch/mstile-150x150.png" name="msapplication-TileImage">
        <link href="./images/touch/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="./images/touch/android-chrome-192x192.png" rel="icon" sizes="192x192">
        <link href="./images/touch/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
        <link href="./images/icons/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
        <link href="./favicon.ico" rel="shortcut icon">
        <link href="./manifest.json" rel="manifest">
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta content="yoyo" name="keywords"/>
        <link href="../../assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <!--Uncomment this for Debug mode (DevTip)-->
                    <!--Dev Tools
                    <script type="text/javascript" src="debug.addIndicators.js"></script>
                    <style>
                         {
                            box-shadow: 0 0 0px 3px green,0 0 0px 9px rgba(255,255,255,.13);
                        }
                        body{background-color: #000 !important;}
                        canvas{display: none;}
                    </style>-->
        <!--Uncomment this for Debug mode (DevTip)-->
        <!--The fonts (DevTip)-->
        <link rel="stylesheet" href="./style.css">
        
   <style>
            body {
                margin: 0;
                padding: 0;
                font-family: extralight;
                height: auto;background:linear-gradient(#f90000a6 0%, transparent 41%);
                overflow-x: hidden;width: 100vw;
                font-family: o;
    display: flex;
    flex-direction: column;    align-items: center;
            }
.main{}
            .ticket {background-image:url('./images/reg_tick.svg');
             height: 510px;
    width: 342px;}

.ticket p{font-size: 12px;font-weight: bolder;font-family: extralight;}

.qr{ height: 135px;
    width: 135px;
    position: relative;
    top: 35%;
    left: 22%;mix-blend-mode: multiply;
    margin: 12px 0 0 0px;
    display: block;}
.gethim{    font-size: 17px;
    position: relative;font-family: bb;
    top: 36%;
    margin: 10px 0px;
    left: 22%;}
.gether{    font-size: 10px;
    position: relative;font-weight: bolder;font-family: extralight;
    margin: 0px 0px;
    top: 35%;
    left: 23%;}
    .ticket p{    font-size: 10px;
    position: relative;
    top: 36%;
    left: 22%;
    width: 60%;}
    .ti{    margin: 20px 24px 0 22px;
    font-size: 18px;}
    .ti span{font-size: 13px;display: block;margin-top: 5px;}
    a{text-decoration: none;font-family: bb;}
    .kbutton{transform: none;margin:10px 0px;    background: #fc0000;max-width:200px;
    color: #fff;}
    .kbutton:hover {
                box-shadow: 0 0 0 3px #000;
                background-color: transparent;
                color: #000;
            }
            
   </style>
   </head>

   
   <body>
<div class='ti'> Registration was successfull. <br>
<span>Screenshot or Download the PDF of your ticket.</span></div>
<div class='main'>
      <div class='ticket'>
            <h2 class='gethim'>Akshay K Nair<?php echo $uname; ?></h2> 
      	  <h2 class='gether'>0000001<?php echo $uregid; ?></h2>
      	  <img class='qr' src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=<?php echo $uregid ?>" alt="QR_code">
      	  <p>Please present this QR Code at registration of the event. Screenshot or save a PDF of this ticket.</p>
	  </div>
   </div>
	  <a href = "printpdf.php"><div class='kbutton'> Download PDF</div></a>


	  <a href = "close.php"><div class='kbutton'>Close</div></a>
   </body>
 </html>