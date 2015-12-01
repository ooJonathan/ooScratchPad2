<?php
if (file_exists("api_config_local.php")) {
    include_once("api_config_local.php");
} else {
    include_once("api_config.php");
}

var_dump($Ooyala_api);

?>
