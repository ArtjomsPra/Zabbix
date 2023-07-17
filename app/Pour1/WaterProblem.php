<?php declare(strict_types=1);

namespace Zabbix\Pour1;

class WaterProblem
{
    private int $volumeOfVesselA;
    private int $volumeOfVesselB;
    private int $necessaryVolume;

    public function __construct(int $volumeOfVesselA, int $volumeOfVesselB, int $necessaryVolume)
    {
        $this->volumeOfVesselA = $volumeOfVesselA;
        $this->volumeOfVesselB = $volumeOfVesselB;
        $this->necessaryVolume = $necessaryVolume;
    }

    public function calculateSteps(): int
    {
        if ($this->necessaryVolume > max($this->volumeOfVesselA, $this->volumeOfVesselB)) {
            return -1;
        }
        if ($this->necessaryVolume === $this->volumeOfVesselA || $this->necessaryVolume === $this->volumeOfVesselB) {
            return 1;
        }

        if ($this->volumeOfVesselA > $this->volumeOfVesselB && $this->volumeOfVesselA - $this->volumeOfVesselB ===
            $this->necessaryVolume) {
            return 2;
        }

        if ($this->volumeOfVesselB > $this->volumeOfVesselA && $this->volumeOfVesselB - $this->volumeOfVesselA ===
            $this->necessaryVolume) {
            return 2;
        }

        $gcdCalculator = new Gcd($this->volumeOfVesselA, $this->volumeOfVesselB);
        $gcd = $gcdCalculator->calculateGCD();

        if ($this->necessaryVolume % $gcd !== 0) {
            return -1;
        }
        return $this->findSteps($this->volumeOfVesselA, $this->volumeOfVesselB, $this->necessaryVolume);
    }

    function findSteps(int $a, int $b, int $c): int
    {
        $steps = 0;
        $x = 0;
        $y = 0;

        if ($c < $a && $c < $b) {
            $x = min($a, $b);
            $steps++;
            while ($x !== $c) {
                if
                ($x === 0) {
                    $x = min($a, $b);
                    $steps++;
                } elseif ($x !== 0 && $x + $y < max($a, $b)) {
                    $y = $x;
                    $x = 0;
                    $steps++;
                } elseif ($x !== 0 && $y === max($a, $b)) {
                    $y = 0;
                    $steps++;
                } elseif ($x !== 0 && $x + $y > max($a, $b)) {
                    $x = $x - (max($a, $b) - $y);
                    $y = max($a, $b);
                    $steps++;
                }
            }
        }
        if ($c > $a || $c > $b) {
            $x = max($a, $b);
            $steps++;
            while ($x !== $c) {
                if
                ($x === 0) {
                    $x = max($a, $b);
                    $steps++;
                } elseif ($x !== 0 && $x + $y < max($a, $b)) {
                    $y = $x;
                    $x = 0;
                    $steps++;
                } elseif ($x !== 0 && $y === min($a, $b)) {
                    $y = 0;
                    $steps++;
                } elseif ($x !== 0 && $x === max($a, $b)) {
                    $x = $x - (min($a, $b) - $y);
                    $y = min($a, $b);
                    $steps++;
                } elseif ($x !== 0 && $x + $y > max($a, $b)) {
                    $x = $x - (min($a, $b) - $y);
                    $y = min($a, $b);
                    $steps++;
                }
            }
        }

        return $steps;
    }
}