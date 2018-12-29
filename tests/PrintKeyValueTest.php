<?php
require "./src/PrintKeyValue.php";

use PHPUnit\Framework\TestCase;
use Rolfisub\PrintKeyValue\PrintKeyValue;

/**
 *  Corresponding Class to test YourClass class
 *
 *  For each class in your library, there should be a corresponding Unit-Test for it
 *  Unit-Tests should be as much as possible independent from other test going on.
 *
 * @author yourname
 */
class PrintKeyValueTest extends TestCase
{

    /**
     * Just check if the YourClass has no syntax error
     *
     * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
     * any typo before you even use this library in a real project.
     *
     */
    public function testIsThereAnySyntaxError()
    {
        $var = new PrintKeyValue();
        $this->assertTrue(is_object($var));
        unset($var);
    }

    /**
     * testing that the return type of the method is string
     */
    public function testIsString()
    {
        $obj = new PrintKeyValue("", "  ");
        $out = $obj->printKeyValues([[1, [2, [4]], 3]]);
        $this->assertTrue(is_string($out));
    }

    /**
     * tests that after any given array structure the expected output is correct
     */
    public function testIsStructureCorrect()
    {
        //test 1
        $kvp = new PrintKeyValue();
        $a1 = [1];
        $ex = "0:1\n";
        $kvp->clear();
        $res1 = $kvp->printKeyValues($a1);
        $this->assertContains($ex, $res1);

        //test 2
        $a2 = [1, 2];
        $ex2 = "0:1\n1:2\n";
        $kvp->clear();
        $res2 = $kvp->printKeyValues($a2);
        $this->assertContains($ex2, $res2);

        //test 3
        $a3 = [1, [2]];
        $ex3 = "0:1\n{\n 0:2\n}\n";
        $kvp->clear();
        $res3 = $kvp->printKeyValues($a3);
        $this->assertContains($ex3, $res3);


        //test 4
        $a4 = [1, 2, [3, [4]]];
        $ex4 = "0:1\n1:2\n{\n 0:3\n {\n  0:4\n }\n}\n";
        $kvp->clear();
        $res4 = $kvp->printKeyValues($a4);
        $this->assertContains($ex4, $res4);

        //test5
        $a5 = [
            "key" => "value",
            5,
            [
                "another" => "keyvalue",
                [
                    5,
                    [
                        "yes" => "no"
                    ]
                ]
            ]
        ];
        $ex5 = "key:value\n0:5\n{\n another:keyvalue\n {\n  0:5\n  {\n   yes:no\n  }\n }\n}\n";
        $kvp->clear();
        $res5 = $kvp->printKeyValues($a5);
        $this->assertContains($ex5, $res5);

    }

}
