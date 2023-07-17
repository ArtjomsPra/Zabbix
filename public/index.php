<?php declare(strict_types=1);

require_once __DIR__ . '/../app/Pour1/Gcd.php';
require_once __DIR__ . '/../app/Pour1/WaterProblem.php';

/* Implementing solution to the https://www.spoj.com/problems/POUR1/ */

use Zabbix\Pour1\WaterProblem;

$problem = new WaterProblem(176, 179, 1);
$steps = $problem->calculateSteps();

echo "Steps required: " . $steps . "\n";
