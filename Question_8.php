<?php
/**
 * Question 8:
 * Write a function that tests for a certain substring and returns a boolean to
 * indicate whether or not the substring is present.
 * The search should be case-insensitive and match accented characters to the
 * english equivalent.
 *
 * // Example
 * $needle = 'search';
 * $haystack = 'Some text goes in here with a lot of wørds to $search through.
 *              We\'ll add more words if we want.';
 * $wasFound = containsWithin($haystack, $needle);
 *
 * Be sure to try 'some', 'search', 'well', 'words', and 'word'.
 */

/**
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function containsWithin(string $haystack, string $needle): bool {
  $haystack = replaceAccents($haystack);
  $needle   = replaceAccents($needle);
  if(!stristr($haystack, $needle)){
   return FALSE;
  }
  else {
    return TRUE;
  }
}

/**
 * Source: https://stackoverflow.com/a/31191369
 * Not using iconv due to restrictions on server settings.
 * @param string $str
 * @return string
 */
function replaceAccents(string $str): string {
  $search  = explode(",", "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,ø,Ø,Å,Á,À,Â,Ä,È,É,Ê,Ë,Í,Î,Ï,Ì,Ò,Ó,Ô,Ö,Ú,Ù,Û,Ü,Ÿ,Ç,Æ,Œ");
  $replace = explode(",", "c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,o,O,A,A,A,A,A,E,E,E,E,I,I,I,I,O,O,O,O,U,U,U,U,Y,C,AE,OE");
  return str_replace($search, $replace, $str);
}

