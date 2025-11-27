<?php

// Simple console color wrapper.
class Colors
{
    public static function black(mixed $value) {
        return "\e[30m{$value}\e[39m";
    }

    public static function red(mixed $value) {
        return "\e[31m{$value}\e[39m";
    }

    public static function green(mixed $value) {
        return "\e[32m{$value}\e[39m";
    }

    public static function yellow(mixed $value) {
        return "\e[33m{$value}\e[39m";
    }

    public static function blue(mixed $value) {
        return "\e[34m{$value}\e[39m";
    }

    public static function magenta(mixed $value) {
        return "\e[35m{$value}\e[39m";
    }

    public static function cyan(mixed $value) {
        return "\e[36m{$value}\e[39m";
    }

    public static function white(mixed $value) {
        return "\e[37m{$value}\e[39m";
    }

    public static function brightBlack(mixed $value) {
        return "\e[90m{$value}\e[39m";
    }

    public static function brightRed(mixed $value) {
        return "\e[91m{$value}\e[39m";
    }

    public static function brightGreen(mixed $value) {
        return "\e[92m{$value}\e[39m";
    }

    public static function brightYellow(mixed $value) {
        return "\e[93m{$value}\e[39m";
    }

    public static function brightBlue(mixed $value) {
        return "\e[94m{$value}\e[39m";
    }

    public static function brightMagenta(mixed $value) {
        return "\e[95m{$value}\e[39m";
    }

    public static function brightCyan(mixed $value) {
        return "\e[96m{$value}\e[39m";
    }

    public static function brightWhite(mixed $value) {
        return "\e[97m{$value}\e[39m";
    }
}