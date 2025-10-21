<?php

$AnonymousClass = new class(){
    public function greet(){
        return "Hello world";
    }
};

echo $AnonymousClass->greet();