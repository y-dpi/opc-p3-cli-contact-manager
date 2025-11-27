<?php

// Simple command parser.
class Commands
{
    // Format command line into command name and args.
    public static function parse(string $command) {

        // Split and format raw command.
        $parts = explode(" ", $command, 2);
        $res[0] = $parts[0] ?? "";
        $res[1] = $parts[1] ?? "";
        return $res;
    }
}