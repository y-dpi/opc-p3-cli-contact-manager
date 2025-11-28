<?php

// Utils.
include_once("./utils/colors.php");
include_once("./utils/console.php");
include_once("./utils/commands.php");

// Models.
include_once("./models/Contact.php");
include_once("./models/ContactManager.php");

// Contact controller where main logic resides.
class ContactController
{
    // List all existing contacts.
    public function listContacts(array $args = []) : void {

        // Reroute subcommand to its functions (if any).
        if (count($args)) {
            switch ($args[0]) {

                // Display contact list help subcommand.
                case "-h":
                case "help":
                case "--help":
                    array_shift($args);
                    $contactController = new ContactController();
                    $contactController->listHelpContacts($args);
                    return;
            }
        }

        // Validate arguments provided.
        if (count($args)) {
            throw new Exception("'{$args[0]}' n’est pas reconnu en tant que sous-commande de la commande 'list'.");
        }

        // Fetch list of contacts.
        $contactManager = new ContactManager();
        $contacts = $contactManager->getAllContacts();

        // Print list of contacts.
        foreach ($contacts as $contact) {
            Console::log(Colors::yellow($contact->getId()), "- {$contact->getName()}, {$contact->getEmail()}, {$contact->getPhoneNumber()}");
        }
    }

    // List all existing subcommands of the 'list' command.
    public function listHelpContacts(array $args = []) : void {

        // Print list of contacts.
        Console::log(Colors::brightBlack("La commande 'list' permet d'afficher la liste de tous les contacts de la base de donnée, elle n'accepte aucun argument pour le moment."));
    }
}