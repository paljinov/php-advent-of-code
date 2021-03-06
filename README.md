# php-advent-of-code

PHP solutions to [Advent of Code](http://adventofcode.com/) tasks.

All tasks are **Advent of Code** ownership. This repository represents my solutions to **Advent of Code** algorithmic tasks.

# Directory structure

- [Puzzles](./src/Puzzle), e.g.
    ```
    src/Puzzle/Year[YEAR]/Day[DAY]_TaskName
        Part1.php           # Part1 solution
        Part2.php           # Part2 solution
    ```
- [Tests](./tests/Puzzle), e.g.
    ```
    tests/Puzzle/Year[YEAR]/Day[DAY]_TaskName
        Part1Test.php           # Part1 solution test
        Part2Test.php           # Part2 solution test
    ```
- [Docs](./docs)

# Contribution
Feel free to fork this repository and solve something in better, i.e. more optimal way.

**php-advent-of-code** is completely dockerized.

If you have docker installed:

1. Pull **php-advent-of-code** project
2. Open console and change directory to project root
3. Run the following command:
```sh
docker-compose up -d
```
4. If you need to enter a running container:
```sh
docker exec -it php-advent-of-code_app_1 /bin/bash
```

# Puzzle adding and testing
1. New puzzle needs to be added in `src/Puzzle/Year2019/Day1DescriptionOptional/Part1.php` directory
2. Puzzle solution method needs to inherit `App\Puzzle\PuzzleInterface` interface
3. Puzzle can be run from project root using CLI command
```sh
puzzle:run <year> <day> <part> <puzzle_input>
```
e.g.
```sh
php bin/console puzzle:run 2017 1 2 '91212129'
```
4. Also you can open puzzle in your favorite browser, e.g.
```
http://localhost/src/Puzzle/Year2017/Day1InverseCaptcha/Part1.php
```

# Multiline input
Multiline input can be pasted to CLI using quotes.
Both single quotes and double quotes work.

```sh
php bin/console puzzle:run 2017 2 1 '5 1 9 5
7 5 3
2 4 6 8'
```

# Tests

PHPUnit is used for testing puzzles also:
- https://phpunit.de/
- https://phpunit.readthedocs.io/

Tests can be run using command:
```sh
./vendor/bin/phpunit tests/
```

# Copyright and License

Copyright (c) 2018 - 2020 Pave Aljinović
Licensed under the [MIT License](./docs/LICENSE.md)
