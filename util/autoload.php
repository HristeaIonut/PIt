<?php

function MyAutoload($class)
{
    if (file_exists(ROOT.SLASH."model".SLASH.strtolower($class).".php"))
    {
        require_once ROOT.SLASH."model".SLASH.strtolower($class).".php";
    }
    if (file_exists(ROOT.SLASH."view".SLASH.strtolower($class).".php"))
    {
        require_once ROOT.SLASH."view".SLASH.strtolower($class).".php";
    }
    if (file_exists(ROOT.SLASH."controller".SLASH.strtolower($class).".php"))
    {
        require_once ROOT.SLASH."controller".SLASH.strtolower($class).".php";
    }
    if (file_exists(ROOT.SLASH."util".SLASH.strtolower($class).".php"))
    {
        require_once ROOT.SLASH."util".SLASH.strtolower($class).".php";
    }
};

spl_autoload_register('MyAutoload');
