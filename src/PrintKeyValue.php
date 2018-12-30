<?php

namespace Rolfisub\PrintKeyValue;

/**
 * Class PrintKeyValue
 * prints out a key -> value representation of an array
 * @package Rolfisub\PrintKeyValue
 * @author Rolf Bansbach rolfisub@gmail.com
 */
class PrintKeyValue
{
    private $out = "";
    private $spacing = " ";
    private $newLine = "\n";
    private $openBracket = "{";
    private $closeBracket = "}";
    private $keyValMiddle = ":";

    /**
     * PrintKeyValue constructor.
     * Allows for customisation of the characters to be used for the structure
     * TODO: create getter and setters
     * @param string $initialValue
     * @param string $spacing
     * @param string $newLine
     * @param string $openBracket
     * @param string $closeBracket
     * @param string $keyValueMiddle
     */
    public function __construct(
        $initialValue = "",
        $spacing = " ",
        $newLine = "\n",
        $openBracket = "{",
        $closeBracket = "}",
        $keyValueMiddle = ":"
    )
    {
        $this->out = $initialValue;
        $this->spacing = $spacing;
        $this->newLine = $newLine;
        $this->openBracket = $openBracket;
        $this->closeBracket = $closeBracket;
        $this->keyValMiddle = $keyValueMiddle;
    }

    private function spaces($amount)
    {
        for ($x = 0; $x < $amount; $x++) {
            $this->out .= $this->spacing;
        }
    }

    private function printLn($text, $level)
    {
        $this->out .= $this->spaces($level) . $text . $this->newLine;
    }

    /**
     * clears the current output
     */
    public function clear()
    {
        $this->out = "";
    }

    /**
     * Gets a string representation of a key-value pair of an array
     * @param array $d
     * @param int $level
     * @return string
     */
    public function printKeyValues(array $d, $level = 0)
    {
        foreach ($d as $key => $value) {
            if (!is_array($value)) {
                $this->printLn($key . $this->keyValMiddle . $value, $level);
            } else {
                $this->printLn($key . $this->keyValMiddle . $this->openBracket, $level);
                $level++;
                $this->printKeyValues($value, $level);
                $level--;
                $this->printLn($this->closeBracket, $level);
            }
        }
        return $this->out;
    }
}