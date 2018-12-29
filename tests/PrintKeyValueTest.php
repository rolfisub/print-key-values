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
    public function testIsString() {
        $obj = new PrintKeyValue("","  ");
        $out = $obj->printKeyValues([[1,[2,[4]],3]]);
        $this->assertTrue(is_string($out));
    }

}
