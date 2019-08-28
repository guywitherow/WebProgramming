<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link href="https://fonts.googleapis.com/css?family=Lato|Righteous&display=swap" rel="stylesheet">
    <script src='../wireframe.js'></script>
  </head>

  <body>

    <header>
      <div>
        <img id="logo" src="../../media/lunardo_logo_no_text.png" alt="Logo of Lunardo Cinema">
        <span id="title">Lunardo</span>
      </div>
    </header>

    <nav>
      <ul class="navList">
        <li class="navItem"><a href="#aboutUs">About Us</a></li>
        <li class="navItem"><a href="#prices">Prices</a></li>
        <li class="navItem"><a href="#nowShowing">Now Showing</a></li>

      </ul>
    </nav>

    <main>
      <article class="article" id="aboutUs">
        <h1>About Us</h1>
        <div class="sub_article_left">
          <h2>Grand Re-opening!</h2>
        </div>
        <div class="sub_article_right">
          <h2>New Seating</h2>
          <img src="../../media/standardSeat.png">
          <img src="../../media/firstClassSeat.png">
        </div>
        <div class="sub_article_left">
          <h2>An Experience Re-imagined</h2>
          The cinema has had its audio and visual replaced, and we now sport Dolby sound and visual.

          <div class="inlineContainer">
            <div class="inline inlineLeft">
              <img id="dolbyAtmos" src="../../media/atmos.png">
            </div>
            <div class="inline inlineRight">
              <ul class="dolbyFactList">
                <li class="dolbyFact">
                  <h3>All sides covered</h3>
                  <p>
                    The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                  </p>
                </li>
                <li class="dolbyFact">
                  <h3>All sides covered</h3>
                  <p>
                    The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                  </p>
                </li>
              </ul>
              <ul class="dolbyFactList">
                <li class="dolbyFact">
                  <h3>All sides covered</h3>
                  <p>
                    The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                  </p>
                </li>
                <li class="dolbyFact">
                  <h3>All sides covered</h3>
                  <p>
                    The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                  </p>
                </li>
              </ul>
            </div>
          </div>

          <div class="inlineContainer dolbyBorder">
            <div class="inline inlineLeft">
              <img id="dolbyAtmos" src="../../media/vision.png">
            </div>
            <div class="inline inlineRight">
              <ul class="dolbyFactList">
                <li class="dolbyFact">
                  <h3>All sides covered</h3>
                  <p>
                    The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                  </p>
                </li>
                <li class="dolbyFact">
                  <h3>All sides covered</h3>
                  <p>
                    The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                  </p>
                </li>
              </ul>
              <ul class="dolbyFactList">
                <li class="dolbyFact">
                  <h3>All sides covered</h3>
                  <p>
                    The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                  </p>
                </li>
                <li class="dolbyFact">
                  <h3>All sides covered</h3>
                  <p>
                    The movies comes alive as sound is produced on all sides, including above you, whisking the whole cinema into the world of the movie.
                  </p>
                </li>
              </ul>
            </div>
        </div>
        <p>For more information, visit the <a href="https://www.dolby.com/us/en/cinema/index.html" target="_blank">Dolby Site</a>.</p>
      </article>

      <article class="article" id="prices">

        <div class="gridContainer">
          <div class="title">
            <h1>Prices</h1>
          </div>
          <div class="subtitle">
            Special prices apply to midday sessions, Monday to Friday, as well as Monday and Wednesday.
          </div>
          <div class="std1 standard">
            Standard Adult:
            <p> Standard: $19.80
            <p> Special: $14.00
          </div>
          <div class="std2 standard">
            Standard Concession:
            <p> Standard: $17.50
            <p> Special: $12.50
          </div>
          <div class="std3 standard">
            Standard Child:
            <p> Standard: $15.30
            <p> Special: $11.00
          </div>
          <div class="gold1 gold">
            First Class Adult:
            <p> Standard: $30.00
            <p> Special: $24.00
          </div>
          <div class="gold2 gold">
            First Class Concession:
            <p> Standard: $27.00
            <p> Special: $22.50
          </div>
          <div class="gold3 gold">
            First Class Child:
            <p> Standard: $24.00
            <p> Special: $21.00
          </div>
        </div>
      </article>

      <article class="article" id="nowShowing">
        <h1>Now Showing</h1>

      </article>
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Guy Witherow s3783428, Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
