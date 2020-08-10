<?php
/**
 * Interface BoardInterface
 */

interface BoardInterface
{
    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    public function checkBoundary($x, $y);

}
