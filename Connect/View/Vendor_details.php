<?php include 'admin_header.html'; ?>
<html>
<head>
	<title>Vendor</title>
	<style>
	
		ul li:hover ul {display: block;}
		ul li ul {
		display: none;
		  width: 200px;			
		  color: white;
		}
		ul li ul li { 
		display: block; 
		}
		ul li ul  li:hover {
			background: #666;
			font-size: 20px;
			}
		a {
		text-decoration: none;
		padding: 5px;
		display:inline-block;
		}
		a:hover{
			font-size: 25px;
			color: white;}
		.isa_info {
		color: #00529B;
			background-color: #BDE5F8;
		}
		.isa_success {
			color: #4F8A10;
			background-color: #DFF2BF;
		}
		.isa_warning {
			color: #9F6000;
			background-color: #FEEFB3;
		}
		.isa_error {
			color: #D8000C;
			background-color: #FFD2D2;
		}
</style>
</head>
	<body>	
		<h1>Vendor Details</h1>
		<?php 
		if(isset($isSuccessfull))
			if($isSuccessfull===TRUE){echo '<p class="isa_success">Vendor was successfully edited</p>';}
			else if ($isSuccessfull==FALSE){echo'<p class="isa_error">Vendor could not be edited, try again later ow yeah make sure you are not using firefox</p>';}
		?>
		<form method="POST" action="" enctype="multipart/form-data">
			<label>Vendor Name:</label><input type="text" align="center" name="vendor_name" required="true" autofocus="true"><br>
			<br>
			<label>Description:</label><input type="text" align="center" name="vendor_description" required="true"><br>
			<br>
			<label>facebook Account:</label><input type="url" align="center" name="vendor_facebook"><br>
			<br>
			<label>Twitter Account:</label><input type="url" align="center" name="vendor_twitter"><br>
			<br>
			<label>Instagram Account:</label><input type="url" align="center" name="vendor_instagram"><br>
			<br>
			<label>Website Link:</label><input type="url" align="center" name="vendor_website"><br>
			<br>
			<label>Picture:</label>
			<input type="file" align="center"  accept="image/jpg" name="fpVenPicture"/>
			
			<input type="hidden" name="action" value="Add_Vendor">
			<br>
			<br>
			<input type="submit" value="Submit"> &nbsp;&nbsp;
			
		</form>
		<div>
		<?php
		$diplay;
				if(isset($diplay))
				{
					$image = imagecreatefromstring($diplay); 
					ob_start(); 
					imagejpeg($image, null, 80);
					$data = ob_get_contents();
					ob_end_clean();
					echo '<img src="data:image/jpg;base64, '.base64_encode($data).' " style="width:250px; height:250px;" />';
					
				}
				?>
		</div?
	</body>
</html>