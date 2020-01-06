<?php
##
function cURL($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  $ex = curl_exec($ch);
  curl_close($ch);
  return $ex;
}
?>
<html>
  <head>
    <title>Facebook video downloader</title>
    <meta name="description" content="NyamuXpl0it | Rasyad Gantenx" />
    <meta name="keyword" content="Facebook, video, downloader, fbvideo" />
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Girassol|Lato|Cute+Font" rel="stylesheet">
  </head>
  <body>
    <div class="form-control">
      <div class="form-text">
        Input FB video link
      </div>
      <form method="post">
        <input type="text" name="video" class="form-check-input" placeholder="Facebook video link"><br><br>
        <input type="submit" name="submit" value="Check">
      </form>
    </div><br><br>
    <?php
    if(isset($_POST['submit'])){
      $fbvid = $_POST['video'];
      $paan = cURL("https://fbdownloader.net/download/?url=".$fbvid);
      // $bngsd = cURL($fbvid);
      preg_match_all('/<li><a href="([^`]*?)" class="btn btn-default btn-blue">/', $paan, $ajg);
      preg_match_all('/<img src="([^`]*?)" \/>/', $paan, $coek);
      preg_match_all('/<p class="title">([^`]*?)<\/p>/', $paan, $bjir);
      if(preg_match("/Convert/", $paan)) {
        foreach($bjir[1] as $title) {
          echo "<div class='result'>".$title."<br>";
        }
        foreach($coek[1] as $image) {
          echo "<a href='".$fbvid."'><img src='".$image."' id='im0'></a><br>";
        }
        foreach($ajg[1] as $down) {
          echo "<a href='".$down."'><button class='downbut'>Download Now</button>";
        }
      } else {
        echo "<p class='text-warning'>Can't get video</p>";
      }
    } else {
      ?>
      <div class="about">
        <h1>N4ST4R_ID | NyamuXpl0it</h1><br>
        <p id="text">Mohon bersabar jika lemot xixixi.<br>
        Jika video bukan publik maka tidak bisa di download</p><br><br>
        <vis>Visit: </vis><a href="https://www.nyamuxpl0it.cf" target="_blank">www.NyamuXpl0it.cf</a>
      </div>
      <?php
    }
    ?></div>
  </body>
</html>