<?php
// Carlos Amed Castro Valadez
// v1.0.0

require '../vendor/Slim/Slim.php';
require 'byDate.php';
require 'rootLabels.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// GET route
$app->get(
    '/',
    function () {
      $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $template = <<<EOT
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title>Scratchpad 2</title>
            <style>
                html,body,div,span,object,iframe,
                h1,h2,h3,h4,h5,h6,p,blockquote,pre,
                abbr,address,cite,code,
                del,dfn,em,img,ins,kbd,q,samp,
                small,strong,sub,sup,var,
                b,i,
                dl,dt,dd,ol,ul,li,
                fieldset,form,label,legend,
                table,caption,tbody,tfoot,thead,tr,th,td,
                article,aside,canvas,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section,summary,
                time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent;}
                body{line-height:1;}
                article,aside,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section{display:block;}
                nav ul{list-style:none;}
                blockquote,q{quotes:none;}
                blockquote:before,blockquote:after,
                q:before,q:after{content:'';content:none;}
                a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent;}
                ins{background-color:#ff9;color:#000;text-decoration:none;}
                mark{background-color:#ff9;color:#000;font-style:italic;font-weight:bold;}
                del{text-decoration:line-through;}
                abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help;}
                table{border-collapse:collapse;border-spacing:0;}
                hr{display:block;height:1px;border:0;border-top:1px solid #cccccc;margin:1em 0;padding:0;}
                input,select{vertical-align:middle;}
                html{ background: #EDEDED; height: 100%; }
                body{background:#FFF;margin:0 auto;min-height:100%;padding:0 30px;width:940px;color:#666;font:14px/23px Arial,Verdana,sans-serif;}
                h1,h2,h3,p,ul,ol,form,section{margin:0 0 20px 0;}
                h1{color:#333;font-size:20px;}
                h2,h3{color:#333;font-size:14px;}
                h3{margin:0;font-size:12px;font-weight:bold;}
                ul,ol{list-style-position:inside;color:#999;}
                ul{list-style-type:square;}
                code,kbd{background:#EEE;border:1px solid #DDD;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:0 4px;color:#666;font-size:12px;}
                pre{background:#EEE;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:5px 10px;color:#666;font-size:12px;}
                pre code{background:transparent;border:none;padding:0;}
                a{color:#70a23e;}
                header{padding: 30px 0;text-align:center;}
            </style>
        </head>
        <body>
            <header>
                <h1>Scratchpad 2.0</h1>
            </header>
            <h1>Welcome to Scratchpad 2.0 test</h1>
            <p>
                Congratulations! Your Slim application is running. If this is
                your first time using Slim, start with this <a href="http://docs.slimframework.com/#Hello-World" target="_blank">"Hello World" Tutorial</a>.
            </p>
            <section>
                <h2>Get Started</h2>
                <ol>
                    <li>The application code is in <code>scratch_pad_API.php</code></li>
                    <li>you can either add the API key and secret on the following file <code>api_config.php</code></li>
                    <li>or provide the api_key and secret on the URL is you want to use it dimanycally </li>
                    <li>Read the <a href="#" target="_blank">read the following documentation</a></li>

                </ol>
            </section>

            <section style="padding-bottom: 20px">
                <h2>Here is an example on how it should work </h2>
                <p>
                    Custom View classes for Smarty, Twig, Mustache, and other template\n
                    You will need to provide your API KEY and Secret example:\n</p>

                  <p>  GET route\n</p>
                <p>    Retrieves Assets by date if no date it will return first X defned assets\n</p>
                  <p>  ROUTE:required /v1/assets/by_date \n</p>
                  <p>  PARAM:optional start_date (created_at value from an embed code alid values YYYY-MM-DD)\n</p>
                  <p>  PARAM:optional  end_date (created_at value from an embed code valid values YYYY-MM-DD)\n</p>
                  <p>  PARAM:optional  limit (limit the results from the response valid values 1 - 500)\n</p>
                  <p>  PARAM:required api_key (can be defined in the api_config or api_config_local)\n</p>
                  <p>  PARAM:required secret (can be defined in the api_config or api_config_local)\n</p>
                  <p>  PARAM:optional page_token example 51049959 should be used from next_page:\/v2\/assets?limit=1&user_permission=ooyala&page_token=51049959\n</p>

                    <a href="$actual_link/v1/assets/by_date?limit=30&start_date=2015-08-10&end_date=2015-10-10" target="_blank" >/v1/assets/by_date?limit=30&start_date=2015-08-10&end_date=2015-10-10&api_key=qweqweq13r&secret=21jkasldh1l23ffas</a>.
                </p>
            </section>
        </body>
    </html>
EOT;
        echo $template;
    }
);


// GET route
// Retrieves Assets by date if no date it will return first X defned assets
// ROUTE:required /v1/assets/by_date
// PARAM:optional start_date (created_at value from an embed code alid values YYYY-MM-DD)
// PARAM:optional  end_date (created_at value from an embed code valid values YYYY-MM-DD)
// PARAM:optional  limit (limit the results from the response valid values 1 - 500)
// PARAM:required api_key (can be defined in the api_config or api_config_local)
// PARAM:required secret (can be defined in the api_config or api_config_local)
// PARAM:optional page_token example 51049959 should be used from "next_page":"\/v2\/assets?limit=1&user_permission=ooyala&page_token=51049959
// EXAMPLE: /v1/assets/by_date?limit=30&start_date=2015-08-10&end_date=2015-10-10
$app->get(
    '/v1/assets/by_date',
    function () use ($app) {
        ///Get all applicable URL parameters
        $start_date = $app->request()->get("start_date");
        $end_date = $app->request()->get("end_date");
        $page_token = $app->request()->get("page_token");
        $apiKey = $app->request()->get("api_key");
        $Secret = $app->request()->get("secret");
        $limit = $app->request()->get("limit");

        $assetsByDate = new assetsByDate($apiKey ,$Secret );

          if(isset($start_date) && isset($end_date) ){
            $jsonData = $assetsByDate->getAssetsInBetween($start_date ,$end_date,$limit,$page_token );
          }
          else if (isset($start_date) && !isset($end_date) ) {
            $jsonData = $assetsByDate->getAssetsAfter($start_date,$limit,$page_token );
          }
          else if (!isset($start_date) && isset($end_date) ) {
            $jsonData = $assetsByDate->getAssetsBefore($end_date ,$limit,$page_token);
          }
          else if (!isset($start_date) && !isset($end_date) ) {
            $jsonData = $assetsByDate->getAssets($limit,$page_token);
          }
          else if (!isset($start_date) && !isset($end_date) ) {
            $jsonData = $assetsByDate->getAssets($limit,$page_token);
          }
       else{
        throw new Exception(" No valid parameters have been submitted");
       }
        echo $jsonData;
    }
);
//http://localhost/Ooyala/SP2/php/scratch_pad_API.php/v1/labels/root_labels?limit=30&api_key=psdnIxOp5EspFvxY5BhtYvVhsbfw.p3BB9&secret=FfdJDNQ6D10itPWaYviOyOwP2rAKYnyaxoqLc6JP
$app->get(
    '/v1/labels/root_labels',
    function () use ($app) {
        ///Get all applicable URL parameters
        $page_token = $app->request()->get("page_token");
        $apiKey = $app->request()->get("api_key");
        $Secret = $app->request()->get("secret");
        $limit = $app->request()->get("limit");

        $rootLabel = new rootLabels($apiKey ,$Secret );

        $jsonData = $rootLabel->getRoots($limit,$page_token );
        echo $jsonData;
    }
);
//http://localhost/Ooyala/SP2/php/scratch_pad_API.php/v1/labels/sub_labels?limit=30&api_key=psdnIxOp5EspFvxY5BhtYvVhsbfw.p3BB9&secret=FfdJDNQ6D10itPWaYviOyOwP2rAKYnyaxoqLc6JP&root=33339c0a5c89487da9290e964707a966
$app->get(
    '/v1/labels/sub_labels',
    function () use ($app) {
        ///Get all applicable URL parameters
        $page_token = $app->request()->get("page_token");
        $apiKey = $app->request()->get("api_key");
        $Secret = $app->request()->get("secret");
        $limit = $app->request()->get("limit");
        $root = $app->request()->get("root");

        $rootLabel = new rootLabels($apiKey ,$Secret );

        $jsonData = $rootLabel->getSubLabels($root,$limit,$page_token);
        
        echo $jsonData;
    }
);

$app->get(
    '/v1/asset/',
    function () use ($app) {

         $limit = $app->request()->get("limit");
         $embed = $app->request()->get("embed_code");
         $metadata = $app->request()->get("metadata");
         $labels = $app->request()->get("labels");
         $apiKey = $app->request()->get("api_key");
         $Secret = $app->request()->get("secret");
         $assetsByDate = new assetsByDate( $apiKey ,$Secret );
          if(isset($embed)){
            $jsonData = $assetsByDate->getAsset($embed,$limit,$metadata,$labels );
          }
       else{
        throw new Exception(" No valid embed code  has been submitted");
       }
        echo $jsonData;
    }
);
///Get next page item


$app->run();


?>
