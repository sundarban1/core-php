<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Board.php';

class BoardTest extends TestCase

{

    /**
     * @var $board
     */

    protected $board;

    /**
     * Test case Setup
     */
    public function setUp(): void

    {
        parent::setUp();

        $this->board = new Board(5, 5);
    }

    /**
     * Test to check inside the board
     */
    public function testCheckBoundsCoordinates()
    {

        $this->assertTrue($this->board->checkBoundary(3, 3));
        $this->assertTrue($this->board->checkBoundary(5, 5));
        $this->assertTrue($this->board->checkBoundary(1, 3));
        $this->assertTrue($this->board->checkBoundary(4, 2));

    }

    /**
     * Test to check outside the board
     */

    public function testCheckNotBoundCoordinates()
    {

        $this->assertFalse($this->board->checkBoundary(-1, 3));
        $this->assertFalse($this->board->checkBoundary(6, 8));
        $this->assertFalse($this->board->checkBoundary(0, 6));
        $this->assertFalse($this->board->checkBoundary(-4, -3));
    }


}
