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
     * FULL COMMAND FLOW -> 'help'
     */

    // List all existing commands.
    public function help(array $args = []) : void {

        // Map arguments using command rules.
        $args = Commands::mapArgs("help", $args, []);

        // Format help message.
        $message = Messages::helpCommand();

        // Print help message.
        $views = new Views();
        $views->printHelpMessage($message);
    }

    /**
     * FULL COMMAND FLOW -> 'list'
     */

    // List all existing contacts.
    public function list(array $args = []) : void {

        // Reroute subcommand to its functions (if any).
        if (count($args)) {
            switch ($args[0]) {

                // Reroute 'list help' subcommand.
                case "-h":
                case "help":
                case "--help":
                    array_shift($args);
                    $contactController = new ContactController();
                    $contactController->listHelp($args);
                    return;
            }
        }

        // Map arguments using command rules.
        $args = Commands::mapArgs("list", $args, []);

        // Fetch list of contacts.
        $contactManager = new ContactManager();
        $contacts = $contactManager->getAllContacts();

        // Contacts not found.
        if (!count($contacts)) {
            throw new Exception(Messages::noContactError());
        }

        // Print list of contacts.
        $views = new Views();
        $views->printContactList($contacts);
    }

    // List all existing subcommands of the 'list' command.
    public function listHelp(array $args = []) : void {

        // Map arguments using command rules.
        $args = Commands::mapArgs("list help", $args, []);

        // Format help message.
        $message = Messages::listCommandHelp();

        // Print help message.
        $views = new Views();
        $views->printHelpMessage($message);
    }

    /**
     * FULL COMMAND FLOW -> 'detail'
     */

    // Display contact details.
    public function detail(array $args = []) : void {

        // Reroute subcommand to its functions (if any).
        if (count($args)) {
            switch ($args[0]) {

                // Reroute 'detail help' subcommand.
                case "-h":
                case "help":
                case "--help":
                    array_shift($args);
                    $contactController = new ContactController();
                    $contactController->detailHelp($args);
                    return;
            }
        }

        // Map arguments using command rules.
        $args = Commands::mapArgs("detail", $args, [
            "-i" => "id",
            "--id" => "id"
        ]);

        // Validate provided ID.
        if (!strlen($args["id"])) {
            throw new Exception(Messages::missingArgumentError("detail", "-i", "--id"));
        }
        if (!ctype_digit($args["id"])) {
            throw new Exception(Messages::wrongTypeArgumentError("detail", "integer", "-i", "--id"));
        }
        $id = (int) $args["id"];

        // Fetch contact.
        $contactManager = new ContactManager();
        $contact = $contactManager->getContactById($id);

        // Contact not found.
        if ($contact === null) {
            throw new Exception(Messages::contactNotFoundError($id));
        }

        // Print contact.
        $views = new Views();
        $views->printContact($contact);
    }

    // List all existing subcommands of the 'detail' command.
    public function detailHelp(array $args = []) : void {

        // Map arguments using command rules.
        $args = Commands::mapArgs("detail help", $args, []);

        // Format help message.
        $message = Messages::detailCommandHelp();

        // Print help message.
        $views = new Views();
        $views->printHelpMessage($message);
    }

    /**
     * FULL COMMAND FLOW -> 'create'
     */

    // Create new contact.
    public function create(array $args = []) : void {

        // Reroute subcommand to its functions (if any).
        if (count($args)) {
            switch ($args[0]) {

                // Reroute 'create help' subcommand.
                case "-h":
                case "help":
                case "--help":
                    array_shift($args);
                    $contactController = new ContactController();
                    $contactController->createHelp($args);
                    return;
            }
        }

        // Map arguments using command rules.
        $args = Commands::mapArgs("create", $args, [
            "-n" => "name",
            "--name" => "name",
            "-e" => "email",
            "--email" => "email",
            "-p" => "phone_number",
            "--phone-number" => "phone_number",
        ]);

        // Validate provided name.
        if (!strlen($args["name"])) {
            throw new Exception(Messages::missingArgumentError("create", "-n", "--name"));
        }
        if (strlen($args["name"]) < 5) {
            throw new Exception(Messages::wrongLengthArgumentError("create", 5, "-n", "--name"));
        }
        $name = $args["name"];

        // Validate provided email.
        if (!strlen($args["email"])) {
            throw new Exception(Messages::missingArgumentError("create", "-e", "--email"));
        }
        if (strlen($args["email"]) < 10) {
            throw new Exception(Messages::wrongLengthArgumentError("create", 5, "-e", "--email"));
        }
        if (!filter_var($args["email"], FILTER_VALIDATE_EMAIL)) {
            throw new Exception(Messages::wrongFormatArgumentError("create", "user@example.com", "-e", "--email"));
        }
        $email = $args["email"];

        // Validate provided phone number.
        if (!strlen($args["phone_number"])) {
            throw new Exception(Messages::missingArgumentError("create", "-p", "--phone-number"));
        }
        if (strlen($args["phone_number"]) < 6) {
            throw new Exception(Messages::wrongLengthArgumentError("create", 5, "-p", "--phone-number"));
        }
        $phoneNumber = $args["phone_number"];

        // Create contact.
        $contact = new Contact();
        $contact->setName($name);
        $contact->setEmail($email);
        $contact->setPhoneNumber($phoneNumber);

        // Add contact to database.
        $contactManager = new ContactManager();
        $contactManager->addContact($contact);

        // Print contact.
        $views = new Views();
        $views->printContact($contact);
    }

    // List all existing subcommands of the 'create' command.
    public function createHelp(array $args = []) : void {

        // Map arguments using command rules.
        $args = Commands::mapArgs("create help", $args, []);

        // Format help message.
        $message = Messages::createCommandHelp();

        // Print help message.
        $views = new Views();
        $views->printHelpMessage($message);
    }

    /**
     * FULL COMMAND FLOW -> 'delete'
     */

    // Delete existing contact.
    public function delete(array $args = []) : void {

        // Reroute subcommand to its functions (if any).
        if (count($args)) {
            switch ($args[0]) {

                // Reroute 'detail help' subcommand.
                case "-h":
                case "help":
                case "--help":
                    array_shift($args);
                    $contactController = new ContactController();
                    $contactController->deleteHelp($args);
                    return;
            }
        }

        // Map arguments using command rules.
        $args = Commands::mapArgs("delete", $args, [
            "-i" => "id",
            "--id" => "id"
        ]);

        // Validate provided ID.
        if (!strlen($args["id"])) {
            throw new Exception(Messages::missingArgumentError("delete", "-i", "--id"));
        }
        if (!ctype_digit($args["id"])) {
            throw new Exception(Messages::wrongTypeArgumentError("delete", "integer", "-i", "--id"));
        }
        $id = (int) $args["id"];

        // Fetch contact.
        $contactManager = new ContactManager();
        $contact = $contactManager->getContactById($id);

        // Contact not found.
        if ($contact === null) {
            throw new Exception(Messages::contactNotFoundError($id));
        }

        // Delete contact.
        $contactManager->deleteContact($id);
        $contact->setId(-1);

        // Print contact.
        $views = new Views();
        $views->printContact($contact);
    }

    // List all existing subcommands of the 'delete' command.
    public function deleteHelp(array $args = []) : void {

        // Map arguments using command rules.
        $args = Commands::mapArgs("delete help", $args, []);

        // Format help message.
        $message = Messages::deleteCommandHelp();

        // Print help message.
        $views = new Views();
        $views->printHelpMessage($message);
    }
}