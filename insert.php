<?php


if(isset($_POST['submit'])) {
  include "function.php";
  // เรียกใช้ฟังก์ชั่น Insert เมื่อกดปุ่ม submit
  Insert();
}

  ?>

  <!DOCTYPE html>
  <html>
  <title>Notebook | Insert</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/w3.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">

  <body>
    <div class="container">
      <div class="wrapper-form">
        <div class="w3-container w3-teal w3-center">
          <h2>Input Notebook</h2>
        </div>
        <form class="w3-container" action="insert.php" method="post" enctype="multipart/form-data">
          <p>
            <label class="w3-text-brown">
              <b>Name</b>
            </label>
            <input class="w3-input w3-border w3-margin-top w3-round-large" name="nname" type="text" required>
          </p>
          <p>
            <label class="w3-text-brown">
              <b>CPU</b>
            </label>
            <input class="w3-input w3-border w3-margin-top w3-round-large" name="cpu" type="text" required>
          </p>
          <p>
            <label class="w3-text-brown">
              <b>RAM</b>
            </label>
            <input class="w3-input w3-border w3-margin-top w3-round-large" name="ram" type="text" required>
          </p>
          <p>
            <label class="w3-text-brown">
              <b>Harddisk</b>
            </label>
            <input class="w3-input w3-border w3-margin-top w3-round-large" name="hdd" type="text" required>
          </p>
          <p>
            <label class="w3-text-brown">
              <b>Graphic</b>
            </label>
            <input class="w3-input w3-border w3-margin-top w3-round-large" name="gpu" type="text" required>
          </p>
          <p>
            <label class="w3-text-brown">
              <b>Display</b>
            </label>
            <input class="w3-input w3-border w3-margin-top w3-round-large" name="display" type="text">
          </p>
          <label class="w3-button w3-section w3-teal">Select Image
            <input type="file" name="imageUpload" accept="image/*" required hidden>
          </label>
          <div class="w3-container w3-right w3-section">
            <a href="index.php" class="w3-button w3-light-grey">
              <i class="fas fa-caret-left"></i> Back</a>
            <button type="submit" name="submit" class="w3-btn w3-blue">Submit</button>
          </div>

        </form>
      </div>
    </div>

    </div>


  </body>

  </html>