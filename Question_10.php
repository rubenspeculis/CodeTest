<?php
/**
 * Question 10:
 * How would you fix the above example considering the following interface
 * definition constraint?
 *
 * interface theClass {
 *    public function __construct();
 *    public static function getMyFoo();
 * }
 */

interface theClass {
  public function __construct();
  public static function getMyFoo();
}

// If the property $_foo cannot be static.
class myClass implements theClass {
  private $_foo;

  public function __construct() {
    $this->_foo = 1;
  }

  public static function getMyFoo() {
    $myClass = new myClass();
    $return  = $myClass->_foo * 5;
    unset($myClass);
    return $return;
  }
}

// If the property $_foo can be static.
class myClassAlt implements theClass {
  private static $_foo = 1;

  public function __construct() {
  }

  public static function getMyFoo() {
    return self::$_foo * 5;
  }
}