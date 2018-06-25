<?php include 'admin_header.html'; ?>
<html>
<head>
	<title>Edit Vendor</title>
	<style>
                ul {margin:0; padding: 0;}
		ul li:hover ul {display: inline-block;}
		ul li ul {
		display: none;
		  width: 20%;			
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
                  margin: 0;
                  padding: 0;
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
	<div>
		<div class="editVendor">
			<h1>Edit Vendor Details</h1>
			<?php if(isset($isSuccessfull)){
					if($isSuccessfull===TRUE){echo '<p class="isa_success">Vendor was successfully edited</p>';}
					else if ($isSuccessfull==FALSE){echo'<p class="isa_error">Vendor could not be edited, try again later ow yeah make sure you are not using firefox</p>';}
                        }
			?>
				<ul>
					<li>Vendors
					<ul>
					  <?php foreach($vendors as $ven) : ?>
					   <li><a href="?action=show_edit_vendor&vendorID=<?php echo $ven['VenID']; ?>"> <?php echo $ven['VenName']; ?></a> </li>
					  <?php endforeach; ?>
					</ul>
                                       </li>
				</ul>
		</div>
		<!--HTML CONTROLS--> 
		<div>
			<form method="POST" action="../Controller/index.php?action=edit_vendor_get&vendorID=<?php echo $vendor['VenID']; ?>&venName=<?php echo $vendor['VenName']; ?>&venDescription=<?php echo $vendor['VenDescription']; ?>" enctype="multipart/form-data">
				<input type="hidden" name="venID" value="<?php echo $vendor['VenID']; ?>"/>
				<label>Vendor Name:</label>
				<input type="text" align="center" value="<?php echo $vendor['VenName']; ?>" name="venName" required="true" autofocus="true"><br>
				<br>
				<label>Description:</label>
				<input type="text" align="center" value="<?php echo $vendor['VenDescription']; ?>" name="venDescription" required="true"><br>
				<br>
				<label>facebook Account:</label>
				<input type="url" align="center" name="venFacebook" value="<?php echo $vendor['VenFacebook']; ?>"><br>
				<br>
				<label>Twitter Account:</label>

				<input type="url" align="center" name="venTwitter" value="<?php echo $vendor['VenTwitter']; ?>"><br>
				<br>
				<label>Instagram Account:</label>
				<input type="url" align="center" name="venInstagram" value="<?php echo $vendor['VenInstagram']; ?>"><br>
				<br>
				<label>Website Link:</label>
				<input type="url" align="center" name="venWebsite" value="<?php echo $vendor['VenWebsite']; ?>"><br>

				<br>
				<label>Vendor picture:</label>
				<input type="file" accept="image/jpg" name="fpVenPicture"/><br>

				<br>
		
				<?php
				if(isset($vendor['VenPicture']))
				{
					$image = imagecreatefromstring($vendor['VenPicture']); 
					ob_start(); 
					imagejpeg($image, null, 80);
					$data = ob_get_contents();
					ob_end_clean();
					echo '<img src="data:image/jpg;base64, '.base64_encode($data).' " style="width:250px; height:250px;" />';
					echo '<input type="hidden" name="hdImage" value="'.base64_encode($vendor['VenPicture']).'" />';	
				}
				?>
				<br>
				<br>
				<input type="hidden" name="action" value="edit_vendor">
				<input type="submit" value="Submit" > 
			
			</form>

		</div>
	</div>
	</body>
</html>