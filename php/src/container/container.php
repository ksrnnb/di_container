<?php

namespace Src\Container;

class Container
{
    /**
     * オブジェクトを格納する
     */
    private $dependencies = [];

    private static $container;

    /**
     * コンテナを生成
     */
    private function __construct()
    {
        $this->dependencies = [];
    }

    /**
     * インスタンスを生成する
     */
    public static function createInstance()
    {
        if (!is_null(self::$container)) {
            return self::$container;
        }

        self::$container = new Container();
        return self::$container;
    }

    /**
     * コンテナにバインドする
     */
    public function bind(string $abstract, $concrete)
    {
        if (!is_null($this->dependencies[$abstract])) {
            throw new Exception("$abstract has already bound");
        }

        // TODO: 引数がある場合、クロージャーの場合などの処理
        $this->dependencies[$abstract] = new $concrete();
    }

    /**
     * 依存性を解決する
     */
    public function resolve(string $abstract)
    {
        if (is_null($this->dependencies[$abstract])) {
            throw new Exception("$abstract hasn't been bound");
        }

        return $this->dependencies[$abstract];
    }
}