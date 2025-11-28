<?php

// Utils.
include_once("utils/Colors.php");
include_once("utils/Console.php");
include_once("utils/Commands.php");
include_once("utils/Messages.php");

// Controllers.
include_once("controllers/ContactController.php");

// Greet user once before looping.
Console::log(Colors::cyan(Messages::greetUser()));

// Main program loop.
while (true) {

    // Read and parse command from terminal.
    [$command, $args] = Commands::parse(Console::input("\n>"));

    // Route command to its functions.
    try {
        switch ($command) {

            // Display list of commands.
            case "-h":
            case "help":
            case "--help":
                $contactController = new ContactController();
                $contactController->help($args);
                break;

            // Display contact list.
            case "list":
                $contactController = new ContactController();
                $contactController->list($args);
                break;

            // Display contact details.
            case "detail":
                $contactController = new ContactController();
                $contactController->detail($args);
                break;

            // Create new contact.
            case "create":
                $contactController = new ContactController();
                $contactController->create($args);
                break;

            // Delete existing contact.
            case "delete":
                $contactController = new ContactController();
                $contactController->delete($args);
                break;

            // Unknown command.
            default:
                Console::error(Messages::unknownCommandError($command));
        }
    } catch (Exception $e) {

        // Command error.
        Console::error($e->getMessage());
    }
}