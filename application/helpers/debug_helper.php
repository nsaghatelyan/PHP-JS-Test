<?php

namespace debug;

class debug
{

    public static function trace($arr)
    {
        echo "<pre style='background-color: #fff3b8;'>";
        print_r($arr);
        echo "</pre>";
    }

}