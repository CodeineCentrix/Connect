<!DOCTYPE html>
<html>
<head>
	<title>Vendor</title>
	<h1>Vendor Details</h1>
</head>
	<body>
		<form method="post" action=".">
			<label>Vendor Name:</label><input type="text" align="center" name="vendor" required="true" autofocus="true"><br>
		<br>
			<label>Description:</label><input type="text" align="center" name="description" required="true"><br>
		<br>
			<label>facebook Account:</label><input type="url" align="center" name="facebook"><br>
		<br>
			<label>Twitter Account:</label><input type="url" align="center" name="twitter"><br>
		<br>
			<label>Instagram Account:</label><input type="url" align="center" name="instagram"><br>
		<br>
			<label>Website Link:</label><input type="url" align="center" name="website"><br>
		<br>
			<label>How Many Items Does This Vendor Sell?</label><br>
			<h5 id="h5">Click The "Get Items" Button To Choose How Many Items To Add</h5> 
			<br>
			<div id="boxes"></div>

			<br>

				<input type="button" value="Get Items" onclick="getNumItems()" >
				<script>
					
					function getNumItems()
					{
						var amt = prompt("Items To Add:");
						for (var i = 0; i <= amt - 1; i++) 
						{
							document.getElementById("boxes").innerHTML += '<label>Item:</label><input type="url" align="center" name="website"><br><br>';
						}
					}

				</script>
				<br>
				<br>
			<input type="submit" value="Submit" name="submit"> &nbsp;&nbsp;
			<a href="Edit_Vendor.html">Edit Vendor</a>
		</form>
	</body>
</html>