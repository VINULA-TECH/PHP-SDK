<?php namespace Vinupay;

class Transaction
{
    private $id;

    private $cid;

    private $encKey;

    private $checksumKey;

    private $amount;

    private $serviceURL;

    private $minAmount;

    private $channel;

    private $remark;

    private $source;

    private $terminalId;

    private $type;

    private $sid;

    private $requestTime;

    private $reciept;

    private $apiName;

    private $extTransactionId;

    private $startDate;

    private $endDate;

    private $pageSize;

    private $pageNo;

    private $pan;

    private $customerName;

    private $upiId;

    private $pupiId;

    private $apiRequest;

    private $customerEmail;

    private $customerPhone;

    public function __construct($object)
    {
        $this->id = $object->id;

        $this->cid = $object->cid;

        $this->encKey = $object->encKey;

        $this->checksumKey = $object->checksumKey;

        $this->amount = $object->amount;

        $this->serviceURL = $object->serviceURL;

        $this->minAmount = $object->minAmount;

        $this->channel = $object->channel;

        $this->remark = $object->remark;

        $this->source = $object->source;

        $this->terminalId = $object->terminalId;

        $this->type = $object->type;

        $this->sid = $object->sid;

        $this->requestTime = $object->requestTime;

        $this->reciept = $object->reciept;

        $this->apiName = $object->apiName;

        $this->extTransactionId = $object->extTransactionId;

        $this->startDate = $object->startDate;

        $this->endDate = $object->endDate;

        $this->pageSize = $object->pageSize;

        $this->pageNo = $object->pageNo;

        $this->pan = $object->pan;

        $this->customerName = $object->customerName;

        $this->upiId = $object->upiId;

        $this->pupiId = $object->pupiId;

        $this->apiRequest = $object->apiRequest;

        $this->customerEmail = $object->customerEmail;

        $this->customerPhone = $object->customerPhone;

    }

    public function getTransactionDetails() {
      return $this;
    }
}

?>
