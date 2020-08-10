<?php

require_once __DIR__.'/interface/SimulatorInterface.php';

/**
 * Class Simulator
 * Read the input from the file
 */
class Simulator implements SimulatorInterface
{
    /**
     * @var $action
     */

    protected $action;

    /**
     * Simulator constructor.
     * @param $action
     */

    public function __construct($action)
    {
        $this->action = $action;

    }

    /**
     * @param $file
     *
     * Read the file input
     */
    public function index($file)
    {

        $fileInfo = pathinfo($file);

        $ext = $fileInfo['extension'];

        if (Constants::FILE_EXT !== $ext) {
            throw new UnexpectedValueException('Invalid file type.');
        }


        $fh = fopen(__DIR__ . '/file/' . $file, 'r');

        while ($line = fgets($fh)) {
            $this->action->action($line);
        }

        fclose($fh);

    }

}