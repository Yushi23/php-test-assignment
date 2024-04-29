<?php

function registerClass($namespaces)
{
    $namespacesArr = explode('\\', $namespaces);
    $resultNamespacesArr = array_map(function ($key, $value) use ($namespacesArr) {
        return $key !== array_key_last($namespacesArr) ? strtolower($value) : $value;
    }, array_keys($namespacesArr), array_values($namespacesArr));
    $path = implode('\\', $resultNamespacesArr);
    require_once(__DIR__ . '/' . $path . '.php');
}

spl_autoload_register('registerClass');
