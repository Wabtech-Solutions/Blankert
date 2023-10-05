<?php
/***************************************************
 * AutoFeed
 ***************************************************/
namespace App\Library;

class AutoFeed
{
    /******************
     * Hubspot
     */
    protected $AutoId;
    protected $MerkAuto;
    protected $TypeAuto;
    protected $UitvoeringAuto;
    protected $AfbeeldingAuto;
    protected $BrandstofAuto;
    protected $TransmissieAuto;
    protected $FiscaleWaardeAuto;
    protected $BijtellingAuto;
    protected $URLAuto;
    protected $xml;
    protected $auto;


    protected function loadList(){
        $this->xml = simplexml_load_file('https://www.blankertshortlease.nl/feed-leasevergelijker.xml');
        $response = $this->xml->xpath("//post[id='$this->AutoId']");

        $this->auto = reset($response);

        $this->initFeedData();

    }

    protected function initFeedData()
    {

        if (isset($this->auto->Merk)){
            $this->MerkAuto = (string) $this->auto->Merk;
        }
        if (isset($this->auto->Type)){
            $this->TypeAuto = (string) $this->auto->Type;
        }
        if (isset($this->auto->Uitvoering)){
            $this->UitvoeringAuto = (string) $this->auto->Uitvoering;
        }
        if (isset($this->auto->Afbeelding)){
            $this->AfbeeldingAuto = (string) $this->auto->Afbeelding;
        }
        if (isset($this->auto->Brandstof)){
            $this->BrandstofAuto = (string) $this->auto->Brandstof;
        }
        if (isset($this->auto->Transmissie)){
            $this->TransmissieAuto = (string) $this->auto->Transmissie;
        }
        if (isset($this->auto->FiscaleWaarde)){
            $this->FiscaleWaardeAuto = (string) $this->auto->FiscaleWaarde;
        }
        if (isset($this->auto->Bijtelling)){
            $this->BijtellingAuto = (string) $this->auto->Bijtelling;
        }
        if (isset($this->auto->URL)){
            $this->URLAuto = (string) $this->auto->URL;
        }
    }

    public function getXmlData() {
        return $this->AutoId;
    }

    public function setAutoId(int $Id) {
        $this->AutoId = (int) $Id;
    }

    public function getAutoId() {
        return $this->MerkAuto;
    }

    public function getData() {
        $this->loadList();
    }

    public function getMerk() {
        $this->getData();
        dump($this->MerkAuto);
    }

    public function getType() {
        $this->getData();
        dump($this->TypeAuto);
    }

    public function getUitvoering() {
        $this->getData();
        dump($this->UitvoeringAuto);
    }

    public function getAfbeelding() {
        $this->getData();
        dump($this->AfbeeldingAuto);
    }

    public function getBrandstof() {
        $this->getData();
        dump($this->BrandstofAuto);
    }

    public function getTransmissie() {
        $this->getData();
        dump($this->TransmissieAuto);
    }

    public function getFiscaleWaarde() {
        $this->getData();
        dump($this->FiscaleWaardeAuto);
    }

    public function getBijtelling() {
        $this->getData();
        dump($this->BijtellingAuto);
    }

    public function getURL() {
        $this->getData();
        return $this->URLAuto;
    }
}
