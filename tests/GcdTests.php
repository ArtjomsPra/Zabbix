<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zabbix\Pour1\Gcd;

/**
 * @covers \Zabbix\Pour1\Gcd
 */

class GcdTests extends TestCase
{
    public function testGcdCalculations(): void
    {
        $gcd = new Gcd(36, 24);
        $this->assertEquals(12,$gcd->calculateGCD());
        $gcd = new Gcd(24, 36);
        $this->assertEquals(12,$gcd->calculateGCD());
        $gcd = new Gcd(8, 4);
        $this->assertEquals(4,$gcd->calculateGCD());
        $gcd = new Gcd(0, 4);
        $this->assertEquals(4,$gcd->calculateGCD());
        $gcd = new Gcd(4, 0);
        $this->assertEquals(4,$gcd->calculateGCD());
        $gcd = new Gcd(-1, 0);
        $this->assertEquals(1,$gcd->calculateGCD());
        $gcd = new Gcd(0, -36);
        $this->assertEquals(36,$gcd->calculateGCD());
    }
}