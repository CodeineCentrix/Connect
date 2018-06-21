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
                
                
                
                
                
                
                
                /*Healings section fellas*/
        case 'maintain_events':
            //Check if user has entered data and is ready to add to the database
           $events_combo = $data->get_events();
            $test_input = filter_input(INPUT_POST, 'addEvent');
            if (isset($test_input)) {
                $event_start_date = filter_input(INPUT_POST, 'dte_start_date');
                $event_end_date = filter_input(INPUT_POST, 'dte_end_date');
                $event_name = filter_input(INPUT_POST, 'txtAlias');
                $event_desc = filter_input(INPUT_POST, 'txtDescription');
                $event_address = filter_input(INPUT_POST, 'txtAddress');
                $ticket_desc = filter_input(INPUT_POST, 'txttickets_infos');
                $first_price = filter_input(INPUT_POST, 'txtdaily_price');
                $second_price = filter_input(INPUT_POST, 'txtweekend_price');
                $event_added = $data->add_event($event_name, $event_start_date, $event_address, $event_desc,
                        $event_end_date, $first_price, $second_price, $ticket_desc);
            }
            //check if you're simply retrieving event details
            $test_input = filter_input(INPUT_POST, 'isSearch');
            if(isset($test_input)){
                $eveID = filter_input(INPUT_POST, 'cmbEvent');
                $event_details = $data->get_event($eveID);               
            }
            //check if you're editing an event
            $test_input = filter_input(INPUT_POST, 'isUpdate');
             if(isset($test_input)){
                $event_ID = filter_input(INPUT_POST, 'cur_event');
                 $event_start_date = filter_input(INPUT_POST, 'dte_start_date');
                $event_end_date = filter_input(INPUT_POST, 'dte_end_date');
                $event_name = filter_input(INPUT_POST, 'txtAlias');
                $event_desc = filter_input(INPUT_POST, 'txtDescription');
                $event_address = filter_input(INPUT_POST, 'txtAddress');
                $ticket_desc = filter_input(INPUT_POST, 'txttickets_infos');
                $first_price = filter_input(INPUT_POST, 'txtdaily_price');
                $second_price = filter_input(INPUT_POST, 'txtweekend_price');
                $event_edited = $data->edit_event($event_ID,$event_name, $event_start_date, $event_address, $event_desc,
                        $event_end_date, $first_price, $second_price, $ticket_desc);               
            }
            include'../View/events_details.php';
            break;
        
        case 'maintain_timelines':
            break;
        
        case 'maintain_sponsors':
            break;
        
        case'maintain_sponsors':
            break;
                /*End Healings section*/
}//End switch 
