<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Board.php';
require_once __DIR__ . '/../src/Action.php';
require_once __DIR__ . '/../src/Simulator.php';

class SimulatorTest extends TestCase

{

    /**
     * @var $board
     */

    protected $board;

    protected $action;

    protected $simulator;


    /**
     * Test case Setup
     * Mocking the objects
     */
    public function setUp(): void

    {
        parent::setUp();

        $this->board = Mockery::mock(Board::class, [5, 5]);
        $this->action = Mockery::mock(Action::class, [$this->board]);
        $this->simulator = Mockery::mock(Simulator::class, $this->action);
    }


    public function testIndex()
    {
        $this->simulator->index('tests/data/test.txt');

    }



}
