<?php

require 'Slim/Slim.php';
require 'byDate.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// GET route
// Retrieves Assets by date.
// ROUTE: /api/v1/account
// PARAM: customer_id (GUID)
// PARAM: detail (string) all|header
// EXAMPLE: /api/v1/account?customer_id=1234&detail=all
$app->get(
    '/api/v1/assets_by_date',
    function () use ($app) {
        $start_date = $app->request()->get("start_date");
        $end_date = $app->request()->get("end_date");
        $assetsByDate = new assetsByDate();

          if(isset($start_date) && isset($end_date) ){
            $jsonData = $assetsByDate->getAssets($start_date ,$end_date );
          }
       else{
         $jsonData = "tests";
          //  throw new Exception(" is not a valid value for the detail parameter. Valid values are all, header.");
       }
        echo $jsonData;
    }
);

$app->run();


?>
