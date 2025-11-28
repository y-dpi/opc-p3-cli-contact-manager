<?php

// Models.
include_once("AbstractEntityManager.php");
include_once("Contact.php");

// Contact manager to handle contact in database.
class ContactManager extends AbstractEntityManager
{
    // Fetch all contacts from database.
    public function getAllContacts() : array {

        // SQL query.
        $sql = "SELECT * FROM contacts";
        $result = $this->db->query($sql);

        // Return contact objects.
        $contacts = [];
        while ($contact = $result->fetch()) {
            $contacts[] = new Contact($contact);
        }
        return $contacts;
    }

    // Fetch contact from database by ID.
    public function getContactById(int $id) : ?Contact {

        // SQL query.
        $sql = "SELECT * FROM contacts WHERE id = :id";
        $result = $this->db->query($sql, [
            "id" => $id
        ]);

        // Return contact object.
        if ($contact = $result->fetch()) {
            return new Contact($contact);
        }
        return null;
    }

    // Add new contact.
    public function addContact(Contact $contact) : void {
        $sql = "INSERT INTO contacts (name, email, phone_number) VALUES (:name, :email, :phone_number)";
        $this->db->query($sql, [
            "name" => $contact->getName(),
            "email" => $contact->getEmail(),
            "phone_number" => $contact->getPhoneNumber()
        ]);
    }

    // Edit existing contact.
    public function editContact(Contact $contact) : void {
        $sql = "UPDATE contacts SET name = :name, email = :email, phone_number = :phone_number WHERE id = :id";
        $this->db->query($sql, [
            "id" => $contact->getId(),
            "name" => $contact->getName(),
            "email" => $contact->getEmail(),
            "phone_number" => $contact->getPhoneNumber()
        ]);
    }

    // Delete existing contact.
    public function deleteContact(int $id) : void {
        $sql = "DELETE FROM contacts WHERE id = :id";
        $this->db->query($sql, ["id" => $id]);
    }
}