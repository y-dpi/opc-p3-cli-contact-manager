<?php

// Models.
include_once("./models/Contact.php");

// Utils.
include_once("./utils/Colors.php");
include_once("./utils/Console.php");
include_once("./utils/Formats.php");

// Console print patterns handler.
class Views
{
    // Print help message in console.
    public function printHelpMessage(string $message) {
        Console::log(Colors::brightBlack($message));
    }

    // Print contact in console.
    public function printContact(Contact $contact) {

        // Print content.
        Console::log(
            Colors::yellow($contact->getId()),
            "-",
            Formats::bold($contact->getName()),
            "-",
            $contact->getEmail(),
            "-",
            Colors::green($contact->getPhoneNumber())
        );
    }

    // Print contact list flush in console.
    public function printContactList(array $contacts) {

        // Get max length for each elements.
        $maxLengths = [ "id" => 0, "name" => 0, "email" => 0, "phone_number" => 0,];
        foreach ($contacts as $contact) {
            if ($maxLengths["id"] < strlen($contact->getId()))
                $maxLengths["id"] = strlen($contact->getId());
            if ($maxLengths["name"] < strlen($contact->getName()))
                $maxLengths["name"] = strlen($contact->getName());
            if ($maxLengths["email"] < strlen($contact->getEmail()))
                $maxLengths["email"] = strlen($contact->getEmail());
            if ($maxLengths["phone_number"] < strlen($contact->getPhoneNumber()))
                $maxLengths["phone_number"] = strlen($contact->getPhoneNumber());
        }

        // Print padded content.
        foreach ($contacts as $contact) {
            Console::log(
                Colors::yellow(str_pad($contact->getId(), $maxLengths["id"], " ", STR_PAD_LEFT)),
                "-",
                Formats::bold(str_pad($contact->getName(), $maxLengths["name"], " ", STR_PAD_BOTH)),
                "-",
                str_pad($contact->getEmail(), $maxLengths["email"], " ", STR_PAD_BOTH),
                "-",
                Colors::green(str_pad($contact->getPhoneNumber(), $maxLengths["phone_number"], " ", STR_PAD_LEFT))
            );
        }
    }
}