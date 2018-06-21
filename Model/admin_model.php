<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_model
 *
 * @author Haich
 */

class admin_model {
    //put your code here 
public function add_vendor($VenName, $VenDescription, $VenFacebook, $VenTwitter, $VenInstagram, $VenWebsite)
{
	$query = 'CALL uspAddVendor(:VenName, :VenDescription, :VenFacebook, :VenTwitter, :VenInstagram, :VenWebsite)';
	$params = array(':VenName'=>$VenName, ':VenDescription'=>$VenDescription, ':VenFacebook'=>$VenFacebook, 'VenTwitter'=>$VenTwitter, ':VenInstagram'=>$VenInstagram, ':VenWebsite'=>$VenWebsite);
	return DBHelper::Execute($query, $params); 
}
public function edit_vendor($vendor_name, $vendor_description, $face_account, $twit_account, $in_account, $web_link)
{
		$query = 'CALL uspUpdateVendor(:vendor_name, :vendor_description, :face_account, :twit_account, :in_account, :web_link)';
	$params = array(':vendor_name'=>$vendor_name, ':vendor_description'=>$vendor_description, ':face_account'=>$face_account, 'twit_account'=>$twit_account, ':in_account'=>$in_account, ':web_link'=>$web_link);
	DBHelper::Execute($query, $params);
}
public function add_item_details($item_name, $item_description, $item_quantity, $item_Price)
{
	$query = 'CALL uspInsertDetails(:item_name, :item_description, :item_quantity, item_Price)';
	$params = array(':item_name'=>$item_name, ':item_description'=>$item_description, ':item_quantity'=>$item_quantity, ':item_Price'=>$item_Price);
	DBHelper::Execute($query, $params);
}



/*Region sponsors*/  
    public function get_sponsors() {
        $stored_procedure ="CALL uspAllSponsors";
        return DBHelper::GetAll($stored_procedure);  
    }
    
    public function add_sponsor($spoName, $spoWebsite, $spoPicture) {
        $stored_procedure ="CALL uspAddSponsor(:spoName, :spoWebsite, :spoPicture)";
        $params = array(
         ":spoName" => $spoName,
        ":spoWebsite"=> $spoWebsite,
        ":spoPicture" => $spoPicture
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
     public function edit_sponsor($spoID,$spoName, $spoWebsite, $spoPicture) {
         $stored_procedure ="CALL uspEditSponsor(:spoID,:spoName, :spoWebsite, :spoPicture)";
         $params = array(
        ":spoID" => $spoID,
        ":spoName" => $spoName,
        ":spoWebsite"=> $spoWebsite,
        ":spoPicture" => $spoPicture
        );
         return DBHelper::Execute($stored_procedure, $params);
    }
    
    public function get_sponsor($spoID) {
        $stored_procedure ="CALL uspSponsor(:spoID)";
        $params = array(
         ":spoID" => $spoID   
        );
        return DBHelper::GetRow($stored_procedure, $params);
    }
    /*End sponsors*/
    
   
    /*Region: Events */
    public function add_event($eveName, $eveStartDate, $eveAddress, $eveDescription, $eveEndDate, $ticOnePrice,$ticTwoPrice,$ticDesc) {
        $stored_procedure ="CALL uspAddEvent(:eveName, :eveStartDate, :eveAddress, :eveDescription, :eveEndDate,:ticOnePrice,:ticTwoPrice,:ticDesc)";
        $params = array(
        ":eveName" => $eveName,
        ":eveStartDate" => $eveStartDate,
        ":eveAddress" => $eveAddress,
        ":eveDescription" => $eveDescription,
        ":eveEndDate" => $eveEndDate,
        ":ticOnePrice" => $ticOnePrice,
        ":ticTwoPrice" => $ticTwoPrice,
        ":ticDesc" => $ticDesc
        );
        return DBHelper::Execute($stored_procedure, $params);
    }

    public function edit_event($eveID,$eveName, $eveStartDate, $eveAddress, $eveDescription, $eveEndDate, $ticOnePrice,$ticTwoPrice,$ticDesc) {
        $stored_procedure ="CALL uspEditEvent(:eveID,:eveName, :eveStartDate, :eveAddress, :eveDescription, :eveEndDate,:ticOnePrice,:ticTwoPrice,:ticDesc)";
        $params = array(
        ":eveID"=> $eveID,
        ":eveName" => $eveName,
        ":eveStartDate" => $eveStartDate,
        ":eveAddress" => $eveAddress,
        ":eveDescription" => $eveDescription,
        ":eveEndDate" => $eveEndDate,
        ":ticOnePrice" => $ticOnePrice,
        ":ticTwoPrice" => $ticTwoPrice,
        ":ticDesc" => $ticDesc
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
    public function get_events() {
        $stored_procedure ="CALL uspAllEvents";
        return DBHelper::GetAll($stored_procedure);
    }
    
    public function get_event($eveID) {
        $stored_procedure ="CALL uspEvent(:eveID)";
        $params = array(
         ":eveID" => $eveID
        );

        return DBHelper::GetRow($stored_procedure, $params); 
    }   
    /*End Events Region*/
 
    
    /*Region: business*/
    public function EditBusiness($editBusName , $editBuslogo ,$editBusSlogan,$editBusAddress,$editbusAboutUs,$editBusDateFound)
    {
        $stored_procedure ="CALL `uspUpdateBusiness`(:busName, :busLogo, :busSlogan,"
                . " :busAddressID, :busAboutUs, :busDateFound);";
        $params = array(
            ':busName'=>$editBusName,
            ':busLogo'=>$editBuslogo,
            ':busSlogan'=>$editBusSlogan,
            ':busAddressID'=>$editBusAddress,
            ':busAboutUs'=>$editbusAboutUs,
            ':busDateFound'=>$editBusDateFound
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
       public function EditBusinessName( $editBusName)
    {
        $stored_procedure ="CALL uspUpdateBusiness(:busName);";
        $params = array(
            ':busName'=>$editBusName,
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
    
      public function get_business() {
        $stored_procedure ="CALL uspGetBusiness()";
        return DBHelper::GetRow($stored_procedure);
    }
    /* End business */
    
    
    /*Region: Gallery */
    public function add_timeline($year, $time_desc,$images) {
        $stored_procedure="CALL uspAddTimeline(:year, :time_desc)";
        $params = array(
          ":year"=>$year,
          ":time_desc"=> $time_desc,
        
        );
        if( DBHelper::Execute($stored_procedure, $params)){
            $array_count = count($images);
            foreach ($images as $image){
              $stored_procedure="CALL uspTimelinePicture(:image, :gal_date, img_desc)";
              $params = array(
          ":image"=>$image,
          ":gal_date"=> $year,
          "img_desc" => "Picture linked to year $year"
        
        );
           if(DBHelper::Execute($stored_procedure, $params)){
               $array_count --;
           } 
        }
        return $array_count===0;
        }
    }
    
    public function edit_timeline($param) {
       $stored_procedure = "CALL usp";
       $params = array($param
           
       );
       return DBHelper::Execute($stored_procedure, $params);
    }
    
    public function get_timelines($param) {
        $stored_procedure = "CALL usp";
       $params = array(
           
       );
    }
    
    public function get_timeline($param) {
        $stored_procedure = "CALL usp";
       $params = array(
           
       );
    }
    /*End Gallery*/
    
  
}
