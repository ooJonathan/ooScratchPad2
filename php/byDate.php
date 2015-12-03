<?php
// Carlos Amed Castro Valadez
// v1.0.0
// Class for retrieving JSON data from the API

class assetsByDate {

  protected $Ooyala_api = null;


  public function __construct($apiKey = null ,$Secret = null ) {
// Create Ooyala API object with URL provided keys or with configured keys if config file exist
    if(!is_null($apiKey) && !is_null($Secret) ){
      include_once("../config/api_config.php");
    }
    else if (file_exists("../config/api_config_local.php")) {
        include_once("../config/api_config_local.php");
    } else {
        include_once("../config/api_config.php");
    }

$this->Ooyala_api = new OoyalaApi($apiKey, $Secret);

}

public function __destruct() {
// destruct stuff
}

    // Takes private function to get data from the Ooyala SDK using the URL and Params.
    private function getData($url,$params=null){
      if(is_null($params)){
        return $this->Ooyala_api->get($url);
      }

      return $this->Ooyala_api->get($url,$params);
    }
    // Provides a JSON-ified version of the Asssets in between dates.
    public function getAssetsInBetween($start_date,$end_date,$limit=500,$page_token =null){

        $params = array(
	     	"user_permission" => "admin",
	    	"limit" => $limit,
	     	"where" =>"created_at>'".$start_date."' AND created_at<'".$end_date."'"
	        );

          //Add next page parameter if it exist
          if(!is_null($page_token)){
           $params["page_token"] =$page_token;
          }

	      $results = $this->getData("/v2/assets",$params);
        return json_encode($results);
    }

     // Provides a JSON-ified version of the Asssets in after a certain date.
    public function getAssetsAfter($start_date,$limit=500){
        $params = array(
        "user_permission" => "admin",
        "limit" => $limit,
        "where" =>"created_at>'".$start_date."'"
          );
          //Add next page parameter if it exist
          if(!is_null($page_token)){
           $params["page_token"] =$page_token;
          }
          // Get API Data results
        $results = $this->getData("/v2/assets",$params);
        return json_encode($results);
    }


    // Provides a JSON-ified version of the Asssets in after a certain date.
   public function getAssetsBefore($end_date,$limit=500,$page_token){

       $params = array(
       "user_permission" => "admin",
       "limit" => $limit,
       "where" =>"created_at<'".$end_date."'"
         );
         //Add next page parameter if it exist
         if(!is_null($page_token)){
           $params["where"] .= "&page_token".$page_token;
         }
       $results = $this->getData("/v2/assets",$params);
       return json_encode($results);
   }

   // Provides a JSON-ified version of the Asssets No Dates .
  public function getAssets($limit = 500,$page_token=null){
      $params = array(
      "user_permission" => "admin",
      "limit" => $limit
        );
        //Add next page parameter if it exist
       if(!is_null($page_token)){
        $params["page_token"] =$page_token;
       }


      $results = $this->getData("/v2/assets",$params);
      return json_encode($results);
  }
  // Provides a JSON-ified version of 1 Assset details .
 public function getAsset($embed_code,$limit = 500,$metadata = null ,$labels = null ){

     $params = array(
     "user_permission" => "admin",
     "limit" => $limit
   //  "where" =>"created_at<'".$end_date."'"
       );
     if(!is_null($metadata)){
       $params["where"] = "include=metadata";
     }

     if(!is_null($page_token)){
      $params["page_token"] =$page_token;
     }

     if(!is_null($labels)){
         if (is_null($params["where"])){
           $params["where"] ="include=metadata";
         }else {
           $params["where"] .=",labels";
         }
     }
     $results = $this->getData("/v2/assets/".$embed_code,$params);
     return json_encode($results);
 }




}

 ?>
