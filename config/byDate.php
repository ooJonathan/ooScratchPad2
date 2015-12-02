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
    private function getData($url,$params){
      if (file_exists("api_config_local.php")) {
          include_once("api_config_local.php");
      } else {
          include_once("api_config.php");
      }

      return $Ooyala_api->get($url,$params);
    }
    // Provides a JSON-ified version of the Asssets in between dates.
    public function getAssetsInBetween($start_date,$end_date,$limit=500){

        $params = array(
	     	"user_permission" => "admin",
	    	"limit" => $limit,
	     	"where" =>"created_at>'".$start_date."' AND created_at<'".$end_date."'"
	        );
	      $results = $Ooyala_api->get("/v2/assets",$params);
        return json_encode($results);
    }
     // Provides a JSON-ified version of the Asssets in after a certain date.
    public function getAssetsAfter($start_date,$limit=500){
        $params = array(
        "user_permission" => "admin",
        "limit" => $limit,
        "where" =>"created_at>'".$start_date."'"
          );
        $results = $this->getData("/v2/assets",$params);
        return json_encode($results);
    }


    // Provides a JSON-ified version of the Asssets in after a certain date.
   public function getAssetsBefore($end_date,$limit=500){

       $params = array(
       "user_permission" => "admin",
       "limit" => $limit,
       "where" =>"created_at<'".$end_date."'"
         );
       $results = $this->getData("/v2/assets",$params);
       return json_encode($results);
   }

   // Provides a JSON-ified version of the Asssets No Dates .
  public function getAssets($limit = 500){

      $params = array(
      "user_permission" => "admin",
      "limit" => $limit
    //  "where" =>"created_at<'".$end_date."'"
        );
      $results = $this->getData("/v2/assets",$params);
      return json_encode($results);
  }



}

 ?>
