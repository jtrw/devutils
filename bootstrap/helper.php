<?php
if (!function_exists('dd')) {
    function dd(...$args)
    {
        echo "<pre>";
        print_r($args);
        echo "</pre>";
        exit;
    }
}
