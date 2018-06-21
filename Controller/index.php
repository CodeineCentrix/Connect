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
		/*$category_ID = filter_input(INPUT_GET, 'category_id', 
            FILTER_SANITIZE_STRING);
		if ($category_ID == NULL || $category_ID == FALSE) {
			$category_ID = "1";
		}
		$categories = get_categories();
		$products = get_products_by_category($category_ID);
		$category_name = get_category_name($category_ID);*/
		include('../View/Vendor_details.php');
		break;
	
	case 'Item Details':
		include ('../View/Item Details.php');
		break;

		case 'EditVendor':
		
		include '../View/Edit_Vendor.php';

			break;
         //Going to the business page
        case 'show_business':
                //getting the business attributes
		$business = $data-> get_business();
		include('../View/business_details.php');
		break;
        //editing the business attributes
        case 'edit_business':
                //getting the values from the business details view page
		$editBusName = filter_input(INPUT_POST, 'editBusName',FILTER_SANITIZE_STRING);
		$editBusSlogan = filter_input(INPUT_POST, 'editBusSlogan',FILTER_SANITIZE_STRING);
		$editBusDateFound = filter_input(INPUT_POST, 'editBusDateFound');
		$editBuslogo = filter_input(INPUT_POST, 'editBuslogo',FILTER_SANITIZE_STRING);
		$editBusAddress = filter_input(INPUT_POST, 'editBusAddress',FILTER_SANITIZE_STRING);
		$editbusAboutUs = filter_input(INPUT_POST, 'editBusAboutUs',FILTER_SANITIZE_STRING);
                //calling the edit method in the admin_model 
		$data->EditBusiness($editBusName , $editBuslogo ,$editBusSlogan,$editBusAddress,$editbusAboutUs,$editBusDateFound);
                //reloading the page
               $business = $data-> get_business();
		include('../View/business_details.php');
                break;
}//End switch 