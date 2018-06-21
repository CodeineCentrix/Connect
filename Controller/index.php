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
        case 'show_business':
		$business = $data-> get_business();
		include('../View/business_details.php');
		break;
        case 'add_business':
		$editBusName = filter_input(INPUT_POST, 'editBusName',FILTER_SANITIZE_STRING);
		$editBusSlogan = filter_input(INPUT_POST, 'editBusSlogan',FILTER_SANITIZE_STRING);
		$editBusDateFound = filter_input(INPUT_POST, 'BusDateFound',filter_v);
		$editBuslogo = filter_input(INPUT_POST, 'editBuslogo',FILTER_SANITIZE_STRING);
		$editBusAddress = filter_input(INPUT_POST, 'editBusAddress',FILTER_SANITIZE_STRING);
		$editbusAboutUs = filter_input(INPUT_POST, 'editbusAboutUs',FILTER_SANITIZE_STRING);
                $i = 5;
                if($editBusName == FALSE || $editBusName == NULL)
                {
                    $editBusName = "jay z";
                }
		$data->EditBusiness( $editBusName, $editBusSlogan, $editBusDateFound,$editBuslogo,$editBusAddress,$editbusAboutUs);
//                IF($editBusName == FALSE || $editBus = NULL)
//                {
//                    $editBusName = 'Meeeeee';
//                }
//               $data->EditBusinessName($editBusName);
               $business = $data-> get_business();
		include('../View/business_details.php');
                break;
}//End switch 