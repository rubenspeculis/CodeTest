<?php
/**
 * Question 7:
 * Given the following input:
 * 'One day 10 questions: 2 on each day, for 5 weeks'
 *
 * Write simple logic in PHP code that can extract both the words and numbers
 * and put them into their own arrays, '$words', '$numbers'.
 *
 */

/**
 * Function using forEach Loop.
 * @param string $input
 *
 * @return array
 */
function wordsAndNumbers(string $input = 'One day 10 questions: 2 on each day, for 5 weeks'): array {
  // Split the string into an array delimited by words.
  preg_match_all('/\w+/', $input, $array);
  // Preg Match returns an array of array of arrays. Set it to the first element.
  $array = $array[0];
  // Define the digit match regex.
  $numberPattern = '/\d/';
  // Initialise two empty result arrays.
  $words   = [];
  $numbers = [];
  // Iterate through array and pop them into the correct place.
  foreach ($array as $value) {
    if ((preg_match($numberPattern, $value))) {
      $numbers[] = $value;
    }
    else {
      $words[] = $value;
    }
  }
  return [$words, $numbers];
}

/**
 * Function using array_filter
 * @param string $input
 *
 * @return array
 */
function wordsAndNumbersAlt(string $input = 'One day 10 questions: 2 on each day, for 5 weeks'): array {
  // Split the string into an array delimited by words.
  preg_match_all('/\w+/', $input, $array);
  // Preg Match returns an array of array of arrays. Set it to the first element.
  $array   = $array[0];
  $numbers = array_filter($array, function ($x) {
    return preg_match('/\d/', $x);
  });
  $words   = array_filter($array, function ($x) {
    return !preg_match('/\d/', $x);
  });
  return [$words, $numbers];
}
