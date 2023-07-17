<?php declare(strict_types=1);

namespace Zabbix\Pour1;

class Gcd
{
    private int $volumeOfVesselA;
    private int $volumeOfVesselB;

    public function __construct
    (
        int $volumeOfVesselA,
        int $volumeOfVesselB
    )
    {
        $this->volumeOfVesselA = $volumeOfVesselA;
        $this->volumeOfVesselB = $volumeOfVesselB;
    }


    /*
     * Calculating greatest common divisor using Eucledean algorith: https://en.wikipedia.org/wiki/Euclidean_algorithm
     */
    public function calculateGCD(): int
    {
        $a = abs($this->volumeOfVesselA);
        $b = abs($this->volumeOfVesselB);

        if ($b == 0) {
            return $a;
        }
        return (new self($b, $a % $b))->calculateGCD();
    }
}