<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zabbix\Pour1\WaterProblem;

/**
 * @covers \Zabbix\Pour1\WaterProblem
 */

class StepsCounterTests extends TestCase
{
    public function testStepsCounterWithNotValidValues(): void
    {
       $problem = new WaterProblem(27, 33, 60);
       $this->assertEquals(-1,$problem->calculateSteps());
       $problem = new WaterProblem(3, 5, 75);
       $this->assertEquals(-1,$problem->calculateSteps());
       $problem = new WaterProblem(15, 10, 7);
       $this->assertEquals(-1,$problem->calculateSteps());
       $problem = new WaterProblem(3, 3, 1);
       $this->assertEquals(-1,$problem->calculateSteps());
       $problem = new WaterProblem(-6, -1, 1);
       $this->assertEquals(-1,$problem->calculateSteps());
    }

    public function testStepsCounterWithValidValues(): void
    {
        $problem = new WaterProblem(27, 33, 3);
        $this->assertEquals(16,$problem->calculateSteps());
        $problem = new WaterProblem(10, 13, 7);
        $this->assertEquals(4,$problem->calculateSteps());
        $problem = new WaterProblem(2, 2, 2);
        $this->assertEquals(1,$problem->calculateSteps());
        $problem = new WaterProblem(4, 2, 2);
        $this->assertEquals(1,$problem->calculateSteps());
        $problem = new WaterProblem(2, 4, 2);
        $this->assertEquals(1,$problem->calculateSteps());
        $problem = new WaterProblem(10, 8, 2);
        $this->assertEquals(2,$problem->calculateSteps());
        $problem = new WaterProblem(10, 15, 5);
        $this->assertEquals(2,$problem->calculateSteps());
        $problem = new WaterProblem(997, 996, 1);
        $this->assertEquals(2,$problem->calculateSteps());
        $problem = new WaterProblem(33, 31, 1);
        $this->assertEquals(60,$problem->calculateSteps());
        $problem = new WaterProblem(71, 69, 1);
        $this->assertEquals(136,$problem->calculateSteps());
        $problem = new WaterProblem(33, 29, 1);
        $this->assertEquals(28,$problem->calculateSteps());
        $problem = new WaterProblem(100, 97, 1);
        $this->assertEquals(128,$problem->calculateSteps());
        $problem = new WaterProblem(100, 97, 1);
        $this->assertEquals(128,$problem->calculateSteps());
        $problem = new WaterProblem(27, 33, 9);
        $this->assertEquals(12,$problem->calculateSteps());
        $problem = new WaterProblem(1990, 1993, 1);
        $this->assertEquals(2652,$problem->calculateSteps());
        $problem = new WaterProblem(39673, 39675, 1);
        $this->assertEquals(79344,$problem->calculateSteps());
    }
}