<?php
/**
 * Question 5:
 * Create a function called "purr()" in the "Cat" class (above).
 * Echo 'purr' every x seconds with a specified delay to start purring
 *
 */

class Animal {
  /**
   * @TODO: Construct the shared properties of all animals;
   */
}

class Cat extends Animal {

  /**
   * @param int $startDelay
   *  Seconds before first purr
   * @param int $repeatDelay
   *  Seconds in between purrs
   */
  public function purr(int $startDelay, int $repeatDelay) {
    sleep($startDelay);
    while (1) {
      echo 'purr' . PHP_EOL;
      sleep($repeatDelay);
    }
  }
}