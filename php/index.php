<?php

require_once './vendor/autoload.php';
require_once './src/bootstrap.php';

use Src\Container\Container;
use Src\Controller\Controller;

$container = Container::createInstance();

// タイプヒントの型を取得するためにReflectionを使用
// https://www.php.net/manual/ja/book.reflection.php
$reflection = new ReflectionClass(Controller::class);
$constructor = $reflection->getConstructor();
$parameters = $constructor->getParameters();

// タイプヒントの型を取得して、依存性を解決する
$resolved = [];
foreach ($parameters as $parameter) {
    $type = $parameter->getType();
    $resolved[] = $container->resolve($type);
}

// Controller::classのコンストラクタを実行。
// 引数には依存性を解決したインスタンスを渡す。
$controller = $reflection->newInstanceArgs($resolved);

// hoge or piyo
$controller->printSomething();