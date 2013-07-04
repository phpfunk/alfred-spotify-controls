<?php

function __autoload($class)
{
    require 'libs/' . $class . '.php';
}