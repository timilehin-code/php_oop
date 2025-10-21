<?php

class BuyProduct extends visa{
    public function getPayment(){
        return $this->visaPayment();
    }
}