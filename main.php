<?php

// Includes.
include_once("utils/commands.php");
include_once("views/console.php");

// Greet user once before looping.
Console::log(Colors::cyan("Bienvenue dans votre gestionnaire de contacts en PHP, entrez la commande 'help' pour voir la liste des commandes disponibles."));

// Main program loop.
while (true) {

    // Read and parse command from terminal.
    [$command, $args] = Commands::parse(Console::input("\n>"));

    // Route command to its functions.
    switch ($command) {

        // Display contact list.
        case "list":
            Console::log("Affichage de la liste des contact...");
            break;

        // Unknown command.
        default:
            Console::error("'{$command}' n’est pas reconnu en tant que commande valide.");
    }
}