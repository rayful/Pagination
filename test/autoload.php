<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 2017/8/13
 * Time: 下午10:46
 */
require( __DIR__ . "/../vendor/autoload.php");

spl_autoload_register(function ($className) {
    $className = str_replace("rayful\\Tool\\Pagination", "", $className);
    require(__DIR__ . "/../src/" . str_replace("\\", "/", $className) . ".php");
});