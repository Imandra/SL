<?php

namespace app\components;

class File
{
    private static $instances = [];

    /**
     * @param string $path
     * @return mixed
     */
    public static function getInstance($path)
    {
        if (!array_key_exists($path, self::$instances)) {
            self::$instances[$path] = new self($path);
        }
        return self::$instances[$path];
    }

    private $handle;
    private $strings;
    private $count;

    /**
     * File constructor.
     * @param string $path
     */
    private function __construct($path)
    {
        $this->count = 0;
        $this->handle = fopen($path, "r");
        $this->definitionStrings();
    }

    private function definitionStrings()
    {
        $this->strings = new \SplFixedArray(30000000);
        $index = 0;
        while (fgets($this->handle) !== false) {
            $this->strings[$index] = ftell($this->handle);
            ++$this->count;
            ++$index;
        }
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $index
     * @return string
     * @throws \Exception
     */
    public function getString($index)
    {
        if ($index >= $this->getCount()) {
            throw new \Exception('Not');
        }
        if ($index === 0) {
            fseek($this->handle, 0);
        } else {
            fseek($this->handle, $this->strings[$index - 1]);
        }
        return rtrim(fgets($this->handle), PHP_EOL);
    }
}