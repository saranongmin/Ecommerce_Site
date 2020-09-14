<?php
//
//// if you have order id generated catch the order_id key and query in your database. otherwise pass json data to postdata key of button to catch here
//
$post_data = array();
$post_data['store_id'] = "ecomm5e4a5e636485a";
$post_data['store_passwd'] = "ecomm5e4a5e636485a@ssl";

$post_data['total_amount'] = "103";
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://BladeTemplating/success";
$post_data['fail_url'] = "http://BladeTemplating/failed";
$post_data['cancel_url'] = "http://BladeTemplating/canceled";
# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = "Sara";
$post_data['cus_email'] = "test@test.com";
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = "01717277238";
$post_data['cus_fax'] = "01717277238";

# SHIPMENT INFORMATION
$post_data['ship_name'] = "blesi5e40dfcbbbd32";
$post_data['ship_add1 '] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = "ref001";
$post_data['value_b '] = "ref002";
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

# CART PARAMETERS
$post_data['cart'] = json_encode(array(
    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
));
$post_data['product_amount'] = "100";
$post_data['vat'] = "5";
$post_data['discount_amount'] = "5";
$post_data['convenience_fee'] = "3";


# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
    curl_close( $handle);
    $sslcommerzResponse = $content;
} else {
    curl_close( $handle);
    echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
    exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
    # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
    # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
    echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
    # header("Location: ". $sslcz['GatewayPageURL']);
    exit;
} else {
    echo "JSON Data parsing error!";
}




//
//$post_data = array();
//$post_data['store_id'] = "blesi5e40dfcbbbd32";
//$post_data['store_passwd'] = "blesi5e40dfcbbbd32@ssl";
//$post_data['total_amount'] = "50";
//$post_data['currency'] = "BDT";
//$post_data['tran_id'] = "your unique order id".uniqid();
//$post_data['success_url'] = "http://laravel6.test/success";
//$post_data['fail_url'] = "http://laravel6.test/failed";
//$post_data['cancel_url'] = "http://laravel6.test/canceled";
//
//# CUSTOMER INFORMATION
//$post_data['cus_name'] = "Ahosan";
//$post_data['cus_email'] = "mdahosanhabib@outlook.com";
//$post_data['cus_add1'] = "Dhaka";
//$post_data['cus_add2'] = "Dhaka";
//$post_data['cus_city'] = "Dhaka";
//$post_data['cus_state'] = "Dhaka";
//$post_data['cus_postcode'] = "1000";
//$post_data['cus_country'] = "Bangladesh";
//$post_data['cus_phone'] = '';
//$post_data['cus_fax'] = "";
//
//# SHIPMENT INFORMATION
//$post_data['ship_name'] = "blesi5e40dfcbbbd32";
//$post_data['ship_add1 '] = "Dhaka";
//$post_data['ship_add2'] = "Dhaka";
//$post_data['ship_city'] = "Dhaka";
//$post_data['ship_state'] = "Dhaka";
//$post_data['ship_postcode'] = "1000";
//$post_data['ship_country'] = "Bangladesh";
//
//# OPTIONAL PARAMETERS
//$post_data['value_a'] = "ref001";
//$post_data['value_b '] = "ref002";
//$post_data['value_c'] = "ref003";
//$post_data['value_d'] = "ref004";
//
//# EMI STATUS
//$post_data['emi_option'] = "1";
//
//# CART PARAMETERS
//$post_data['cart'] = json_encode(array(
//    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
//    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
//    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
//    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
//));
//$post_data['product_amount'] = "50";
//$post_data['vat'] = "5";
//$post_data['discount_amount'] = "5";
//$post_data['convenience_fee'] = "3";
//
//
////$post_data['allowed_bin'] = "3,4";
////$post_data['allowed_bin'] = "470661";
////$post_data['allowed_bin'] = "470661,376947";
//
//# REQUEST SEND TO SSLCOMMERZ
//$direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v4/api.php";
//
//$handle = curl_init();
//curl_setopt($handle, CURLOPT_URL, $direct_api_url );
//curl_setopt($handle, CURLOPT_TIMEOUT, 30);
//curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
//curl_setopt($handle, CURLOPT_POST, 1 );
//curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
//curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC
//
//
//$content = curl_exec($handle );
//
//$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
//
//if($code == 200 && !( curl_errno($handle))) {
//    curl_close( $handle);
//    $sslcommerzResponse = $content;
//} else {
//    curl_close( $handle);
//    echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
//    exit;
//}
//
//# PARSE THE JSON RESPONSE
//$sslcz = json_decode($sslcommerzResponse, true );
//
////var_dump($sslcz); exit;
//
//if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="") {
//    // this is important to show the popup, return or echo to sent json response back
//    return  json_encode(['status' => 'success', 'data' => $sslcz['GatewayPageURL'], 'logo' => $sslcz['storeLogo'] ]);
//} else {
//    return  json_encode(['status' => 'fail', 'data' => null, 'message' => "JSON Data parsing error!"]);
//}
