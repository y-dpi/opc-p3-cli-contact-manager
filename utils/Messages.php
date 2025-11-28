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
        return "'{$subcommand}' n’est pas reconnu en tant que sous-commande ou argument de la commande '{$command}'.";
    }

    public static function unknownArgumentError(string $argName) {
        return "Impossible de fournir l'argument indexé '{$argName}' après un argument nommé lors de l'appel d'une commande.";
    }

    public static function tooManyArgumentsError(string $command, int $expected) {
        return "Trop d'arguments fournis lors de l'appel de la commande '{$command}', '{$expected}' attendus.";
    }

    public static function missingArgumentError(string $command, string ...$args) {
        $argNames = join("' ou '", $args) ?? "";
        return "La commande '{$command}' requiert un argument '{$argNames}', aucun n’a été fourni.";
    }

    public static function wrongTypeArgumentError(string $command, string $shouldBe, string ...$args) {
        $argNames = join("' ou '", $args) ?? "";
        return "La commande '{$command}' requiert un argument '{$argNames}' de type '{$shouldBe}'.";
    }

    public static function wrongLengthArgumentError(string $command, string $shouldBe, string ...$args) {
        $argNames = join("' ou '", $args) ?? "";
        return "La commande '{$command}' requiert un argument '{$argNames}' de '{$shouldBe}' caractères.";
    }

    public static function wrongFormatArgumentError(string $command, string $shouldBe, string ...$args) {
        $argNames = join("' ou '", $args) ?? "";
        return "La commande '{$command}' requiert un argument '{$argNames}' au format '{$shouldBe}'.";
    }

    public static function noContactError() {
        return "Aucun contact n'a été trouvé en base de donnée.";
    }

    public static function contactNotFoundError(string $id) {
        return "Aucun contact avec l'ID '{$id}' n’a été trouvé en base de donnée.";
    }

    /**
     * Help command messages.
     */

    public static function helpCommand() {
        return "Cet outil vous permet de gérer vos contact.\nVous pouvez utiliser les commandes suivantes :\n\t- 'list' : Affiche la liste des contacts.\n\t- 'detail <-i|--id>' : Affiche la liste des information sur un contact.\n\t- 'delete <-i|--id>' : Supprime un contact de la liste.\n\t- 'create <-n|--name> <-e|--email> <-p|--phone-number>' : Ajoute un contact à la liste.";
    }

    public static function listCommandHelp() {
        return "La commande 'list' permet d'afficher la liste de tous les contacts de la base de donnée, elle n'accepte aucun argument pour le moment.";
    }

    public static function detailCommandHelp() {
        return "La commande 'detail' permet d'afficher les informations d'un contact de la base de donnée, elle requiert un unique argument '--id' ou '-i' qui correspond à l'ID du contact.";
    }

    public static function createCommandHelp() {
        return "La commande 'create' permet d'ajouter un contact dans la base de donnée, elle requiert les arguments :\n\t- '--name' ou '-n' qui correspond au nom du contact à ajouter.\n\t- '--email' ou '-e' qui correspond à l'adresse mail du contact à ajouter.\n\t- '--phone-number' ou '-p' qui correspond au numéro de téléphone du contact à ajouter.";
    }

    public static function deleteCommandHelp() {
        return "La commande 'delete' permet de supprimer les informations d'un contact de la base de donnée, elle requiert un unique argument '--id' ou '-i' qui correspond à l'ID du contact.";
    }
}