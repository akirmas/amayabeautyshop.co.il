<?php if ( ! empty( $_REQUEST ) ): ?>
    <pre>
    <?php print_r($_REQUEST); ?>
    </pre>
<?php endif; ?>

<?php

function getToken($length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet);
    // edited
    for ($i=0; $i < $length; $i++)
        $token .= $codeAlphabet[random_int(0, $max-1)];
    return uniqid($token);
}

$payment_data = array(
    'merchantID' => '8057557',
    'url_redirect' => 'https://amayabeautyshop.co.il/payment-test.php',
    'url_notify' => 'https://amayabeautyshop.co.il/payment-test.php',
    'trans_comment' => 'Test comment',
    'trans_refNum' => getToken(12),
    'trans_installments' => '1',
    'trans_amount' => '1.00',
    'trans_currency' => 'USD',
    'disp_paymentType' => 'CC',
    'disp_payFor' => 'Purchase',
    'disp_recurring' => '0',
    'disp_lng' => 'he-IL',
    //'disp_lng' => 'en-US',
    'disp_mobile' => 'true',
    'client_fullName' => 'Test Name',
    'client_email' => 'test@test.com',
    'client_phoneNum' => '111',
    'client_idNum' => '111',
    'client_billAddress1' => 'Test address',
    'client_billCity' => 'Test city',
    'client_billZipcode' => '9084500',
    'client_billState' => 'Test State',
    'client_billCountry' => 'IL',
    'skin_no' => '1',
);

$PersonalHashKey	= "IRHLTOX3IM";

$retSignature = '';

foreach ( $payment_data as $value ) {
    $retSignature .= $value;
}

$retSignature .= $PersonalHashKey;

$payment_data['signature'] = base64_encode(hash("sha256", $retSignature, true));

$iframe_url = 'https://uiservices.coriunder.cloud/hosted?' . http_build_query( $payment_data );


?>

<iframe src="<?php echo $iframe_url; ?>" frameborder="0" style="width: 500px; height: 1000px;"></iframe>


















<?php

exit;

//parameters list
$merchantID			= "8057557";
//mandatory!
$url_redirect		= "https://amayabeautyshop.co.il/payment-test.php";
//optional
$url_notify			= "https://amayabeautyshop.co.il/payment-test.php";
//optional
$trans_comment		= "Test comment";
//optional
$trans_refNum		= getToken(12);
//optional
$trans_installments = "1";
//optional
$trans_amount		= "99.00";
//mandatory!
$trans_currency		= "USD";
//mandatory!
$disp_paymentType	= "CC";
//mandatory!
$disp_payFor		= "Purchase";
//optional
$disp_recurring		= "0";
//optional
$disp_lng			= "he-IL";
//optional
$disp_mobile		= "auto";

$client_fullName = 'client fullName';
$client_email = 'kostyatereshchuk@gmail.com';
$client_phoneNum = '111';
$client_idNum = '111';


$client_billAddress1 = 'Test address';
$client_billCity = 'Test city';
$client_billZipcode = '9084500';
$client_billState = 'client_billState';
$client_billCountry = 'IL';

$skin_no = '2';

//optional
$PersonalHashKey	= "IRHLTOX3IM";


//signature parameters list, the order of the values must be identical to the order in the form below

$retSignature = $merchantID . $url_redirect . $url_notify . $trans_comment . $trans_refNum .
    $trans_installments . $trans_amount . $trans_currency . $disp_paymentType .
    $disp_payFor . $disp_recurring . $disp_lng . $disp_mobile .
    $client_fullName . $client_email . $client_phoneNum . $client_idNum .
    $client_billAddress1 . $client_billCity . $client_billZipcode . $client_billState . $client_billCountry .
    $skin_no . $PersonalHashKey;

$signature = base64_encode(hash("sha256", $retSignature, true));
//mandatory!

?>

<form method="GET" action="https://uiservices.coriunder.cloud/hosted">
    <input type="text" style="width:400px" readonly name="merchantID" value="<?php echo($merchantID); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="url_redirect" value="<?php echo($url_redirect); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="url_notify" value="<?php echo($url_notify); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="trans_comment" value="<?php echo($trans_comment); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="trans_refNum" value="<?php echo($trans_refNum); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="trans_installments" value="<?php echo($trans_installments); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="trans_amount" value="<?php echo($trans_amount); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="trans_currency" value="<?php echo($trans_currency); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="disp_paymentType" value="<?php echo($disp_paymentType); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="disp_payFor" value="<?php echo($disp_payFor); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="disp_recurring" value="<?php echo($disp_recurring); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="disp_lng" value="<?php echo($disp_lng); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="disp_mobile" value="<?php echo($disp_mobile); ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_fullName" value="<?php echo $client_fullName; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_email" value="<?php echo $client_email; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_phoneNum" value="<?php echo $client_phoneNum; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_idNum" value="<?php echo $client_idNum; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_billAddress1" value="<?php echo $client_billAddress1; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_billCity" value="<?php echo $client_billCity; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_billZipcode" value="<?php echo $client_billZipcode; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_billState" value="<?php echo $client_billState; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="client_billCountry" value="<?php echo $client_billCountry; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="skin_no" value="<?php echo $skin_no; ?>" /> <br>
    <input type="text" style="width:400px" readonly name="signature" value="<?php echo($signature); ?>" /> <br>
    <input type="submit" value="Pay Now" style="height: 50px ; width: 170px ; font-size: 20px; background-color: #8dc059; color: #fff; border-radius: 4px; border: 0px; background-image: url(https://merchants.coriunder.cloud/Templates/Tmp_Coriunder/images/secure-icon-white.png); background-repeat: no-repeat; background-position: 10px 10px; padding-left: 26px;">
</form>