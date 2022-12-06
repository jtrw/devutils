<?php
namespace Jtrw\DevUtils;

class CliUtils
{
    public static string $indent = "\033[90G";
    
    /**
     * @param string $msg
     *
     * @return void
     */
    public static function e(string $msg): void
    {
        print_r($msg.static::$indent."\033[31;1m[ ERROR ]\033[m\n");
    }
    
    /**
     * @param string $msg
     *
     * @return void
     */
    public static function s(string $msg): void
    {
        print_r($msg."\033[90G\033[32;1m[ OK ]\033[m\n");
    }
    
    /**
     * @param string $msg
     *
     * @return void
     */
    public static function w(string $msg): void
    {
        print_r($msg."\033[90G\033[33;1m[ Warning ]\033[m\n");
    }
    
    /**
     * @param string $msg
     *
     * @return void
     */
    public static function i(string $msg): void
    {
        print_r($msg."\033[90G\033[34;1m[ Info ]\033[m\n");
    }
    
    /**
     * @param string $str
     * @param string|null $color
     *
     * @return void
     */
    public static function color(string $str, string $color = null): void
    {
        $colors = [];
        $colors['black'] = '0;30';
        $colors['dark_gray'] = '1;30';
        $colors['blue'] = '0;34';
        $colors['light_blue'] = '1;34';
        $colors['green'] = '0;32';
        $colors['light_green'] = '1;32';
        $colors['cyan'] = '0;36';
        $colors['light_cyan'] = '1;36';
        $colors['red'] = '0;31';
        $colors['light_red'] = '1;31';
        $colors['purple'] = '0;35';
        $colors['light_purple'] = '1;35';
        $colors['brown'] = '0;33';
        $colors['yellow'] = '1;33';
        $colors['light_gray'] = '0;37';
        $colors['white'] = '1;37';
        
        if (!isset($colors[$color])) {
            echo $str;
        } else {
            print_r("\033[" . $colors[$color] . "m".$str."\033[0m\n");
        }
    }
}
