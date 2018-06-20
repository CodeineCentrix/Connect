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
require_once('../model/DBHelper.php');
require_once('../model/admin_model.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'Vendor_details';
    }
}

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
}//End switch 