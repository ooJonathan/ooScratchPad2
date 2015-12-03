<?php

require 'Slim/Slim.php';
require 'byDate.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// GET route
// Retrieves Assets by date if no date it will return first X defned assets
// ROUTE: /v1/assets/by_date
// PARAM: start_date (created_at value from an embed code alid values YYYY-MM-DD)
// PARAM: end_date (created_at value from an embed code valid values YYYY-MM-DD)
// PARAM: limit (limit the results from the response valid values 1 - 500)

// EXAMPLE: /v1/assets/by_date
$app->get(
    '/v1/assets/by_date',
    function () use ($app) {
        $start_date = $app->request()->get("start_date");
        $end_date = $app->request()->get("end_date");
        $assetsByDate = new assetsByDate();
         $limit = $app->request()->get("limit");
          if(isset($start_date) && isset($end_date) ){
            $jsonData = $assetsByDate->getAssetsInBetween($start_date ,$end_date,$limit );
          }
          else if (isset($start_date) && !isset($end_date) ) {
            $jsonData = $assetsByDate->getAssetsAfter($start_date,$limit );
          }
          else if (!isset($start_date) && isset($end_date) ) {
            $jsonData = $assetsByDate->getAssetsBefore($end_date ,$limit);
          }
          else if (!isset($start_date) && !isset($end_date) ) {
            $jsonData = $assetsByDate->getAssets($limit);
          }
          else if (!isset($start_date) && !isset($end_date) ) {
            $jsonData = $assetsByDate->getAssets($limit);
          }
       else{
        throw new Exception(" No valid parameters have been submitted");
       }
        echo $jsonData;
    }
);


$app->run();


?>
