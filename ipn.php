<?php

    MercadoPago\SDK::setAccessToken("ENV_ACCESS_TOKEN");

    switch($_POST["type"]) {
        case "payment":
            $data = MercadoPago\Payment::find_by_id($_POST["id"]);
            break;
        case "plan":
            $data = MercadoPago\Plan::find_by_id($_POST["id"]);
            break;
        case "subscription":
            $data = MercadoPago\Subscription::find_by_id($_POST["id"]);
            break;
        case "invoice":
            $data = MercadoPago\Invoice::find_by_id($_POST["id"]);
            break;
    }

    $json_string = json_encode($data);

  $file_handle = fopen('log.json', 'w');
  fwrite($file_handle, $json_string);
  fclose($file_handle);

?>