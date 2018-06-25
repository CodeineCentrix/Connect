<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gallery</title>
    </head>
<body>
    <div>
        <h2 class="company_font">Down memory lane</h2>
        <div class="timeline">
                    <?php
                    $i =0;
                    foreach($picYears as $picYear) : ?>
                      <?php $i = $i+1;
                          if($i/2==0)
                          {
                                echo '<div class="container right">';
                          }
                         else {
                             echo '<div class="container left">';
                         }       
                         echo ' <div class="content">';
                       ?>
                         <h2><?php echo $picYear["Year"]; ?></h2>
                         <p><?php// $picYear["Comment"]; ?>Currently we have an awesome base of 3000</p>
                         <?php foreach($arrayOfarrayPictures as $pic) : ?>
                            <div class="row"> 
                                <div class="column">
                                    <img src="pics/2017/1.jpg">
                                    <img src="pics/2017/2.jpg">
                                </div>
                                <div class="column">
                                    <img src="pics/2017/3.jpg">
                                    <img src="pics/2017/4.jpg">
                                </div> 
                                <div class="column">
                                  <img src="pics/2017/5.jpg">
                                  <img src="pics/2017/6.jpg">
                                  <img src="pics/2017/7.jpg">
                                </div>
                                <div class="column">
                                  <img src="pics/2017/8.jpg">
                                  <img src="pics/2017/9.jpg">
                                </div>
                            </div>
                           <?php endforeach;?>
                        <?php 
                          echo '</div>';
                          echo '</div>';
                          endforeach; 
                        ?>
        </div>
    </div>
</body>
</html>
