<?php


// Class for retrieving JSON customer data from the database.
class assetsByDate {

  public $OOapi = null;

// Create Ooyala Api Object
// public function __construct() {
//
//
//   $OOapi = $Ooyala_api;
//
// }

// destruct
// public function __destruct() {
//
//
//  }

    // Takes customer account ID and spits back raw data with customer info.
    private function getAccountHeaderRaw($start_date,$end_date){
      return $this->$OOapi;
    }

    // Provides a JSON-ified version of the account header.
    public function getAssets($start_date,$end_date){

        if (file_exists("api_config_local.php")) {
            include_once("api_config_local.php");
        } else {
            include_once("api_config.php");
        }

        $params = array(
	     	"user_permission" => "admin",
	    	"limit" => "500",
	     	"where" =>"created_at>'".$start_date."' AND created_at<'".$end_date."'"
	        );

	      $results = $Ooyala_api->get("/v2/assets",$params);




        return json_encode($results);
    }



}

 ?>
