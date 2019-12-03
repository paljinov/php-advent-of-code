<?php

/*
--- Day 2: Corruption Checksum ---

As you walk through the door, a glowing humanoid shape yells in your direction.
"You there! Your state appears to be idle. Come help us repair the corruption in
this spreadsheet - if we take another millisecond, we'll have to display an
hourglass cursor!"

The spreadsheet consists of rows of apparently-random numbers. To make sure the
recovery process is on the right track, they need you to calculate the
spreadsheet's checksum. For each row, determine the difference between the
largest value and the smallest value; the checksum is the sum of all of these
differences.

For example, given the following spreadsheet:

5 1 9 5
7 5 3
2 4 6 8

- The first row's largest and smallest values are 9 and 1, and their difference
  is 8.
- The second row's largest and smallest values are 7 and 3, and their
  difference is 4.
- The third row's difference is 6.

In this example, the spreadsheet's checksum would be 8 + 4 + 6 = 18.

What is the checksum for the spreadsheet in your puzzle input?
*/

namespace App\Puzzle\Year2017\Day2CorruptionChecksum;

use App\Puzzle\PuzzleInterface;

class Part1 implements PuzzleInterface
{
    /**
     * Determines checksum for the spreadsheet.
     *
     * @param string $spreadsheetMultilineString
     * 
     * @return integer Checksum
     */
    public function solution($spreadsheetMultilineString)
    {
        $rowsDiff = [];

        // Spreadsheet data is parsed from multiline string and stored to array
        $spreadsheet = $this->parseMultilineString($spreadsheetMultilineString);

        foreach ($spreadsheet as $row) {
            // Determine the difference between the largest value and the smallest value

            $max = max($row);
            $min = min($row);

            $rowsDiff[] = $max - $min;
        }

        //  The checksum is the sum of all row differences
        $checksum = array_sum($rowsDiff);

        return $checksum;
    }

    /**
     * Reads spreadsheet multiline string and stores data to array.
     *
     * @param string $spreadsheetMultilineString
     * 
     * @return array
     */
    public function parseMultilineString(string $spreadsheetMultilineString): array
    {
        $data = [];

        $spreadsheetMultilineString = str_replace("\t", " ", $spreadsheetMultilineString);
        $rows = preg_split("/(\r\n|\n|\r)/", $spreadsheetMultilineString);

        foreach ($rows as $row) {
            $rowData = explode(" ", $row);
            $data[] = array_map('intval', $rowData);
        }

        return $data;
    }
}
