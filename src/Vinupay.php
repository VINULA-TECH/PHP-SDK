<?php namespace Vinupay;

require 'vendor/autoload.php';

use Symfony\Component\ErrorHandler\Debug;
use GuzzleHttp\Client;
use stdClass;
require_once(__DIR__.'/Transaction.php');

class Payment{

  private $sid;
  private $callbackUrl;

  public function __construct($sid, $callbackUrl) {
    $this->sid = $sid;
    $this->callbackUrl = $callbackUrl;
  }

   public function generateTransferRequest($upiId, $customerName, $customerEmail, $customerPhone, $amount) {

     $client = new \GuzzleHttp\Client();
     $client1 = new \GuzzleHttp\Client();

     $headers = [
       'Content-Type' => 'application/json'
     ];

     $body['customerEmail'] = $customerEmail;
     $body['customerPhone'] = $customerPhone;
     $body['customerName'] = $customerName;
     $body['sid'] = $this->sid;
     $body['upiId'] = $upiId;
     $body['callbackUrl'] = $this->callbackUrl;

     $verifyVPAResponse = $client->request('POST', 'https://merchant.vinupay.com/verifyVPA', ['headers' => ['content-type'   => "application/json"] ,'body' => json_encode($body)]);
     $resp = json_decode($verifyVPAResponse->getBody()->getContents());

     $body['pupiId'] = $upiId;
     $body['extTransactionId'] = $resp->extTransactionId;
     $body['amount'] = $amount;
     print_r($body);
     $verifyVPATransferResponse = $client1->request('POST', 'https://merchant.vinupay.com/verifyTransferRequest', ['headers' => ['content-type'   => "application/json"] ,'body' => json_encode($body)]);

     $resp1 = json_decode($verifyVPATransferResponse->getBody()->getContents(), true);
     print_r($transaction);
     return $resp1;
   }

   public function generateQRString($customerEmail, $customerPhone, $amount) {
     $client = new \GuzzleHttp\Client();
     $body['customerEmail'] = $customerEmail;
     $body['customerPhone'] = $customerPhone;
     $body['customerName'] = $customerName;
     $body['amount'] = $amount;
     $body['sid'] = $this->sid;
     $body['callbackUrl'] = $this->callbackUrl;

     $response = $client->request('POST', 'https://merchant.vinupay.com/generateQR', ['headers' => ['content-type'   => "application/json"] ,'body' => json_encode($body)]);

     $resp1 = json_decode($response->getBody()->getContents(), true);
     return $resp1;
   }

   public function getTransactionStatus($extTransactionId) {
     $client = new \GuzzleHttp\Client();
     $body['sid'] = $this->sid;
     $body['extTransactionId'] = $extTransactionId;

     $response = $client->request('POST', 'https://merchant.vinupay.com/transactionStatus', ['headers' => ['content-type'   => "application/json"] ,'body' => json_encode($body)]);

     $resp1 = json_decode($response->getBody()->getContents(), true);
     return $resp1;
   }
}

?>
