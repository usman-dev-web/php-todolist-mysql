<?php

// membuat helper untuk user menginputkan todo
namespace Utility {
    class Input
    {
        public static function input(string $info): string
        {
            echo "$info : " . PHP_EOL;

            $result = fgets(STDIN) . PHP_EOL;
            return trim($result);
        }
    }
}
