<?php
  session_start();
// Put your PHP functions and modules here
if (basename($_SERVER['PHP_SELF']) == "index.php") {
  if (isset($_POST['movie'])) {
    if (filter_input_array(INPUT_POST)) {
      $dataArray = [];
      $error = "";
      $dataArray['movie'] = $_POST['movie'];
      $dataArray['seats'] = $_POST['seats'];
      $dataArray['cust'] = $_POST['cust'];
      //check all movie inputs

      //preShow($dataArray);

      foreach ($dataArray['movie'] as $key => $value) {
        switch ($key) {
          case 'id':
            if (strlen($value) != 3 || !ctype_alpha($value)) {
              $error .= "The id value has been modified to a bad value.";
            }
            break;
          case 'day':
            if (strlen($value) != 3 || !ctype_alpha($value)) {
              $error .= "The day value has been modified to a bad value.";
            }
            break;
          case 'hour':
            if (strlen($value) != 3) {
              $error .= "The day value has been modified to a bad value.";
            }
            break;
          default:

            break;
        }
      }
      $totalTickets = 0;
      foreach ($dataArray['seats'] as $key => $value) {
        if ($value == null) {
          $value = 0;
        }
        if (!(-1 < $value || $value < 11)) {
          $error .= "There is an error with the input ".$key;
        }
        else {
          $totalTickets += $value;
        }
      }

      if ($totalTickets == 0) {
        $error .= "You must order at least one ticket for a valid order.";
      }

      foreach ($dataArray['cust'] as $key => $value) {
        switch ($key) {
          case 'name':
            if (!preg_match("#(([A-Z]{1}[a-z]{1,}|[A-Z]{1}'{1}[A-Z]{1}[a-z]{1,})\s[A-Z]{1}[a-z]{1,})#",$value)) {
              $error .= "The name value has been modified to a bad value.";
            }
            break;
          case 'email':
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
              $error .= "The email value has been modified to a bad value.";
            }
            break;
          case 'mobile':
            if (!preg_match("#(\(04\)|04|\+614)[0-9]{8}|[0-9 ]{17}#",$value)) {
              $error .= "The mobile value has been modified to a bad value.";
            }
            break;
          case 'card':
            if (!is_numeric($value) ||  14 > strlen($value) || strlen($value) > 19) {
              $error .= "The card value has been modified to a bad value.";
            }
            break;
          case 'expiry':
            if (!preg_match("#[0-9]{4}-[0-9]{2}#",$value)) {
              $error .= "The expiry value has been modified to a bad value.";
            }
            break;
          default:

            break;
        }
      }
      if ($error == "") {
        $_SESSION['cart'] = $_POST;
        header("Location: receipt.php");
      }
      else {
        $recallInputs = $_POST;
      }
    }
    else {
      echo "Always sanitise your inputs, kiddies!";
    }
  }
}

else if (basename($_SERVER['PHP_SELF']) == "receipt.php") {
  //get all cart data
  $dataArray = $_SESSION['cart'];

  //get file to write or read depending on current bookedness
  $seatingFileName = "seating/".$dataArray['movie']['id']."_".$dataArray['movie']['day']."_".$dataArray['movie']['hour'].".csv";
  //count number of needed tickets
  $totalStdTickets = 0;
  $totalFstTickets = 0;
  $seatString = "";

  foreach ($dataArray['seats'] as $key => $value) {
    //count each TYPE of ticket
    if ($value == null) {
      $value = 0;
    }
    switch ($key) {
      case 'FCA':
      case 'FCP':
      case 'FCC':
        if($value != null) {
          $totalFstTickets += $value;
        }
        break;
      case 'STA':
      case 'STP':
      case 'STC':
        if($value != null) {
          $totalStdTickets += $value;
        }
        break;
      default:
        break;
      }
    $seatString .= $value;
  }

  //if the file is gen'd, append and count so we know where to start
  if (file_exists($seatingFileName)) {
    $content = [];
    if (($file = fopen("$seatingFileName", "a+")) !== FALSE) {
      while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        $content[] = $data;
      }
    }
    $startAt = 0;
    foreach ($content as $value) {
      foreach ($value as $innerValue) {
        $startAt++;
      }
    }
  }
  //otherwise, this is a fresh cinema and we want to start from seat A1
  else {
    $file = fopen($seatingFileName,'w');
    $startAt = 0;
  }
  //generate array of letters from A to E
  $alphabet = range('A', 'E');
  $ticketIds = [];
  $generated = 0;
  //generate a new seat for each ticket
  for ($i = $startAt; $i < $totalStdTickets + $totalFstTickets + $startAt; $i++) {
    //if the cinema is full, stop generating and give error to customer
    if ($i >= 50) {
      $error = "Error! Cinema is now full.";
      break;
    }
    $generated++;
    //set numbers range from 1 to 10
    $seat = ($i % 10) + 1;
    //row is from A to E
    $row = ceil(($i + 1) / 10);
    //50 potential seats, using (Row)(Seat)
    $seatId = $alphabet[$row - 1].$seat;
    //put this seat into our file using the array
    array_push($ticketIds,$seatId);
  }
  if ($ticketIds != null) {
    fputcsv($file,$ticketIds);
  }
  fclose($file);

  //used to identify seat number
  $ticketNum = 0;
  $tickets = "";

  switch ($dataArray['movie']['id']) {
    case 'ACT':
      $title = "Avengers: Endgame";
      break;
    case 'AHF':
      $title = "The Happy Prince";
      break;
    case 'ANM':
      $title = "Dumbo";
      break;
    case 'RMC':
      $title = "Top End Wedding";
      break;
    default:

      break;
  }
  //grab the time from "T8" -> 12am
  //or "T21" - 9pm
  $time = $dataArray['movie']['hour'];
  $time = substr($time,1);
  $time12 = $time % 12;
  if ($time12 == 0) {
    $time12 = 12;
  }
  if (ceil(($time + 1) / 12) > 1) {
    $suffix = "pm";
  }
  else {
    $suffix = "am";
  }
  $time = $time12.$suffix;

  //create a ticket for each person.
  foreach ($dataArray['seats'] as $key => $value) {
    for ($i=0; $i < $value; $i++) {
      if ($ticketNum >= $generated) {
        break;
      }
      switch ($key) {
        case 'FCA':
        case 'FCP':
        case 'FCC':
          $ticketStyle = "ticketGold";
          $class = "First Class";
          break;
        case 'STA':
        case 'STP':
        case 'STC':
          $ticketStyle = "ticket";
          $class = "Standard";
          break;
        default:
          break;
        }
      $tickets .= '<article class="'.$ticketStyle.'">
        <div class="ticketLeft" id="goldTextOverride">
          <span class="ticketHeader">Lunardo Cinema</span><br />
          <div class="ticketInnerLeft">
            <span class="ticketClass"><b>Class</b>: '.$class.'</span><br />
            <span class="ticketMovie"><b>Movie</b>: '.$title.'</span><br />
            <span class="ticketDate"><b>Day</b>: '. $dataArray['movie']['day'] .'</span><br />
            <span class="ticketName"><b>Holder</b>: '. $dataArray['cust']['name'] .'</span><br />
          </div>
          <div class="ticketInnerRight">
            <span class="ticketTime"><b>Time</b>: '. $time .'</span><br />
            <span class="ticketSeat"><b>Seat</b>: '. $ticketIds[$ticketNum] .'</span>
          </div>
        </div>
        <div class="ticketRight"> </div>
      </article>
      <div id="breaker" class="hidden"></div>
      ';
      $ticketNum++;
    }
  }

  //receipt generation:
  $fileName = "bookings.txt";
  if (file_exists($fileName)) {
    $file = fopen($fileName,'a');
  }
  else {
    $file = fopen($fileName,'w');
  }
  $receiptDetails = [];

  array_push($receiptDetails,date("Y-m-d"));
  array_push($receiptDetails,$dataArray['cust']['name']);
  array_push($receiptDetails,$dataArray['cust']['email']);
  array_push($receiptDetails,$dataArray['cust']['mobile']);
  array_push($receiptDetails,$dataArray['movie']['id']);
  array_push($receiptDetails,$dataArray['movie']['day']);
  array_push($receiptDetails,$dataArray['movie']['hour']);
  foreach ($dataArray['seats'] as $key => $value) {
    if ($value == null) {
      $value = 0;
    }
    array_push($receiptDetails,$value);
  }
  array_push($receiptDetails,updatePrice($dataArray)[0]);

  fputcsv($file,$receiptDetails, "\t");
  fclose($file);

  $prices = updatePrice($dataArray);
  $total = $prices[0];
  $subtotals = $prices[1];

  $detailsTable = "";
  $seatType = 0;
  foreach ($dataArray['seats'] as $key => $value) {
    $ticketType = "";
    switch ($key) {
      case 'FCA':
        $ticketType = "First Class Adult";
        break;
      case 'FCP':
        $ticketType = "First Class Concession";
        break;
      case 'FCC':
        $ticketType = "First Class Child";
        break;
      case 'STA':
        $ticketType = "Standard Adult";
        break;
      case 'STP':
        $ticketType = "Standard Concession";
        break;
      case 'STC':
        $ticketType = "Standard Child";
        break;
      default:
        break;
      }

    if ($value > 0) {
      $detailsTable .= "<tr><td>".$ticketType." Ticket". "</td><td>".$value ."</td><td>$". number_format($subtotals[$seatType], 2, '.', ',') . "</td></tr>";
    }
    $seatType++;
  }
  $detailsTable .= "<tr> <td></td> <td>GST:</td> <td>$".number_format($total / 11, 2, '.', ',')."</td> </tr>";
  $detailsTable .= "<tr> <td></td> <td>Total:</td> <td>$".number_format($total, 2, '.', ',')."</td> </tr>";
}

//my functions
//used by the select ticket amount inputs
function oneToTen($type) {
  echo "<option value=></option>";
  for ($i = 0; $i < 10; $i++) {
    if (isset($_POST['seats'])) {
      if ($_POST['seats'][$type] == $i && $_POST['seats'][$type] != null) {
        $selected = "selected='selected'";
      }
      else {
        $selected = "";
      }
    }
    else {
      $selected = "";
    }

    echo "<option value=",$i+1," ",$selected,">",$i+1,"</option>";
  }
}

//used to calculate any Prices
function updatePrice($dataArray) {
  $price = 0;
  $discount = 0;
  $totalPrice = 0;
  $eachPrice = [];
  foreach ($dataArray['seats'] as $key => $value) {
    switch ($key) {
      case 'STA':
        $price = 30;
        $discount = 24;
        break;
      case 'STP':
        $price = 27;
        $discount = 22.5;
        break;
      case 'STC':
        $price = 24;
        $discount = 21;
        break;
      case 'FCA':
        $price = 19.80;
        $discount = 14;
        break;
      case 'FCP':
        $price = 17.5;
        $discount = 12.5;
        break;
      case 'FCC':
        $price = 15.30;
        $discount = 11;
        break;
      default:
        break;
    }

    $discountDays = ['MON','WED'];
    $midday = ['TUE','THU','FRI'];
    $totalTickets = 0;
    $numberOf = $dataArray['seats'][$key];

    if ($numberOf == null) {
      $numberOf = 0;
    }
    if (in_array($dataArray['movie']['day'],$discountDays)) {
      $totalPrice += $discount * $numberOf;
      array_push($eachPrice, $discount * $numberOf);
    }
    else if (in_array($dataArray['movie']['day'],$midday) && $dataArray['movie']['hour'] == "T12") {
      $totalPrice += $discount * $numberOf;
      array_push($eachPrice, $discount * $numberOf);
    }
    else {
      $totalPrice += $price * $numberOf;
      array_push($eachPrice, $discount * $numberOf);
    }
  }
  return [$totalPrice,$eachPrice];
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
  echo "  $$arrName = ".json_encode($arr, JSON_PRETTY_PRINT);
  echo "</script>\n\n";
}

//A 'reset the session' submit button

// if (isset($_POST['session-reset'])) {
//   foreach($_SESSION as $something => &$whatever) {
//     unset($whatever);
//   }
// }


?>