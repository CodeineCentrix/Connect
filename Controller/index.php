<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Haich
 */
require_once('../Model/DBHelper.php');
require_once('../Model/admin_model.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'Vendor_details';
    }
}
$data = new admin_model();

switch($action) {
	case 'Vendor_details':
		include('../View/Vendor_details.php');
		break;
	
	case 'Add_Vendor':
		$VenName = filter_input(INPUT_POST, 'vendor_name');
		$VenDescription = filter_input(INPUT_POST, 'vendor_description');
		$VenFacebook = filter_input(INPUT_POST, 'vendor_facebook');
		$VenTwitter = filter_input(INPUT_POST, 'vendor_twitter');
		$VenInstagram = filter_input(INPUT_POST, 'vendor_instagram');
		$VenWebsite = filter_input(INPUT_POST, 'vendor_website');

// Validate inputs
		if ($vendor_name == null || $ven_description == null ||
        	$ven_facebook == null || $ven_twitter == null || $ven_instagram == null || $ven_website == null) 
                    {
                        $error = "Invalid product data. Check all fields and try again.";
                    }
    		 else 
                    {
                        require_once('DBHelper.php');
                    }

    // Add the product to the database  
   $vendor = $data->add_vendor($VenName, $VenDescription, $VenFacebook, $VenTwitter, $VenInstagram, $VenWebsite);

		include('..View/Vendor_details.php');
		break;

	case 'Item Details':
		include ('../View/Item Details.php');
		break;

	case 'EditVendor':
		include '../View/Edit_Vendor.php';
		break;

	case 'get_vendors':
		$vendors = $data-> get_vendors();
		include('../View/Vendor_details.php');
		break;


        case 'show_business':
		$business = $data-> get_business();
		include('../View/business_details.php');
		break;
        case 'edit_business':
		$editBusName = filter_input(INPUT_POST, 'editBusName',FILTER_SANITIZE_STRING);
		$editBusSlogan = filter_input(INPUT_POST, 'editBusSlogan',FILTER_SANITIZE_STRING);
		$editBusDateFound = filter_input(INPUT_POST, 'editBusDateFound');
		$editBuslogo = filter_input(INPUT_POST, 'editBuslogo',FILTER_SANITIZE_STRING);
		$editBusAddress = filter_input(INPUT_POST, 'editBusAddress',FILTER_SANITIZE_STRING);
		$editbusAboutUs = filter_input(INPUT_POST, 'editBusAboutUs',FILTER_SANITIZE_STRING);
               
		$data->EditBusiness($editBusName , $editBuslogo ,$editBusSlogan,$editBusAddress,$editbusAboutUs,$editBusDateFound);
                $business = $data-> get_business();
		include('../View/business_details.php');
                break;
}