<?php

class CalulatorTest extends \PHPUnit\Framework\TestCase {
    public function testAdd(){
        $calulator = new App\Calculator;
        $result = $calulator->add(20,5);

        $this->assertEquals(25, $result);
    }

    public function testSubtract(){
        $calulator = new App\Calculator;
        $result = $calulator->subtract(20,5);

        $this->assertEquals(16, $result);
    }

    public function testMultiply(){
        $calulator = new App\Calculator;
        $result = $calulator->multiply(20,5);

        $this->assertEquals(100, $result);
    }
}