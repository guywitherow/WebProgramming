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
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link href="https://fonts.googleapis.com/css?family=Lato|Righteous&display=swap" rel="stylesheet">
    <script src='../wireframe.js'></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body onscroll="updateNav()">
    <script src="script.js"></script>
    <header class="wide100">
      <img id="logo" src="../../media/lunardo_logo_no_text.png" alt="Logo of Lunardo Cinema">
      <span id="title">Lunardo</span>
    </header>

    <nav>
      <ul class="navList" id="navList">
        <a href="#aboutUs"><li class="navItem">About Us</li></a>
        <a href="#prices"><li class="navItem">Prices</li></a>
        <a href="#nowShowing"><li class="navItem last">Now Showing</li></a>
      </ul>
    </nav>

    <main>
      <article class="article" id="aboutUs">
        <h1>About Us</h1>
        <div>
          <h2>An Experience Re-imagined</h2>
        </div>
        <div class="articlePadding">
          <div class="imageDiv">
            <div class="imageHalf">
              <img src="../../media/standardSeat.png" class="seatImage imageCentre" alt="Image of the standard cinema seat">
              <h3>Standard Seating</h3>
              <p>The new standard seating sports luxurious cushioning, as well as adjustable armrests with cupholders!
            </div>
            <div class="imageHalf">
              <img src="../../media/firstClassSeat.png" class="seatImage imageCentre" alt="image of the first class cinema seat">
              <h3>First Class Seating</h3>
              <p>First Class takes comfort to a new level, with leg rests that raise, comforting you through your first class experience.
            </div>
          </div>
        </div>

        <div class="sub_article">
          <h3>Revamped Sound and Visuals</h3>
          <div class="inlineContainer">
            <div class="inline inlineLeft">
              <img id="dolbyAtmos" class="imageCentre" src="../../media/atmos.png" alt="image of the dolby atmos logo">
            </div>
            <div class="inline inlineRight">
              <div class="factCentre">
                <div class="factContainer">
                  <ul class="dolbyFactList">
                    <li class="dolbyFact">
                      <h4>All sides covered</h4>
                      <p>
                        The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                      </p>
                    </li>
                    <li class="dolbyFact">
                      <h4>Artist's intent</h4>
                      <p>
                        With rich quality and true immersion, you can finally discover the film the way the creator intended it.
                      </p>
                    </li>
                  </ul>
                </div>
                <div class="factContainer">
                  <ul class="dolbyFactList">
                    <li class="dolbyFact">
                      <h4>Sound that moves you</h4>
                      <p>
                        With the 3D layout of the speakers, the movie will feel all the more immersive as you experience the world as rich as can be.
                      </p>
                    </li>
                    <li class="dolbyFact">
                      <h4>Senses Excited</h4>
                      <p>
                        With true bass and surround sound, the impact of the film makes you feel the emotion of the film all the more.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="inlineContainer dolbyBorder">
            <div class="inline inlineLeft">
              <img id="dolbyAtmos" class="imageCentre" src="../../media/vision.png" alt="image of the dolby vision logo">
            </div>
            <div class="inline inlineRight">
              <div class="factCentre">
                <div class="factContainer">
                  <ul class="dolbyFactList">
                    <li class="dolbyFact">
                      <h4>Dolby Expertise</h4>
                      <p>
                        Dolby has many years of engineering film experiences, and the Dolby Vision experince promises to be on a whole new level.
                      </p>
                    </li>
                    <li class="dolbyFact">
                      <h4>Beautiful Colour</h4>
                      <p>
                        With all new HDR technology advancements, the film will bloom beautifully off the screen.
                      </p>
                    </li>
                  </ul>
                </div>
                <div class="factContainer">
                  <ul class="dolbyFactList">
                    <li class="dolbyFact">
                      <h4>Full Support</h4>
                      <p>
                        Dolby Vision supports hundreds of movies, with more being added every day
                      </p>
                    </li>
                    <li class="dolbyFact">
                      <h4>More than just the movie</h4>
                      <p>
                        Dolby Vision is also available for your home, with support for laptops, tablets, phones and home computers.
                      </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="dolbyFooter">
            <p>For more information, visit the <a href="https://www.dolby.com/us/en/cinema/index.html" target="_blank">Dolby Site</a>.</p>
          </div>
        </div>
      </article>

      <article class="article" id="prices">
        <h1>Prices</h1>
        <div class="gridContainer">
          <div class="subtitle">
            Special prices apply to midday sessions on Monday to Friday, as well as all day Monday and Wednesday.
          </div>
          <div class="std1 standard">
            <h3>Standard Adult</h3>
            <div class="priceDiv">
              <div class="standardPrice priceCentre">
                <span>
                  Standard: $19.80
                </span>
              </div>
              <div class="specialPrice priceCentre">
                <span>Special: $14.00
                </span>
              </div>
            </div>
          </div>
          <div class="std2 standard">
            <h3>Standard Concession</h3>
            <div class="priceDiv">
              <div class="standardPrice priceCentre">
                <span>Standard: $17.50
                </span>
              </div>
              <div class="specialPrice priceCentre">
                <span>Special: $12.50
                </span>
              </div>
            </div>
          </div>
          <div class="std3 standard">
            <h3>Standard Child</h3>
            <div class="priceDiv">
              <div class="standardPrice priceCentre">
                <span>Standard: $15.30
                </span>
              </div>
              <div class="specialPrice priceCentre">
                <span>Special: $11.00
                </span>
              </div>
            </div>
          </div>
          <div class="first1 first">
            <h3>First Class Adult</h3>
            <div class="priceDiv">
              <div class="standardPrice priceCentre">
                <span>Standard: $30.00
                </span>
              </div>
              <div class="specialPrice priceCentre">
                <span>Special: $24.00
                </span>
              </div>
            </div>
          </div>
          <div class="first2 first">
            <h3>First Class Concession</h3>
            <div class="priceDiv">
              <div class="standardPrice priceCentre">
                <span>Standard: $27.00
                </span>
              </div>
              <div class="specialPrice priceCentre">
                <span>
                Special: $22.50
                </span>
              </div>
            </div>
          </div>
          <div class="first3 first">
            <h3>First Class Child</h3>
            <div class="priceDiv">
              <div class="standardPrice priceCentre">
                <span>Standard: $24.00
                </span>
              </div>
              <div class="specialPrice priceCentre">
                <span>Special: $21.00
                </span>
              </div>
            </div>
          </div>
        </div>
      </article>

      <article class="article" id="nowShowing">
        <div class="articleContainer">
          <h1>Now Showing</h1>
          <div class="posterContainer">
            <div class="avengers postCard">
              <div class="posterDiv">
                <img class="poster" src="../../media/avengers.png" alt="Avengers endgame poster">
                <button class="detailsButton" onclick="ACTInfo()">More info</button>
              </div>
              <div class="posterText">
                <div class="posterTitles">
                  <h3>Avengers: Endgame</h3><h4>PG</h4>
                </div>
                <div class="timesList">
                  <ul>
                    <li>Wednesday - 9pm</li>
                    <li>Thursday - 9pm</li>
                    <li>Friday - 9pm</li>
                    <li>Saturday - 6pm</li>
                    <li>Sunday - 6pm</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="tEW postCard">
              <div class="posterDiv">
                <img class="poster" src="../../media/topEndWedding.png" alt="top end wedding poster">
                <button class="detailsButton" onclick="RMCInfo()">More info</button>
              </div>
              <div class="posterText">
                <div class="posterTitles">
                  <h3>Top End Wedding</h3><h4>M</h4>
                </div>
                <div class="timesList">
                  <ul>
                    <li>Monday - 6pm</li>
                    <li>Tuesday - 6pm</li>
                    <li>Saturday - 3pm</li>
                    <li>Sunday - 3pm</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="dumbo postCard">
              <div class="posterDiv">
                <img class="poster" src="../../media/dumbo.png" alt="dumbo poster">
                <button class="detailsButton" onclick="ANMInfo()">More info</button>
              </div>
              <div class="posterText">
                <div class="posterTitles">
                  <h3>Dumbo</h3><h4>G</h4>
                </div>
                <div class="timesList">
                  <ul>
                    <li>Monday - 12pm</li>
                    <li>Tuesday - 12pm</li>
                    <li>Wednesday - 6pm</li>
                    <li>Thursday - 6pm</li>
                    <li>Friday - 6pm</li>
                    <li>Saturday - 12pm</li>
                    <li>Sunday - 12pm</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="tHP postCard">
              <div class="posterDiv">
                <img class="poster" src="../../media/theHappyPrince.png" alt="the happy prince poster">
                <button class="detailsButton" onclick="AHFInfo()">More info</button>
              </div>
              <div class="posterText">
                <div class="posterTitles">
                  <h3>The Happy Prince</h3><h4>R18+</h4>
                </div>
                <div class="timesList">
                  <ul>
                    <li>Wednesday - 12pm</li>
                    <li>Thursday - 12pm</li>
                    <li>Friday - 12pm</li>
                    <li>Saturday - 9pm</li>
                    <li>Sunday - 9pm</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="synopsisContainer">
            <div class="synopsisVerticalMain">
              <div class="synopsisHorizontalHalf1">
                <div class="synopsisVerticalTitle">
                  <span class="synopsisTitle" id="synopsisTitle">Avengers: Endgame</span> <span class="synopsisRating" id="synopsisRating">PG</span>
                </div>
                <div class="synopsisVerticalDetails" id="synopsisVerticalDetails">
                  After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.
                </div>
              </div>
              <div class="synopsisHorizontalHalf2">
                <iframe id="synopsisVideo" src="https://www.youtube.com/embed/TcMBFSGVi1c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
            <div class="synopsisVerticalFill">
              <div class="synopsisHorizontalBooking">
                Make A Booking
              </div>
              <div class="synopsisHorizontalButtons" id="synopsisHorizontalButtons" >
                <button onclick="submitValue('ACT','T21','WED')">9pm Wednesday</button><button onclick="submitValue('ACT','T21','THU')">9pm Thursday</button><button onclick="submitValue('ACT','T21','FRI')">9pm Friday</button>
                <button onclick="submitValue('ACT','T18','SAT')">6pm Saturday</button><button onclick="submitValue('ACT','T18','SUN')">6pm Sunday</button>
              </div>
            </div>
          </div>
          <div class="bookingContainer">
            <form method="post" action="">
              <input id="formTitle" name="movie[id]" type="hidden" required/>
              <input id="formDay" name="movie[day]" type="hidden" onchange="changeDayTime()"  required/>
              <input id="formHour" name="movie[hour]" type="hidden" onchange="changeDayTime()"  required/>
              <div class="formHalf">
                <h1 class="formHeader" id="movieCheck">Booking Form <br /> Please Select a Movie</h1>
                <div class="stdForm">
                  <label>Standard Adults</label>
                  <select id="STA" name="seats[STA]" onchange="ticketChange('STA')">
                    <?php
                    oneToTen("STA");
                    ?>
                  </select><br />
                  <label>Standard Concession</label>
                  <select id="STP" name="seats[STP]" onchange="ticketChange('STP')">
                    <?php
                    oneToTen("STP");
                    ?>
                  </select><br />
                  <label>Standard Children</label>
                  <select id="STC" name="seats[STC]" onchange="ticketChange('STC')">
                    <?php
                    oneToTen("STC");
                    ?>
                  </select><br />

                </div>
                <div class="firstForm">
                  <label>First Class Adults</label>
                  <select id="FCA" name="seats[FCA]" onchange="ticketChange('FCA')">
                    <?php
                    oneToTen("FCA");
                    ?>
                  </select><br />
                  <label>First Class Concession</label>
                  <select id="FCP" name="seats[FCP]" onchange="ticketChange('FCP')">
                    <?php
                    oneToTen("FCP");
                    ?>
                  </select><br />
                  <label>First Class Children</label>
                  <select id="FCC" name="seats[FCC]" onchange="ticketChange('FCC')">
                    <?php
                    oneToTen("FCC");
                    ?>
                  </select><br />
                </div>
                <div class="totalForm">
                  <label>Price</label>
                  <input id="formPrice" readonly />
                </div>
              </div>
              <div class="detailsForm">
                <label>Name
                  <?php
                  errorReport('name');
                   ?>
                 </label>
                <input name="cust[name]" pattern="(([A-Z]{1}[a-z]{1,}|[A-Z]{1}'{1}[A-Z]{1}[a-z]{1,})\s[A-Z]{1}[a-z]{1,})" required
                <?php
                recallValues('name');
                 ?>
                />
                <br />
                <label>Email
                  <?php
                  errorReport('email');
                   ?>
                 </label>
                <input name="cust[email]" required type="email"
                <?php
                recallValues('email');
                 ?>
                />
                <br />
                <label>Mobile
                  <?php
                  errorReport('mobile');
                   ?>
                 </label>
                <input name="cust[mobile]" required  pattern="(\(04\)|04|\+614)[0-9]{8}|[0-9 ]{17}"

                <?php
                recallValues('mobile');
                 ?>
                />
                <br />
                <label>Credit Card
                  <?php
                  errorReport("card");
                   ?>
                 </label>
                <input name="cust[card]" required pattern="[0-9]{14,19}"
                <?php
                recallValues('card');
                 ?>
                />

                <br />
                <label>Expiry
                  <?php
                  errorReport('expiry');
                   ?>
                 </label>
                <input name="cust[expiry]" required type="month" min="<?php echo date("Y-m") ?>"
                <?php
                recallValues('expiry');
                 ?>
                />
                <br />
                <input id="orderButton" name="order" type="submit" value="Order"
                <?php
                if (isset($_POST['cust'])) {
                  echo "disabled='false'";
                }
                else {
                  echo "disabled='true'";
                }
                 ?>
                >
              </div>

            </form>
          </div>
        </div>
      </article>
    </main>

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

      <form method="post" action="" name="reset">
        <button name="reset-session" value=
        <?php
        if (isset($_POST['reset-session'])) {
          if ($_POST['reset-session'] == 'true') {
            echo 'false type="submit">';
          }
          else {
            echo 'true type="submit">';
          }
        }
        else {
          echo 'true type="submit">';
        }
        ?>
        Reset Session</button>
      </form>

      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Guy Witherow s3783428, Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>


    <?php
    if (isset($_POST['movie'])) {}
      echo "<script>submitValue('",$_POST['movie']['id'],"','",$_POST['movie']['hour'],"','",$_POST['movie']['day'],"');
      ticketChange('STA');
      ticketChange('STP');
      ticketChange('STC');
      ticketChange('FCA');
      ticketChange('FCC');
      ticketChange('FCP');
      ",$_POST['movie']['id'],"Info();
      </script>";
     ?>

  </body>
</html>
