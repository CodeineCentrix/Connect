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
        $stored_procedure ="CALL usp";
        return DBHelper::GetAll($stored_procedure);  
    }
    
    public function add_sponsor($spoName, $spoWebsite, $spoPicture) {
        $stored_procedure ="CALL usp";
        $params = array(
         "" => $spoName,
        ""=> $spoWebsite,
        "" => $spoPicture
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
     public function edit_sponsor($spoID,$spoName, $spoWebsite, $spoPicture) {
         $stored_procedure ="CALL usp";
         $params = array(
        "" => $spoID,
        "" => $spoName,
        ""=> $spoWebsite,
        "" => $spoPicture
        );
         return DBHelper::Execute($stored_procedure, $params);
    }
    
    public function get_sponsor($spoID) {
        $stored_procedure ="CALL usp";
        $params = array(
         "" => $spoID   
        );
        return DBHelper::GetRow($stored_procedure, $params);
    }
    /*End sponsors*/
    
   
    /*Region: Events */
    public function add_event($eveName, $eveStartDate, $eveAddress, $eveDescription, $eveEndDate) {
        $stored_procedure ="CALL usp";
        $params = array(
        "" => $eveName,
        "" => $eveStartDate,
        "" => $eveAddress,
        "" => $eveDescription,
        "" => $eveEndDate
        );
        return DBHelper::Execute($stored_procedure, $params);
    }

    public function edit_event($eveID,$eveName, $eveStartDate, $eveAddress, $eveDescription, $eveEndDate) {
        $stored_procedure ="CALL usp";
        $params = array(
        ""=> $eveID,
        "" => $eveName,
        "" => $eveStartDate,
        "" => $eveAddress,
        "" => $eveDescription,
        "" => $eveEndDate
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
    public function get_events() {
        $stored_procedure ="CALL usp";
        return DBHelper::GetAll($stored_procedure);
    }
    
    public function get_event($eveID) {
        $stored_procedure ="CALL usp";
        $params = array(
         "" => $eveID
        );

        return DBHelper::GetRow($stored_procedure, $params); 
    }   
    /*End Events Region*/
 
    
    /*Region: business*/
    public function EditBusiness( $editBusName, $editBusSlogan, $editBusDateFound,$editBuslogo,$editBusAddress,$editbusAboutUs)
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
    public function add_picture($param) {
        $stored_procedure="CALL usp";
        $params = array($param
            
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
    
    public function remove_picture($param) {
       $stored_procedure = "CALL usp";
       $params = array($param
           
       );
       return DBHelper::Execute($stored_procedure, $params);
    }
    /*End Gallery*/
    
  
}
