<?php

// Utils.
include_once("utils/Colors.php");
include_once("utils/Console.php");
include_once("utils/Commands.php");
include_once("utils/Messages.php");

// Controllers.
include_once("controllers/ContactController.php");

// Greet user once before looping.
Console::log(Messages::greetUser());

// Main program loop.
while (true) {

    // Read and parse command from terminal.
    [$command, $args] = Commands::parse(Console::input("\n>"));

    // Route command to its functions.
    try {
        switch ($command) {

            // Display contact list.
            case "list":
                $contactController = new ContactController();
                $contactController->listContacts($args);
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