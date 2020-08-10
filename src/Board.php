<?php

require_once __DIR__.'/interface/BoardInterface.php';


/**
 * Class Board
 * Gives the information of the board
 */

class Board implements BoardInterface
{
    /**
     * @var int $height
     * height of the board
     */
    protected $height;

    /**
     * @var int $width
     *width of the board
     */
    protected $width;

    /**
     * Board constructor.
     * @param $height
     * @param $width
     */

    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }

    /**
     * @param $x
     * @param $y
     * @return bool
     *
     * Verify if robot is inside the boundary
     */

    public function checkBoundary($x, $y)
    {

        $check = false;

        if ((0 <= $x && $x <= $this->width) && (0 <= $y && $y <= $this->height)) {
            $check = true;
        }
        return $check;
    }


}