<?php
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
if ($city = $geo["geoplugin_city"]) {
    print_r($geo["geoplugin_city"]);
}
?>