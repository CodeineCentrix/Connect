<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sponsor Management Page</title>
    </head>
    <body>
        <h1>Add a Sponsor</h1>
        <p>This page enables the addition and modification of a sponsor</p>
        <div class="add_sponsor">
            <p>Add a sponsor here</p>
            <form>
            <label>Enter Sponsor Name</label>
            <input type="text" name="txtsponsor_name" required><br>
            <label>Enter Sponsor Web link</label>
            <input type="url" name="txtweb_link"><br>
            <label>Add a Sponsor image</label>
            <input type="file" name="fpsponsor_pic" required><br>
            <input type="submit" value="Add Sponsor">
            </form>
        </div>
        
        <div>
            <p>Edit or delete a sponsor here</p>
            <form>
                <label>Pick a sponsor</label>
                <select>
                    <?php foreach ($si as $i):?>
                    <option></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <form>
             <?php if(true): ?>
            <label>Enter Sponsor Name</label>
            <input type="text" value="<?php echo ""; ?>" name="txtsponsor_name" required><br>
            <label>Enter Sponsor Web link</label>
            <input type="url" name="txtweb_link" value="<?php echo "";?>"><br>
            <label>Add a Sponsor image</label>
            <input type="file" name="fpsponsor_pic" required value=""><br>
            <?php endif; ?>
            </form>
        </div>
    </body>
</html>
