<?php

/**
 * Class Payment_Tranzila
 *
 * Info: https://github.com/astrails/active_merchant_tranzila/blob/master/lib/active_merchant/billing/gateways/tranzila.rb
 *
 * @author Kostya Tereshchuk, Coding Ninjas
 */
class Payment_Tranzila
{
    /**
     * @var string
     */
    protected $apiUrl = 'https://secure5.tranzila.com/cgi-bin/tranzila31.cgi';
    //protected $apiUrl = 'https://secure5.tranzila.com/cgi-bin/tranzila36a.cgi'; //Multicurrency

    /**
     * @var string
     */
    //protected $supplier = 'venus';
    protected $supplier = 'amaya';

    /**
     * Single instance of the class.
     *
     * @var Payment_Tranzila
     */
    protected static $_instance = null;

    /**
     * Payment_Tranzila instance.
     *
     * @static
     * @return Payment_Tranzila - Main instance
     */
    public static function instance()
    {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Executes request.
     *
     * @param string $url Url for payment method
     * @param array $requestFields Request data fields
     *
     * @return array Host response fields
     *
     * @throws RuntimeException Error while executing request
     */
    public function sendRequest( $requestFields )
    {
        $requestFields['supplier'] = $this->supplier;

        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, $this->apiUrl );
        curl_setopt( $curl, CURLOPT_POST, 1 );
        curl_setopt( $curl, CURLOPT_FAILONERROR, true );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $requestFields ) );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );

        $response = curl_exec( $curl );

        $error_message = '';

        if ( curl_errno( $curl ) ) {
            $error_message  = 'Error occurred: ' . curl_error( $curl );
            $error_code = curl_errno( $curl );
        } elseif ( curl_getinfo( $curl, CURLINFO_HTTP_CODE ) != 200 ) {
            $error_code = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
            $error_message  = "Error occurred. HTTP code: '{$error_code}'";
        }

        curl_close($curl);

        if ( $error_message ) {
            throw new RuntimeException($error_message, $error_code);
        }

        if ( empty ( $response ) ) {
            throw new RuntimeException('Host response is empty');
        }

        $responseFields = array();
        parse_str($response, $responseFields);

        $result = empty( $responseFields ) ? $response : $responseFields;

        return $result;
    }

}

//Payment_Tranzila::instance();
