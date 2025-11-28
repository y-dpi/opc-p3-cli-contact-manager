<?php

// Utils.
include_once("Messages.php");

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

    // Format command line arguments into an assoc array.
    public static function mapArgs(string $command, array $args, array $rules) : array {

        // Prepare argument array.
        $res = [];
        foreach ($rules as $ruleName => $rule) {
            $res[$rule] = "";
        }

        // Parse command arguments.
        $cursor = 0;
        while (count($args)) {

            // Named arguments.
            if (array_key_exists($args[0], $rules)) {
                $key = array_shift($args);
                $res[$rules[$key]] = array_shift($args) ?? "";
                $cursor = -1;
                continue;
            }

            // Indexed arguments (only until named).
            if ($cursor !== -1) {
                if ($cursor >= count($res)) {
                    throw new Exception(Messages::tooManyArgumentsError($command, count($res)));
                }
                $keys = array_keys($res);
                $res[$keys[$cursor]] = array_shift($args) ?? "";
                $cursor++;
                continue;
            }

            // Throw exception if neither named or indexed after named.
            throw new Exception(Messages::unknownArgumentError(array_shift($args)));
        }
        return $res;
    }
}