<?php

// Utils.
include_once("Colors.php");
include_once("Formats.php");

// Simple console wrapper.
class Console
{
    // Console configuration.
    public const separator = " ";
    public const newline = "\n";

    // Print in console.
    public static function log(mixed ...$args) {
        foreach ($args as $arg) {
            echo $arg;
            echo self::separator;
        }
        echo self::newline;
    }

    // Print error in console.
    public static function error(mixed ...$args) {
        foreach ($args as $arg) {
            echo Colors::red($arg);
            echo self::separator;
        }
        echo self::newline;
    }

    // Get input from console.
    public static function input(mixed ...$args) {
        foreach ($args as $arg) {
            echo $arg;
            echo self::separator;
        }
        return readline();
    }
}