<?php
/**
 * Created by PhpStorm.
 * User: Art
 * Date: 31.08.14
 * Time: 21:46
 */

namespace Acme\AppBundle\Calculator;


class Calculator implements SimpleInterface
{
    /**
     * @var array
     */
    protected $options;

    protected $result;
    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->options = $params;
        $this->result = 0;

    }

    /**
     * @param $a
     *
     * @return $this
     */
    public function add($a)
    {
        $this->result = $this->result + $a;

        return $this;
    }

    /**
     * @param integer $b
     *
     * @return integer
     */
    public function minus($b)
    {
        $this->result = $this->result - $b;

        return $this;
    }

    /**
     * @param integer $a
     * @param integer $b
     *
     * @return integer
     */
    private function multiply($a, $b)
    {
        return $a*$b;
    }

    /**
     * @param integer $a
     * @param integer $b
     *
     * @return integer
     */
    private function division($a, $b)
    {
        return $a/$b;
    }

    private function exp($a, $exp)
    {
        if ($exp == 0) {
            return 1;
        }

        $result = 1;
        $counter = 0;
        while ($counter + 1 <= $exp)
        {
           $result = $this->multiply($a, $result);

//            $counter = $counter + 1;
            $counter++;
        }

        return $result;
    }

    /**
     * @param $a
     *
     * @return mixed
     */
    private function sqrt($a)
    {
        return sqrt($a);
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
       return $this->result;
    }


}