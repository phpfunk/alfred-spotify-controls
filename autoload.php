<?php
function __autoload($class)
{
    require dirname(__FILE__) . '/libs/' . $class . '.php';
}