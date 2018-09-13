<?php
// Using PHP7+
// Please add any relevant citations that assisted you in the answering of questions - these can be from any source on the internet or real world.
// If you use online run-time tools (such as phpfiddle.org) a link to these as the answer will suffice, otherwise just write them inline. Please
// do not use a Framework as part of your answers.

/*
  Question 1:
  Write a function that determines if a string starts with an upper-case letter A-Z.
*/


/*
  Question 2:
  Write a function that determines the area of a circle given the radius.
*/


/*
  Question 3:
  Write a function that can sum all of the values in any given array.
*/


/*
  Question 4:
  What does "extends" do to the following "Cat" class?

  class Cat extends Animal
  {

  }
*/


/*
  Question 5:
  Create a function called "purr()" in the "Cat" class (above).
  Echo 'purr' every x seconds with a specified delay to start purring
*/

/*
	Question 6:

   Provide examples for the different loops in native PHP, write tests in which the code block executes exactly 32 times

*/

/*
  Question 7:

  Given the following input:
  'One day 10 questions: 2 on each day, for 5 weeks.'

  Write simple logic in PHP code that can extract both the words and numbers and put them into their own arrays, '$words', '$numbers'.

*/

/*
  Question 8:

  Write a function that tests for a certain substring and returns a boolean to indicate whether or not the substring is present.
  The search should be case-insensitive and match accented characters to the english equivalent.

	// Example
  $needle = 'search';
	$haystack = 'Some text goes in here with a lot of wørds to $search through. We\'ll add more words if we want.';
	$wasFound = containsWithin($haystack, $needle);

  // Be sure to try 'some', 'search', 'well', 'words', and 'word'.

*/


/*
  Question 9:

  What is wrong here?  No code is required here, just a short commented response.

  class myClass implements theClass {
    private $_foo;

    public function __construct() {
      $this->_foo = 1;
    }

    public static function getMyFoo() {
      return $this->_foo * 5;
    }
  }
*/


/*
  Question 10:

  How would you fix the above example considering the following interface definition constraint?

  interface theClass {
    public function __construct();
    public static function getMyFoo();
  }

*/


/*
  Question 11:

  consider file_get_contents("TSLA.csv");
  Write a function which calculates a forecasted stock 'Close Price' for the 23rd of June and a period of 7 days following. Use whichever method you prefer to forecast a price.
*/


/*
  Question 12:

  consider file_get_contents("TSLA.csv");
  Parse the CSV data and demonstrate a simple php script populating the relevant data into the provided MySQL schema which keeps the data rows updated or created;

  CREATE TABLE `codetest` (
  `RecordID`  int(11) NOT NULL AUTO_INCREMENT,
  `Date`  datetime NULL,
  `OpenPrice`  double NULL,
  `HighPrice`  double NULL,
  `LowPrice`  double NULL,
  `ClosePrice`  double NULL,
  `AdjClosePrice`  double NULL,
  `Volume`  double NULL,
   PRIMARY KEY (`RecordID`)
  );

*/

/*
  Question 13:

  Using your codetest table, demonstrate a the My SQL query that provides;

  1) The highest close price during the whole period, and date.
  2) Which month of the year had the largest volatility between prices.
  3) Your ROI (%) at the last known close price if you had of bought exactly $100,000 worth of Tesla stocks on the 3rd of July 2017.
*/



