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
}

public function add_vendor($vendor_name, $vendor_description, $face_account, $twit_account, $in_account, $web_link)
{
	$query = 'CALL uspAddVendor(:vendor_name, :vendor_description, :face_account, :twit_account, :in_account, :web_link)';
	$params = array(':vendor_name'=>$vendor_name, ':vendor_description'=>$vendor_description, ':face_account'=>$face_account, 'twit_account'=>$twit_account, ':in_account'=>$in_account, ':web_link'=>$web_link);
	DBHelper::Execute($query, $params);
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

