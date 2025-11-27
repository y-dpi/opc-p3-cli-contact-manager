<?php

// Simple console formatting wrapper.
class Formats
{
    public static function normal(mixed $value) {
        return "\e[0m{$value}\e[0m";
    }

    public static function bold(mixed $value) {
        return "\e[1m{$value}\e[0m";
    }

    public static function dim(mixed $value) {
        return "\e[2m{$value}\e[0m";
    }

    public static function underline(mixed $value) {
        return "\e[4m{$value}\e[0m";
    }

    public static function blink(mixed $value) {
        return "\e[5m{$value}\e[0m";
    }

    public static function reverse(mixed $value) {
        return "\e[7m{$value}\e[0m";
    }

    public static function hidden(mixed $value) {
        return "\e[8m{$value}\e[0m";
    }
}