<?php
$f = "0";
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
} 
 
include('./js/phpqrcode/qrlib.php'); 

if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$name = $_POST['name'];
	$matric =  $_POST['matric'];
	$filename =$name;
	$dept =  $_POST['dept'];

	$codeContents =''. $name.','.$matric.','.$dept; 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);



	// $con =mysqli_connect('localhost','root','','practice');
	// $query ="INSERT INTO `qrcode`(`cname`, `pname`, `number`)  
	// 	VALUES ('$name','$matric','$dept')"; 
	// $run = mysqli_query($con,$query); 
}


?>

<?php 
session_start();

if(!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");


 ?>
<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>


<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer" onload="startTime()">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>CREATE QRCODE</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Please Fill-out All Fields
                    </div>
                    
                    
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  >
				<center>	
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name"  placeholder="Enter Name "  onfocus="this.value=''" style="width: auto;" value="<?php echo @$name; ?>" required  />
					</div>
					<div class="form-group">
						<label>Matric No.</label>
						<input type="text" class="form-control" name="matric"  placeholder="Enter matric No" onfocus="this.value=''" value="<?php echo @$matric; ?>" required pattern="[0-9 / 0-9]+" style="width: auto;" />
					</div>
					<div class="form-group">
						<label>Department</label>
						<input type="text" class="form-control" name="dept"  value="<?php echo @$dept; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Enter your Department"  onfocus="this.value=''" style="width: auto;" >
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary submitBtn"  />
					</div>
					</center>
				</form>
                    
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-header">QR CODE
                    </div>
                    
                    
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  >
				<center>	
                <?php
			if(!isset($filename)){
				$filename = "karmaweb";
			}
			?>

  		<div class="col-md-6">
			<h3 style="text-align:center">QR Code Result: </h3>
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
  		</div>
					</center>
				</form>
                    
                </div>
            </div>
      
        
</div>

<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>




         



         
