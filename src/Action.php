<?php

require_once 'Constants.php';
require_once __DIR__.'/interface/ActionInterface.php';


/**
 * Class Action
 * Handle the action of the robot.
 */
class Action extends Constants implements ActionInterface
{

    /**
     * @var int $currX
     *
     * Store the current x-coordinates of the robot
     */

    protected $currX;

    /**
     * @var int $currY
     *
     * Store the current y-coordinates of the robot
     */
    protected $currY;

    /**
     * @var string $direction
     * Store the current direction of the robot
     */

    protected $direction;

    /**
     * @var $board
     */

    protected $board;


    /**
     * @var int $counter ;
     */
    protected $counter = 0;

    /**
     * Action constructor.
     * @param $board
     */


    public function __construct($board)
    {
        $this->board = $board;

    }

    /**
     * @param $command
     * @throws Exception
     * Execute the action from the given command
     */

    public function action($command)
    {

        try {

            $sanitizeStr = filter_var($command, FILTER_SANITIZE_STRING);

            $type = $this->getType($sanitizeStr);

            $value = strtoupper(trim($type[0]));

            // validate if place is first command or not
            if ($this->counter == 0 && Constants::PLACE !== $value) {
                throw new InvalidArgumentException($value . ' is not a first command.');

            }

            switch ($value) {
                case Constants::PLACE:
                    $this->currPlace($type[1]);
                    break;
                case Constants::MOVE:
                    $this->move();
                    break;
                case Constants::LEFT:
                case Constants::RIGHT:
                    $this->rotate($value);
                    break;
                case Constants::REPORT:
                   echo $this->report();
                    break;
                default:
                    throw new InvalidArgumentException('Invalid argument of supplied.');

            }

            $this->counter++;

        } catch (Exception $e) {

            throw new Exception('Error message of' . $e->getMessage() . ' on line ' . $e->getLine());

        }

    }

    /**
     * @param $str
     * @return array
     */
    public function getType($str)
    {
        return explode(' ', $str);

    }

    /**
     * @param $type
     * @throws InvalidArgumentException
     * set the current place of the robot
     */

    public function currPlace($type)
    {

        $data = explode(',', $type);

        if (!$this->board->checkBoundary((int)$data[0], (int)$data[1])) {

            throw new InvalidArgumentException(Constants::ROBOT_OUTSIDE);
        }

        $this->currX = trim((int)$data[0]);
        $this->currY = trim((int)$data[1]);
        $this->direction = trim($data[2]);

    }

    /**
     * @throws InvalidArgumentException
     * Move the robot in the given direction
     * Check the boundary before and after moving the direction
     */

    public function move()
    {
        if (!$this->board->checkBoundary($this->currX, $this->currY)) {

            throw new InvalidArgumentException(Constants::ROBOT_OUTSIDE);
        }

        switch (strtoupper($this->direction)) {
            case Constants::NORTH:
                $this->currY += 1;
                break;
            case Constants::SOUTH:
                $this->currY -= 1;
                break;
            case Constants::WEST:
                $this->currX -= 1;
                break;
            case Constants::EAST:
                $this->currX += 1;
                break;
            default:
                throw new InvalidArgumentException('Invalid argument of supplied.');
        }

        if (!$this->board->checkBoundary($this->currX, $this->currY)) {

            throw new InvalidArgumentException(Constants::ROBOT_OUTSIDE);
        }

    }

    /**
     *
     * @param $side
     * @throws Exception
     *
     * Rotate the robot in the given direction
     *
     */

    public function rotate($side)
    {

        if (!in_array($side, [Constants::LEFT, Constants::RIGHT])) {
            throw new InvalidArgumentException($side . 'is not a valid side.');
        }

        if ($this->direction == Constants::NORTH && $side == Constants::RIGHT) {
            $this->direction = Constants::EAST;
        } elseif ($this->direction == Constants::NORTH && $side == Constants::LEFT) {
            $this->direction = Constants::WEST;
        } elseif ($this->direction == Constants::EAST && $side == Constants::RIGHT) {
            $this->direction = Constants::SOUTH;
        } elseif ($this->direction == Constants::EAST && $side == Constants::LEFT) {
            $this->direction = Constants::NORTH;
        } elseif ($this->direction == Constants::SOUTH && $side == Constants::RIGHT) {
            $this->direction = Constants::WEST;
        } elseif ($this->direction == Constants::SOUTH && $side == Constants::LEFT) {
            $this->direction = Constants::EAST;
        } elseif ($this->direction == Constants::WEST && $side == Constants::RIGHT) {
            $this->direction = Constants::NORTH;
        } elseif ($this->direction == Constants::WEST && $side == Constants::LEFT) {
            $this->direction = Constants::SOUTH;
        }

    }

    /**
     * Give the report on current position of the robot
     */

    public function report()
    {
        return $this->currX.','.$this->currY.','.$this->direction;

    }

}




