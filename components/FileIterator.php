<?php

namespace app\components;

use yii\base\Component;

class FileIterator extends Component implements \SeekableIterator
{
    private $position;

    private $file;

    /**
     * FileIterator constructor.
     * @param string $path
     */
    public function __construct($path)
    {
        parent::__construct();
        $this->file = File::getInstance($path);
    }

    /**
     * @param int $position
     */
    public function seek($position)
    {
        if ($position < 0 || $position >= $this->file->getCount()) {
            throw new \OutOfBoundsException("invalid seek position ($position)");
        }
        $this->position = $position;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return string
     */
    public function current()
    {
        return $this->file->getString($this->position);
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return $this->position < $this->file->getCount();
    }
}