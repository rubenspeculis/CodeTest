<?php
/**
 * Question 1:
 * Write a function that determines if a string starts with an upper-case letter A-Z.
 */


/**
 * @param string $string
 * @return bool
 */
function checkStringStartsWithAnUpperCaseLetter(string $string): bool {
  // Regular expression that matches Upper-case letters at the start of a string
  // is given by /^[A-Z]/
  return (preg_match('/^[A-Z]/', $string)) ? TRUE : FALSE;
}
