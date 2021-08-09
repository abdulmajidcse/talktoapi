<?php
if (!function_exists('greetings')) {
    function greetings($name = 'Shahin'): string
    {
        return "Hello {$name}";
    }
}
