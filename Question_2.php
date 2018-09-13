<?php
/**
 * Question 2:
 * Write a function that determines the area of a circle given the radius.
 */


/**
 * @param float $radius
 * @return float
 */
function areaOfCircle(float $radius): float {
  // Equation for the area of a circle is πr^2
  $areaOfCircle = pi() * pow($radius, 2);
  return $areaOfCircle;
}
