<?php


namespace Lacuna\Amplia;


class IssueCertificateRequest
{
    public $orderId;
    public $csr;

    public function __construct($orderId, $csr)
    {
        $this->orderId = $orderId;
        $this->csr = $csr;
    }

    public function toModel()
    {
        return [
            "orderId" => $this->orderId ?: '00000000-0000-0000-0000-000000000000',
            "csr" => $this->csr
        ];
    }
}