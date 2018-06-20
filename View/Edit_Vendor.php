<!DOCTYPE html>
<html>
<head>
	<title>Edit Vendor</title>
	<h1>Edit Vendor Details</h1>
</head>
<body>
		<!--HTML CONTROLS--> 
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
        <br 
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

			<input type="submit" value="Submit" name="submit"> 
		</form>
	</body>
</html>