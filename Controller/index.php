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
require_once('../model/database_handler.php');
require_once('../model/music_model.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = '';
    }
}

switch($action) {
	case 'list_products':
		$category_ID = filter_input(INPUT_GET, 'category_id', 
            FILTER_SANITIZE_STRING);
		if ($category_ID == NULL || $category_ID == FALSE) {
			$category_ID = "1";
		}
		$categories = get_categories();
		$products = get_products_by_category($category_ID);
		$category_name = get_category_name($category_ID);
		include('../view/product_list.php');
		break;
	
	case 'show_add_form':
		include ('../view/office_add.php');
		break;
}//End switch 