<?php
/**
 *    Question 6:
 * Provide examples for the different loops in native PHP, write tests in which
 * the code block executes exactly 32 times
 *
 */

/**
 * An example of a Do While loop.
 * The do loop will run exactly 32 time and will run at least once.
 */
function doWhileLoopExample() {
  $a = 0;
  do {
    $a++;
  }
  while($a < 32);
}

/**
 * An example of a While loop.
 * Differing from the Do/While Loop this function may not run once depending on
 * the condition as it is checked first.
 */
function whileLoopExample() {
  $i = 1;
  while ($i <= 32) {
    // Do something 32 times;
    $i++;
  }
}

/**
 * An example of a For loop.
 * This loop initialises the iteration counter, sets the condition and
 * increments in its definition.
 */
function forLoopExample() {
  for($i = 1; $i <= 32; $i++) {
    // Do something 32 times;
  }
}

/**
 * An example of a ForEach loop.
 * Iterates through the elements in an array.
 */
function forEachExample() {
  // Initialise an array with 32 elements;
  $initialArray = array_fill(0, 32, 'This is a test.');
  foreach ($initialArray as $key => $value) {
    // Do something with the keys and elements of the array.
  }
}

