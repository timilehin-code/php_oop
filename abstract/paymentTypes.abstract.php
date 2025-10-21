<?php

 abstract class visa{
    public function visaPayment(){
        return "perform a payment";
    }

    abstract public function getPayment();
}