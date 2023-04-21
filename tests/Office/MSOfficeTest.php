<?php

use PHPUnit\Framework\TestCase;
use Tanzar\Converters\Office\MSOffice;

class MSOfficeTest extends TestCase {

    /**
     * Converts given column and row number to excel cell address
     * Negative values are turned to positive
     * 
     *
     * @return [type]
     * 
     */
    public function testExcelAddress() {
        $this->singleExcelAddressTest(1, 1, 'A1');
        
        $this->singleExcelAddressTest(2, 4, 'B4');
        
        $this->singleExcelAddressTest(12, 54, 'L54');
        
        $this->singleExcelAddressTest(30, 15, 'AD15');
        
        $this->singleExcelAddressTest(59, 11, 'BG11');
        
        $this->singleExcelAddressTest(-6, -1, 'F1');
        
        $this->singleExcelAddressTest(-12, -54, 'L54');
        
        $this->singleExcelAddressTest(-30, -15, 'AD15');
        
        $this->singleExcelAddressTest(-59, -11, 'BG11');

        $this->singleExcelAddressTest(0, 0, 'A1');
    }

    private function singleExcelAddressTest(int $col, int $row, string $expected){
        $result = MSOffice::toExcelAddress($row, $col);
        $this->assertEquals($expected, $result);
    }

    public function testToExcelTimeInMin() {
        $time = 324;

        $result = MSOffice::toExcelTimeInMin($time);

        $expected = '=(5/24+TIME(0,24,0))';
        $this->assertEquals($expected, $result);
    }

    public function testToExcelTimeInMs() {
        $time = 19440000;

        $result = MSOffice::toExcelTimeInMs($time);

        $expected = '=(5/24+TIME(0,24,0))';
        $this->assertEquals($expected, $result);
    }
}