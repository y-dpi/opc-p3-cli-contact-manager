<?php

// Simple command parser.
class Commands
{
    // Format command line into command name and args.
    public static function parse(string $command) : array {

        // Parse command name.
        $parts = array_filter(str_getcsv($command, " "));
        $name = array_shift($parts) ?? "";

        // Parse commmand arguments.
        $args = $parts;

        // Return fully parsed command.
        return [$name, $args];
    }
}