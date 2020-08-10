<?php

/**
 * Interface ActionInterface
 */
interface ActionInterface
{
    /**
     * @param $cmd
     * @return mixed
     */
    public function action($cmd);

    /**
     * @param $str
     * @return mixed
     */

    public function getType($str);

    /**
     * @param $type
     * @return mixed
     */
    public function currPlace($type);

    /**
     * @return mixed
     */

    public function move();

    /**
     * @param $side
     * @return mixed
     */

    public function rotate($side);

    /**
     * @return mixed
     */
    public function report();


}