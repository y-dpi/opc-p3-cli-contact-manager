<?php

// Utils.
include_once("./utils/Messages.php");

// Models.
include_once("./models/Contact.php");
include_once("./models/ContactManager.php");

// Views.
include_once("./views/Views.php");

// Contact controller where main logic resides.
class ContactController
{

    /**
     * FULL COMMAND FLOW -> 'list'
     */

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
            throw new Exception(Messages::unknownSubcommandError("list", $args[0]));
        }

        // Fetch list of contacts.
        $contactManager = new ContactManager();
        $contacts = $contactManager->getAllContacts();

        // Print list of contacts.
        $views = new Views();
        $views->printContactList($contacts);
    }

    // List all existing subcommands of the 'list' command.
    public function listHelpContacts(array $args = []) : void {

        // Validate arguments provided.
        if (count($args)) {
            throw new Exception(Messages::unknownSubcommandError("list help", $args[0]));
        }

        // Format help message.
        $message = Messages::listCommandHelp();

        // Print help message.
        $views = new Views();
        $views->printHelpMessage($message);
    }
}