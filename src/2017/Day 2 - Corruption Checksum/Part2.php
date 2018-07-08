<?php

require __DIR__.'/../../../vendor/autoload.php';

/*
--- Part Two ---

"Great work; looks like we're on the right track after all. Here's a star
for your effort." However, the program seems a little worried. Can programs
be worried?

"Based on what we're seeing, it looks like all the User wanted is some
information about the evenly divisible values in the spreadsheet.
Unfortunately, none of us are equipped for that kind of calculation - most
of us specialize in bitwise operations."

It sounds like the goal is to find the only two numbers in each row where
one evenly divides the other - that is, where the result of the division
operation is a whole number. They would like you to find those numbers on
each line, divide them, and add up each line's result.

For example, given the following spreadsheet:

5 9 2 8
9 4 7 3
3 8 6 5

- In the first row, the only two numbers that evenly divide are 8 and 2;
  the result of this division is 4.
- In the second row, the two numbers are 9 and 3; the result is 3.
- In the third row, the result is 2.

In this example, the sum of the results would be 4 + 3 + 2 = 9.

What is the sum of each row's result in your puzzle input?
*/

/**
 * Determines checksum for the spreadsheet.
 *
 * @return int Result
 */
function solution(): int
{
    $rowsQuotient = [];

    $spreadsheet = getSpreadsheetData();

    foreach ($spreadsheet as $row) {
        rsort($row);

        // Trying to divide max with min number, there is a greater chance divisor will be found sooner
        for ($i = 0; $i < count($row) - 1; $i++) {
            for ($j = count($row) - 1; $j > $i; $j--) {
                if ($row[$i] % $row[$j] === 0) {
                    $rowsQuotient[] = $row[$i] / $row[$j];
                    break 2;
                }
            }
        }
    }

    $checksum = array_sum($rowsQuotient);

    return $checksum;
}

/**
 * Reads spreadsheet text file and fills array with data from file.
 *
 * @return array
 */
function getSpreadsheetData(): array
{
    $data = [];

    $spreadsheetString = file_get_contents('./spreadsheet.txt');

    $spreadsheetString = str_replace("\t", " ", $spreadsheetString);
    $rows = preg_split("/(\r\n|\n|\r)/", $spreadsheetString);

    foreach ($rows as $row) {
        $rowData = explode(" ", $row);
        $data[] = array_map('intval', $rowData);
    }

    return $data;
}

$checksum = solution();
echo $checksum;