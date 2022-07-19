<?php
include_once __DIR__."/../src/CliUtils.php";

//Jtrw\DevUtils\CliUtils::color("\033[90G[ ERROR ]", "red");
Jtrw\DevUtils\CliUtils::$indent = "\033[20G";
Jtrw\DevUtils\CliUtils::e("asda");
//echo "test"."\033[90G\033[31;1m[ ERROR ]\033[m\n";
//print_r("Normal \e[5mBlink");