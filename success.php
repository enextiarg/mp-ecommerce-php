<?php 

require_once './vendor/autoload.php';
                                    
MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398"); 
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

$collection_id = $_GET['collection_id'];
$collection_status = $_GET['collection_status'];
$external_reference = $_GET['external_reference'];
$payment_type = $_GET['payment_type'];
$preference_id = $_GET['preference_id'];
$site_id = $_GET['site_id'];
$processing_mode = $_GET['processing_mode'];
$merchant_account_id = $_GET['merchant_account_id'];
$data = MercadoPago\Payment::find_by_id($collection_id);

?>

<h1>El pago haya sido exitoso.</h1>

<table>
    <tr>
      <td>payment_method_id</td>
      <td><?php echo $data->payment_method_id ?></td>
    </tr>
    <tr>
      <td>payment_type_id</td>
      <td><?php echo $data->payment_type_id ?></td>
    </tr>
    <tr>
      <td>payment_method_reference_id</td>
      <td><?php echo $data->transaction_details->payment_method_reference_id ?></td>
    </tr>
    <tr>
      <td>external_reference</td>
      <td><?php echo $external_reference ?></td>
    </tr>
    <tr>
      <td>payment_id o collection_id</td>
      <td><?php echo $collection_id ?></td>
    </tr>
    <tr>
      <td>preference_id</td>
      <td><?php echo $preference_id ?></td>
    </tr>
</table>

<?php 
require_once './vendor/autoload.php';
MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398"); 
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
$data = MercadoPago\Payment::find_by_id($collection_id);
?>
<pre>
{
	"action":"payment.created",
	"api_version":"v1",
	"data":{
		"id":"<?php echo $collection_id ?>"
	},
	"date_created":"<?php echo explode('.',$data->date_created)[0] ?>Z", 
	"id":<?php echo $data->order->id ?>,
	"live_mode":true,
	"type":"payment",
	"user_id":"<?php echo explode('-',$preference_id)[0] ?>"
}

</pre>

