<?php
  session_start();

// Put your PHP functions and modules here
//used by the select ticket amount inputs
function oneToTen() {
  echo "<option value=></option>";
  for ($i = 0; $i < 10; $i++) {
    echo "<option value=",$i+1,">",$i+1,"</option>";
  }
}



//functions here are taken from the assignment sheet
//"preShow()" function prints data and shape/structure of data
function preShow( $arr, $returnAsString=false ) {
  $ret  = '<pre>' . print_r($arr, true) . '</pre>';
  if ($returnAsString)
    return $ret;
  else
    echo $ret;
}

//Output current file's source code
function printMyCode() {
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre class='mycode'><ol>";
  foreach ($lines as $line)
     echo '<li>'.rtrim(htmlentities($line)).'</li>';
  echo '</ol></pre>';
}

//A "php multiple dimensional array to javascript object" function

function php2js( $arr, $arrName ) {
  $lineEnd="";
  echo "<script>\n";
  echo "/* Generated with A4's php2js() function */";
  echo "  var $arrName = ".json_encode($arr, JSON_PRETTY_PRINT);
  echo "</script>\n\n";
}

//A 'reset the session' submit button

// if (isset($_POST['session-reset'])) {
//   foreach($_SESSION as $something => &$whatever) {
//     unset($whatever);
//   }
// }


?>