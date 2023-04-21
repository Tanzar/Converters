<?php

use PHPUnit\Framework\TestCase;
use Tanzar\Converters\Number\Roman;

class RomanTest extends TestCase {

    public function testToRoman() {
        $this->toRomanSingleValueTest(1, 'I');

        $this->toRomanSingleValueTest(3, 'III');

        $this->toRomanSingleValueTest(4, 'IV');

        $this->toRomanSingleValueTest(6, 'VI');

        $this->toRomanSingleValueTest(8, 'VIII');

        $this->toRomanSingleValueTest(19, 'XIX');

        $this->toRomanSingleValueTest(54, 'LIV');
        
        $this->toRomanSingleValueTest(87, 'LXXXVII');

        $this->toRomanSingleValueTest(157, 'CLVII');

        $this->toRomanSingleValueTest(584, 'DLXXXIV');
        
        $this->toRomanSingleValueTest(2023, 'MMXXIII');
    }

    private function toRomanSingleValueTest(int $number, string $expected) : void {
        $result = Roman::toRoman($number);
        $this->assertEquals($expected, $result);
    }

    public function testFromRoman(){
        $this->fromRomanSingleValueTest('I', 1);

        $this->fromRomanSingleValueTest('III', 3);

        $this->fromRomanSingleValueTest('IV', 4);

        $this->fromRomanSingleValueTest('VI', 6);

        $this->fromRomanSingleValueTest('VIII', 8);

        $this->fromRomanSingleValueTest('XXIX', 29);

        $this->fromRomanSingleValueTest('LXVII', 67);

        $this->fromRomanSingleValueTest('XCI', 91);

        $this->fromRomanSingleValueTest('DCCLIV', 754);

        $this->fromRomanSingleValueTest('MCMXXXIX', 1939);
        
        $this->fromRomanSingleValueTest('Grażyna', 0);
        
        $this->fromRomanSingleValueTest('MCDonald', 0);
    }

    public function fromRomanSingleValueTest(string $roman, int $expected) : void {
        $result = Roman::fromRoman($roman);
        $this->assertEquals($expected, $result);
    }
}