<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 4</title>

    <?php
    include "tools.php";
     ?>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">
    <link media="print" type="text/css" rel="stylesheet" href="css/print.css" />
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link href="https://fonts.googleapis.com/css?family=Lato|Righteous&display=swap" rel="stylesheet">
    <script src='../wireframe.js'></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <main class="height100">
      <article class="taxReceipt">
        <header class="wide100">
          <img id="logo" src="../../media/lunardo_logo_no_text.png" alt="Logo of Lunardo Cinema">
          <span class="right">Receipt</span>
        </header>
        <div class="receiptDetails">
          <div class="receiptLunardo">
            <span class="receiptThird">ABN: 00123456789</span>
            <span class="receiptThird">Phone Number: 0412345678</span>
            <span class="receiptThird">Date: <?php echo date("Y-m-d"); ?></span>
          </div>
          <table class="details">
            <tr>
              <th><h2 class="detailsID">Customer Details:</h2></th>
              <th><?php
              echo $dataArray['cust']['name'],"<br />";
              echo $dataArray['cust']['email'],"<br />";
              echo $dataArray['cust']['mobile'],"<br />";
               ?></th>
            </tr>
        </div>
        <table class="receiptItems">
          <tr class="tableTop">
            <td>Ticket Type</td>
            <td>Qty</td>
            <td>Subtotal</td>
          </tr>
          <?php
          echo $detailsTable;
           ?>

        </table>
      </article>

      <?php
      echo $tickets;
      if (isset($error)) {
        echo "<h1>".$error."</h1>";
      }
       ?>
    </main><br />

    <footer>
      For any personal enquiries, feel free to contact the owner, Leo Tarkesian.
      <ul class="details">
        <li>Email: manager@lunardo.com</li>
        <li>Phone: 0412-345-678</li>
        <li>Address: 18 Dolevale Cresent, Duckburg, AXY 5632</li>
      </ul>

      <form method="post" action="">
        <button name="seeCode" value=
        <?php
        if (isset($_POST['seeCode'])) {
          if ($_POST['seeCode'] == 'true') {
            echo 'false type="submit">Hide ';
          }
          else {
            echo 'true type="submit">See ';
          }
        }
        else {
          echo 'true type="submit">See ';
        }
        ?>
        Code</button>
      </form>

      <form method="post" action="">
        <button name="session-reset" value="true">Reset Session</button>
      </form>

      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Guy Witherow s3783428, Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

    <?php
    if (isset($_POST['seeCode'])) {
      if ($_POST['seeCode'] == 'true') {
        printMyCode();
        echo "<br />";
        echo "POST DATA:";
        echo "<br />";
        preShow($_POST);
        echo "<br />";
        echo "SESSION DATA:";
        echo "<br />";
        if (isset($_SESSION)) {
          preShow($_SESSION);
        }
      }
    }

     ?>
  </body>
</html>
