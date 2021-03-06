<?php
namespace Snowshoe;

class SSSApiClient { 
    protected $api_key = null;

    public function __construct($api_key) {
        $this->api_key = $api_key;
    }

    public function processData($data) {
        $api_key = $this->api_key;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.snowshoestamp.com/v3/stamp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"data\":$data}",
            CURLOPT_HTTPHEADER => array(
              "SnowShoe-Api-Key: $api_key",
              "Content-Type: application/json",
              "Accept-Encoding: identity"
            ),
          ));


        $return = curl_exec($curl);
        $curlError = curl_error($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        return $return;
    }
}
?>

