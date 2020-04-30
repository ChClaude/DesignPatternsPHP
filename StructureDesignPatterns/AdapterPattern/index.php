<?php

// Target/Client
interface Share {
    // Request
    public function shareData();
}

// Adapter/Service
class WhatsAppShare {
    // Special Request
    public function wappShare(String $string) {
        echo "Share data via WhatsApp: ' $string ' \n";
    }
}

// Adapter
class WhatsAppShareAdapter implements Share {

    private $whatsapp;
    private $data;

    /**
     * WhatsAppShareAdapter constructor.
     * @param $whatsapp
     * @param $data
     */
    public function __construct($whatsapp, String $data)
    {
        $this->whatsapp = $whatsapp;
        $this->data = $data;
    }


    public function shareData()
    {
        $this->whatsapp->wappShare($this->data);
    }
}

function clientCode(Share $share) {
    $share->shareData();
}

$wa = new WhatsAppShare();
$waShare = new WhatsAppShareAdapter($wa, "Hello Whatsapp");
clientCode($waShare);
