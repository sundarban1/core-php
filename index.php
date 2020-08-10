<?php


/**
 * Load composer package
 */

require_once 'vendor/autoload.php';

/**
 * including classes
 */

require_once './src/Board.php';
require_once './src/Action.php';
require_once './src/Simulator.php';

/**
 * Height and Width of the board.
 */

$height = Constants::HEIGHT;
$width = Constants::WIDTH;

/**
 * Create new instance for board
 */
$board = new Board($height, $width);

/**
 * Create new instance for action
 */

$action = new Action($board);

/**
 * Create new instance for simulator
 */

$simulator = new Simulator($action);
$simulator->index($argv[1]);

