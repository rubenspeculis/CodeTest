<?php
/**
 * Question 11:
 * consider file_get_contents("TSLA.csv");
 * Write a function which calculates a forecasted stock 'Close Price' for the
 * 23rd of June and a period of 7 days following. Use whichever method you
 * prefer to forecast a price.
 */

// Used http://www.phpir.com/linear-regression-in-php for inspiration in.

function convertToArray() {
  $file    = fopen('./data/TSLA.CSV', 'r');
  $content = [];
  $first   = 0;
  while (($line = fgetcsv($file)) !== FALSE) {
    //$line is an array of the csv elements
    if ($first === 0) {
      $first++;
    }
    else {
      $content[] = [
        'open'  => $line[1],
        'close' => $line[4],
      ];
      $first++;
    }
  }
  fclose($file);
  return $content;
}

// Return a line function
function hypothesis($intercept, $gradient) {
  return function ($x) use ($intercept, $gradient) {
    return $intercept + ($x * $gradient);
  };
}

// Return the sum of squared errors
function score($data, $hypothesis) {
  $score = 0;
  foreach ($data as $row) {
    $score += pow($hypothesis($row['open']) - $row['close'], 2);
  }
  return $score;
}

// Find the derivative of the function
function derivative($data, $hypothesis) {
  $i_res = 0;
  $g_res = 0;
  foreach ($data as $row) {
    $i_res += $hypothesis($row['open']) - $row['close'];
    $g_res += ($hypothesis($row['open']) - $row['close']) * $row['open'];
  }

  $out_i = 1 / count($data) * $i_res;
  $out_g = 1 / count($data) * $g_res;

  return array($out_i, $out_g);
}

// Gradient descent
function gradient($data, $parameters) {
  $learn_rate = 0.00001;
  $hypothesis = hypothesis($parameters[0], $parameters[1]);
  $deriv      = derivative($data, $hypothesis);
  $score      = score($data, $hypothesis);

  $parameters[0] = (float) $parameters[0] - ($learn_rate * $deriv[0]);
  $parameters[1] = (float) $parameters[1] - ($learn_rate * $deriv[1]);

  // Create a new hypothesis to test our score
  $hypothesis = hypothesis($parameters[0], $parameters[1]);
  if ($score < score($data, $hypothesis)) {
    return FALSE;
  }

  return $parameters;
}

// Save the Trained model
function saveTrainedModel($parameters) {
  $intercept = $parameters[0];
  $gradient  = $parameters[1];
  $modelFile = fopen("./data/model.csv", "w");
  $text      = $intercept . ',' . $gradient . PHP_EOL;
  fwrite($modelFile, $text);
  fclose($modelFile);
}


$modelFilePath = './data/model.csv';
if (file_exists($modelFilePath)) {
  $file = fopen('' . $modelFilePath . '', 'r');
}
else {
  $file = FALSE;
}
$trainedParameter = [];
if ($file) {
  while (($line = fgetcsv($file)) !== FALSE) {
    $trainedParameter = [$line[0], $line[1]];
  }
}
$data = convertToArray();

// Train if no model exists.
if (empty($trainedParameter)) {
  // Starting conditions
  $parameters = array(1, 1);

  $counter = 0;
  do {
    $trainedParameter = $parameters;
    $parameters       = gradient($data, $parameters);
    $counter++;
    if ($counter % 1000 === 0) {
      echo 'Iterations trained: ' . $counter . 'Y Intercept: ' . $parameters[0] . '. Gradient: ' . $parameters[1] . PHP_EOL;
    }
    elseif ($counter % 200 === 0) {
      echo 'Iterations trained: ' . $counter . PHP_EOL;
    }
  } while ($counter <= 20000 && $parameters != FALSE);
  saveTrainedModel($trainedParameter);
}

$prediction   = [];
$numberOfDays = 7;
$hypothesis   = hypothesis($trainedParameter[0], $trainedParameter[1]);
$lastClose    = end($data)['close'];
$prediction[] = $hypothesis($lastClose);
for ($i = 0; $i < $numberOfDays; $i++) {
  $previousClose = end($prediction);
  $prediction[]  = $hypothesis($previousClose);
}

var_dump($prediction);

