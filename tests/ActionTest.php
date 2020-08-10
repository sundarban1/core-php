<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Board.php';
require_once __DIR__ . '/../src/Action.php';

class ActionTest extends TestCase

{

    /**
     * @var $board
     */

    protected $board;

    /**
     * @var $action
     */

    protected $action;

    /**
     * Test case Setup
     */
    public function setUp(): void

    {
        parent::setUp();

        $this->board = new Board(5, 5);
        $this->action = new Action($this->board);
    }

    /**
     * Test to check inside the board
     */
    public function testValidCommands()
    {
        $this->action->currPlace('1,2,EAST');
        $this->assertEquals($this->action->report(), '1,2,EAST');
    }

    /**
     * Test to check invalid commands
     */

    public function testInValidCommands()
    {
        $this->action->currPlace('1,2,EAST');
        $this->assertNotEquals($this->action->report(), '1,2,WEST');
    }

    /**
     * Test valid move commands
     */

    public function testValidMoveCommands()
    {
        $this->action->currPlace('3,4,WEST');
        $this->action->move();
        $this->assertEquals($this->action->report(), '2,4,WEST');
    }

    /**
     * Test invalid move commands
     */
    public function testInvalidMoveCommands()
    {
        $this->action->currPlace('3,4,WEST');
        $this->action->move();
        $this->assertNotEquals($this->action->report(), '2,4,NORTH');
    }

    /**
     * Test valid rotate commands
     */
    public function testValidRotateCommands()
    {
        $this->action->currPlace('3,4,EAST');
        $this->action->rotate('LEFT');
        $this->assertEquals($this->action->report(), '3,4,NORTH');


    }

    /**
     * Test invalid rotate commands
     */

    public function testInvalidRotateCommands()
    {
        $this->action->currPlace('3,4,EAST');
        $this->action->rotate('LEFT');
        $this->assertNotEquals($this->action->report(), '3,4,SOUTH');
    }


}
