<?php

// Models.
include_once("AbstractEntity.php");

// Contact object representing a contact in database. 
class Contact extends AbstractEntity 
{
    // Object fields in database.
    private string $name;
    private string $email;
    private string $phoneNumber;
    
    // Get contact name.
    public function getName(): string {
        return $this->name;
    }

    // Set contact name.
    public function setName(string $name): void {
        $this->name = $name;
    }

    // Get contact email.
    public function getEmail(): string {
        return $this->email;
    }

    // Set contact email.
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    // Get contact phone number.
    public function getPhoneNumber(): string {
        return $this->phoneNumber;
    }

    // Set contact phone number.
    public function setPhoneNumber(string $phoneNumber): void {
        $this->phoneNumber = $phoneNumber;
    }
}