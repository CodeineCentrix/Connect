<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Event Management Page</title>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyZAUtNt7Orra9321ukLv48rU1DD3OFhM&libraries=places&callback=initAutocomplete"
         async defer></script>
         <style>
              #map {
                  
        width: 60%;
        height: 350px;
        margin: auto;
        padding:5px;
        overflow: hidden;
      }
      .create_event{
          width: 100%;
          overflow: hidden;
          height: 100% !important;
          margin: 0;
          padding: 0;
          
      }
      body , html {
          width: 100%;
          height: 100% !important;
          overflow: hidden;
          overflow-y: auto;
          margin: 0;
          padding: 0;
      }


         </style>
    </head>
    <body>
        <h1>Events Management Page</h1>
        <p>This page is used to create, maintain and update con.ect events</p>
        <?php if(isset($event_added)==TRUE):?>
        <?php if($event_added===TRUE):?>
        <p>Event has been Successfully added!</p>
        <?php elseif($event_added===FALSE): ?>
        <p>unfortunately, the event couldn't be added... Try again later. </p>
        <?php endif; ?>
        <?php endif;?>
        
        <?php if(isset($event_edited)==TRUE):?>
        <?php if($event_edited===TRUE):?>
        <p>Event has been Successfully edited!</p>
        <?php elseif($event_edited==FALSE): ?>
        <p>unfortunately, the event couldn't be edited... Try again later. </p>
        <?php endif; ?>
        <?php endif;?>
        <div class="create_event"> 
            <form method="POST" action="../Controller/index.php?action=maintain_events">
                
        <h2>Create an event here</h2>
        <label>Enter the event start date: </label>
        <input  type="date" required name="dte_start_date" id="start_date"><br>
        <label>Enter the event end date:</label>
        <input type="date" required name="dte_end_date" id="end_date"><br>
        <label>Enter the event alias name</label>
        <input type="text" name="txtAlias" required id="txtAlias"><br>
        <label>Enter an optional event description below</label>
        <textarea name="txtDescription" required>
            
        </textarea><br>
        
        <label>Enter the event address</label>
        <input id="pac-in" class="contros" name="txtAddress" type="text" placeholder="Enter event Address here">
        <div id="map"></div><br>
        <label>Enter ticket information below</label>
        <label>Where will the tickets be sold? </label>
        <textarea required name="txttickets_infos">
            
        </textarea><br>
        <label>Price for Daily Ticket</label>
        <input type="number" required name="txtdaily_price"><br>
        <label>Price for Weekend Pass</label>
        <input type="number" required name="txtweekend_price"><br>
        <input type="hidden" value="add_event" name="addEvent">
        <input type="submit" value="Create Event">
            
            </form>
<!-- The script required to create the map search capability, important for you not to alter stuff -->
        <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-in');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
        </div>
    
        <div class="edit_event">
            <h1>Here you can edit an event, the event needs to exist though.</h1>
            <label>Choose the Event Date</label>
            <form METHOD="POST" action="../Controller/index.php?action=maintain_events">
            <select name="cmbEvent">
                <?php foreach ($events_combo as $ss): ?>
                <option value="<?php echo $ss["EveID"];?>"><?php echo $ss["EveName"];?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="hidden" value="search_event" name="isSearch">
            <input type="submit" value="Get Event Details">
            </form>
            <?php if(isset($event_details)): ?>
            <form METHOD="POST" action="../Controller/index.php?action=maintain_events">
                <div>
        <label>Enter the event start date: </label>
        <input  type="date" required name="dte_start_date" id="start_date" value="<?php echo $event_details["EveStartDate"]; ?>"><br>
        <label>Enter the event end date:</label>
        <input type="date" required name="dte_end_date" id="end_date" value="<?php echo $event_details["EveEndDate"]; ?>"><br>
        <label>Enter the event alias name</label>
        <input type="text" name="txtAlias" required id="txtAlias" value="<?php echo $event_details["EveName"]; ?>"><br>
        <label>Enter an optional event description below</label>
        <textarea name="txtDescription" required>
           <?php echo $event_details["EveDescription"]; ?> 
        </textarea><br>
        
        <label>Enter the event address</label>
        <input id="pac-in" class="contros" type="text" name="txtAddress" placeholder="Enter event Address here" value="<?php echo $event_details["EveAddress"]; ?>">
        <div id="map"></div><br>
        <label>Enter ticket information below</label>
        <label>Where will the tickets be sold? </label>
        <textarea required name="txttickets_infos">
          
            <?php echo $event_details["TicDescription"]; ?>
        </textarea><br>
        <label>Price for Daily Ticket</label>
        <input type="number" required name="txtdaily_price" value="<?php echo $event_details["DailyTicket"]; ?>"><br>
        <label>Price for Weekend Pass</label>
        <input type="number" required name="txtweekend_price" value="<?php echo $event_details["WeekendTicket"]; ?>"><br>
        <input type="hidden" value="update_true" name="isUpdate">
        <input type="hidden" value="<?php echo $event_details["EveID"]?>" name="cur_event">
                    <input type="submit" value="Update Event">
                </div>
            </form>
            <?php endif;?>
        </div>
    </body>
</html>
