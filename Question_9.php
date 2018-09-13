<?php
/**
 * Question 9:
 * What is wrong here?  No code is required here, just a short commented response.
 *
 * class myClass implements theClass {
 *
 *   private $_foo;
 *
 *   public function __construct() {
 *     $this->_foo = 1;
 *   }
 *
 *   public static function getMyFoo() {
 *     return $this->_foo * 5;
 *   }
 * }
 *
 * The static function getMyFoo() cannot reference the private property _foo as
 * the object is not in context.
 */
