<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html> <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="stylesheet" href="../stylesheets/mystyle.css">
        <script src="scripts/myscript.js"></script>
        <!-- Section for jQuery plugins -->
           
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <script type="text/javascript" src="../scripts/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
        <script type="text/javascript" src="../scripts/kinetic.js"></script> 
        <script type="text/javascript" src="../scripts/jquery.final-countdown.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
       <div class="fullscreen-bg">
           <img src="../vids/star_wars_birthdays.gif" alt="Star Wars image" class="fullscreen-bg-gif">
        </div>
        
        <h1 class="company_font">Ready  to   CON.ECT!!!<br>in:</h1>
        
        <div class="time-holder">
            
    <div class="countdown countdown-container container"
     data-start="1362139200"
     data-end="<?php echo strtotime($date_range["EveStartDate"]) ;/*The end time from database*/ ?>" 
     data-now="<?php echo strtotime(date("Y/m/d")) ;/*The current time converted to seconds*/?>"
     data-border-color="rgba(255, 255, 255, .8)">
    <div class="clock row">
        <div class="clock-item clock-days countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas-days" class="clock-canvas"></div>

                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-days type-time">DAYS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.wrap -->
        </div><!-- /.clock-item -->

        <div class="clock-item clock-hours countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas-hours" class="clock-canvas"></div>

                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-hours type-time">HOURS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.wrap -->
        </div><!-- /.clock-item -->

        <div class="clock-item clock-minutes countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas-minutes" class="clock-canvas"></div>

                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-minutes type-time">MINUTES</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.wrap -->
        </div><!-- /.clock-item -->

        <div class="clock-item clock-seconds countdown-time-value col-sm-6 col-md-3">
            <div class="wrap">
                <div class="inner">
                    <div id="canvas-seconds" class="clock-canvas"></div>

                    <div class="text">
                        <p class="val">0</p>
                        <p class="type-seconds type-time">SECONDS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.wrap -->
        </div><!-- /.clock-item -->
    </div><!-- /.clock -->
</div><!-- /.countdown-wrapper -->
<h5 class="company_font  normal_text"><?php echo $date_range["EveStartDate"]." - ".$date_range["EveEndDate"]; ?></h5>
        </div>  
        <br>

        <!-- Bouncing arrow -->
        <div class="arrow_holder">
            <div class="about_us_btn">
                <a href=".">Get to know about us</a>
            </div>
       <div class="arrow bounce">
        <p class="fa fa-arrow-down fa-2x" href="#"></p>
        </div>
        </div>
        <script type="text/javascript">
	$('.countdown').final_countdown();
        </script>
        
        <!-- Birthday plus gallery redirect page -->
        <div class="birthday-holder">
            <h1 class="company_font section_two">Did you know</h1>
            <h2 class="company_font section_two normal_text">It's our 5th Birthday <span class="fa fa-smile-o" ></span></h2>
            <div class="image_middle_holder">
                <img src="vids/bouncingpresent.gif" alt="Bouncing present">
            </div>
            <div class="birthday_gallery_holder">
                <a href="../Controller/index.php?action=show_gallery"> <p class="company_font section_two normal_text">Follow our journey <span class=" fa fa-heart"></span></p></a>
            </div>
        </div>
        
        <div class="new_adds">
            <h1 class="company_font section_two">What's new for 2018</h1>
            <div class="new-stuff-content">

			
			<div>
                <h2>Bayworld </h2>
                <p>
                    We are extremely proud to mention Bayworld will be coming onboard and they  aren't there for no reason as they 
                    will be providing us with many cool stuff. <br>
                    Dinasours, swimming fish, sharks and the whole lots of goodies to freak out the event even more so if you're a fan of 
                    geeky stuff and enjoy nature too, this is a must see!!!
                </p>
            </div>
              
            <div>
                <h2> Panel Discussions</h2>
                <p>
                    
                Panel with the cast of The Flash at 2015 PaleyFest
                A panel discussion, or simply a panel, involves a group of people gathered to discuss a topic in front of an audience,
                typically at scientific, business or academic conferences, fan conventions, and on television shows. Panels usually include a moderator who guides the discussion and sometimes elicits audience questions, with the goal of being informative and entertaining
                </p>
            </div>
            
            <div>
                <h2>Board Games</h2>
                <p>
                    A board game is a tabletop game that involves counters or pieces moved or placed on a pre-marked surface or "board", according to a set of rules. Some games are based on pure strategy, but many contain an element of chance; and some are purely chance, with no element of skill
                    There are many varieties of board games. Their representation of real-life situations can range from having no inherent theme, like checkers, to having a specific theme and narrative, like Cluedo. Rules can range from the very simple, 
                    like Tic-tac-toe, to those describing a game universe in great detail, like Dungeons & Dragons – although most of the latter are role-playing games where the board is secondary to the game, serving to help visualize the game 
                </p>
            </div>
                
            </div>
        </div>
        
        <div class="get_start_holder">
            <div class="get_start_content">
                <h1 class="company_font">Getting started</h1>
                
                <h3 class="company_font normal_text">Get your directions to the venue</h3>
                    <div class="map_holder">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10933.65363976559!2d25.66523387795035!3d-34.00464135157089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e6532d8ee7f0a75%3A0xce78b1eddab5ab04!2sVodacom+Indoor+Sports+Centre!5e1!3m2!1sen!2sza!4v1529108296898"  frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                <h3 class="company_font normal_text">Get your ticket</h3>
                <p><?php echo $tickets["TicDescription"];?><br>
                   <?php echo 'Weekend Pass: '.$tickets['TicPriceWeekendPass'];?><br>
                   <?php echo 'Daily Pass: '.$tickets['TicPriceNormalPass'];?>
                </p>
            </div>
        </div>
        
        <div class="stakeholder">
		
            <h1 class="company_font">Our Vendors</h1>
            <div class="vendors_holder">
            
		  <?php foreach($vendors as $vendor) : 
			
			if($vendor['VenPicture'] == null)
				{
					echo ' <div class="card">';
				}
				else
				{
					$image = imagecreatefromstring($vendor['VenPicture']); 

					ob_start(); //You could also just output the $image via header() and bypass this buffer capture.
					imagejpeg($image, null, 80);
					$data = ob_get_contents();
					ob_end_clean();
		
					echo ' <div class="card">';
					echo '<img class="resizepic", src="data:image/jpg;base64,' .  base64_encode($data) . '" />';
				}	  
		  ?>
 	
            <h1><?php echo $vendor['VenName'];?></h1>
            <p class="title"><?php echo $vendor['VenDescription'];?></p>
            <!--<p>Vendor Stall <?php// echo $vendor['VenID'];?></p>-->
            <a href="<?php echo $vendor['VenWebsite'];?>"><i class="fa fa-dribbble"></i></a> 
            <a href="<?php echo $vendor['VenTwitter'];?>"><i class="fa fa-twitter"></i></a> 
            <a href="<?php echo $vendor['VenInstagram'];?>"><i class="fa fa-linkedin"></i></a> 
            <a href="<?php echo $vendor['VenFacebook'];?>"><i class="fa fa-facebook"></i></a> 
			
          </div>
		  
		  <?php endforeach; ?>
		  
                <br>
                <br>
                
            </div>
            <!--<a href="."> <p style="float: left; color: black; width: 50%; margin-left: 120px; font-size: 75px;"><span>&larr;</span></p></a>
            <a href="."><p style="float: right; color: black; width: 50px;margin-right: 120px; font-size: 75px;"><span>&rarr;</span></p></a>
			-->
			<br>
            <br>
                
		</div>
        
             
        <div class="sponsors_holder">
            <h1 class='company_font'>Gratitude to our sponsors</h1>
				<br>	
		  			<?php foreach($sponsors as $sponsor) : ?>
			<div class="card">	
				<div class='round' style="width: 200px; height: 200px; border-radius: 250px;">
					 	<a href="www.<?php echo $sponsor['SpoWebsite'];?>">
					<?php if($sponsor['SpoPicture'] == null)
						{
							echo 'OOPS! NOTHING SELECTED OR PICTURE IS NOT VALID';
						}
						else
						{
							$image = imagecreatefromstring($sponsor['SpoPicture']); 

							ob_start(); //You could also just output the $image via header() and bypass this buffer capture.
							imagejpeg($image, null, 80);
							$data = ob_get_contents();
							ob_end_clean();		
							
						}	
										
					?>
					<img src="data:image/jpg;base64, <?php echo base64_encode($data) ?>" />
		 				

				</div>
				
				<h1 class="title" style="color:black; font-family:New Drop Era;"><?php echo $sponsor['SpoName'];?></h1>
               	</div>	
				
				<?php endforeach; ?>
            
         </div>
        </div>
    </body>
</html>
