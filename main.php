<?php

// Utils.
include_once("utils/colors.php");
include_once("utils/console.php");
include_once("utils/commands.php");

// Controllers.
include_once("controllers/ContactController.php");

// Greet user once before looping.
Console::log(
    Colors::cyan("Bienvenue dans votre gestionnaire de contacts en PHP,"),
    Colors::cyan("entrez la commande 'help' pour voir la liste des commandes disponibles.")
);

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
                Console::error("'{$command}' n’est pas reconnu en tant que commande valide.");
        }
    } catch (Exception $e) {

        // Command error.
        Console::error($e->getMessage());
    }
}