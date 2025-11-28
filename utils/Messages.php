<?php

// Simple error message wrapper.
class Messages
{
    public static function greetUser() {
        return "Bienvenue dans votre gestionnaire de contacts en PHP, entrez la commande 'help' pour voir la liste des commandes disponibles.";
    }

    /**
     * Error messages.
     */

    public static function unknownCommandError(string $command) {
        return "'{$command}' n’est pas reconnu en tant que commande valide.";
    }

    public static function unknownSubcommandError(string $command, string $subcommand) {
        return "'{$subcommand}' n’est pas reconnu en tant que sous-commande de la commande '{$command}'.";
    }

    /**
     * Help command messages.
     */

    public static function listCommandHelp() {
        return "La commande 'list' permet d'afficher la liste de tous les contacts de la base de donnée, elle n'accepte aucun argument pour le moment.";
    }
}