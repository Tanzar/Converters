<?php

use PHPUnit\Framework\TestCase;
use Tanzar\Converters\Arrays\ArrayFilter;

class ArrayFilterTest extends TestCase{

    public function testFilter() {
        $input = [
            'name' => "Janusz",
            'surname' => 'Kowalski',
            'email' => 'kowal73@mail.pl',
            'pass' => 'Polak73',
            'description' => 'Nie interesuj się'
        ];

        $keysToKeep = ['name', 'surname', 'pass'];

        $expected = [
            'name' => "Janusz",
            'surname' => 'Kowalski',
            'pass' => 'Polak73'
        ];

        $result = ArrayFilter::filter($input, $keysToKeep);
        $this->assertEquals($expected, $result);

    }
}