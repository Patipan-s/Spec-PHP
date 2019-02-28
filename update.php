<?php include "function.php"; Update()  ?>
<!DOCTYPE html>
<html>
<title>Notebook | Update</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">

<body>
  <div class="container">
    <div class="wrapper-form">
      <div class="w3-container w3-teal">
        <h2>Update Notebook</h2>
      </div>
      <form class="w3-container" action="update.php" method="post" enctype="multipart/form-data" name="form1">
        <p>
          <label class="w3-text-brown"><b> Select Notebook to update : </b></label>
          <select name="id" class="w3-select w3-padding w3-margin-left"style="width:500px">
          <!-- แสดง id เพื่อใช้ในการอัพเดท -->
            <?php readID() ?>
          </select>
        </p>
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
          <input class="w3-input w3-border" name="display" type="text" required>
        </p>
        <label class="w3-button w3-section w3-teal">Select Image<input type="file" name="imageUpload" accept="image/*" required hidden></label>
        <div class="w3-container w3-right w3-section">
            <a href="index.php" class="w3-button w3-light-grey"><i class="fas fa-caret-left"></i> Back</a>
            <button type="submit" name="submit" class="w3-btn w3-blue">Submit</button>
          </div>

      </form>


    </div>
  </div>
</body>

</html>