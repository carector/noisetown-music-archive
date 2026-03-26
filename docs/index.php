<!DOCTYPE html>
<html>

<!-- There are a few particularly heinous songs I couldn't bring myself to list on this page.
      I commented them out, but you can still access them below if you REALLY want to. -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Noisemaker Music Archive</title>

  <link href="fakewp2_skin2_old.css" rel="stylesheet" type="text/css" media="all">
  <link href="fakewp2_skin2.css" rel="stylesheet" type="text/css" media="all">

</head>

<body>
  <?php

  // Get archive path
  $path = getcwd() . "/res/audio/archive/";
  $years = glob($path . "*");

  // Get total song count
  $filecount = 0;
  foreach ($years as $year) {
    $filecount += count(glob($year . "/*"));
  }
  ?>

  <div class=wrapper>
    <div class=header>
      <div class=header-shadow>
        <h1 class="bobanimate">The Noisemaker Music Archive</h1>
        <!--<a href="/index.html"><img class="bobanimate" src="res/images/logoAnimated.gif"></img></a>!-->
      </div>
    </div>

    <div class=title></div>

    <div class=wrapper-2>
      <div class=sidebar-left>
        <div class=box>
          <h3>By year</h3>
          <div class=inner-medium>
            <ul class=no-bullets>
              <?php
              // Get year of each folder
              foreach ($years as $year) {
                $yearTokens = explode('/', $year);
                $yearInt = $yearTokens[sizeof($yearTokens) - 1];
                echo '<li><a href="#' . $yearInt . '">' . $yearInt . '</a></li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>

      <div class=main>
        <div class=box>
          <div class=inner>
            <p>By some miracle I've kept backups of nearly every single .flp file I've made since 2013. This page
              contains everything I've made under the Noisemaker alias that I can share.</p>
            <!-- <p>I've highlighted my favorites in <element class="green">green.</element> 
              -->
            <p>The filenames of the songs are unchanged. You can't make this stuff up.</p>
            <p>Enjoy the following slurry of audio files. <element class="lightred">KEEP YOUR VOLUME LOW!</element>
            </p>

          </div>
        </div>

        <!-- List count of all songs !-->
        <div class=box>
          <div>
            <?php echo '<h1>Hosting ' . $filecount . ' songs</h1>'; ?>
          </div>
        </div>

        <?php

        // Create boxes for each year
        foreach ($years as $year) {
          $yearTokens = explode('/', $year);
          $yearInt = $yearTokens[sizeof($yearTokens) - 1];
          echo '<div class=box id=' . $yearInt . '>';
          echo '<h2>' . $yearInt . '</h2>';
          ?>
          <div class=inner-big>
            <ul class="no-bullets">
              <?php
              $files = glob($year . "/*");
              foreach ($files as $file) {
                // Bloodcurdling regular expression
                $exp = "/(?!.*\/).*/";
                preg_match($exp, $file, $matches);
                echo '<li><a href="' . $file . '">' . $matches[0] . '</a></li>';
              } ?>
            </ul>
          </div>
        </div>
      <?php } ?>

      <div class="box">
        <div class="center-content">Last updated 3/20/2026</div>
      </div>
    </div>
  </div>
  <br>
  <div class=footer>
    <p>Site by Noisemaker 2022-2026. Original template by <a
        href="https://eggramen.neocities.org/code/css_testpages">EGGRAMEN</a></p>
  </div>
  </div>
</body>
</html>