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
include'../Model/DBHelper.php';
class admin_model {
 
    
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
 
    
    /*Region: */
    
    /* End news coverage */
    
    
    /*Region: Gallery */
    public function add_picture($param) {
        $stored_procedure="CALL usp";
        $params = array(
            
        );
        return DBHelper::Execute($stored_procedure, $params);
    }
    
    public function remove_picture($param) {
       $stored_procedure = "CALL usp";
       $params = array(
           
       );
       return DBHelper::Execute($sql, $params);
    }
    /*End Gallery*/
}
