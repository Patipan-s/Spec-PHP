<?php 
include "connection.php";
include "function.php"; 
// เรียกใช้ฟังก์ชั่น Delete
Delete();

// กำหนดตัวแปรในการ Query โดยตั้งให้มีค่าว่างเพื่อให้สามารถเรียกข้อมูลได้ทุกตัว
$brandfilter =  '';
$cpufilter =  '';
$ramfilter =  '';
$hddfilter =  '';
$disfilter =  '';

// เมื่อกดปุ่ม search ให้
if(isset($_POST['search_submit'])) {
    // เมื่อกดปุ่ม search ให้รับค่าตัวแปลจาก form เพื่อนำไป query
    $brandfilter = $_POST['brandfilter'];
    $cpufilter = $_POST['cpufilter'];
    $ramfilter = $_POST['ramfilter'];
    $hddfilter = $_POST['hddfilter'];
    $disfilter = $_POST['disfilter'];
  } 

?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Notebook | Specification</title>
<link rel="stylesheet" type="text/css" href="css/w3.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">

<body class="w3-light-grey w3-content" style="max-width:1600px">
    <div class="container">
        <div class="wrapper">
            <div class="w3-main">
                <div class="w3-container">
                    <h1>
                        <b>Notebook Specification</b>
                    </h1>
                    <div id="btnContainer" class="w3-center w3-margin">
                        <button id="btn_g" class="btnView active" onclick="changeviewGrid('gview')">
                            <i class="fas fa-th-large"></i> Grid</button>
                        <button id="btn_l" class="btnView" onclick="changeviewList('lview')">
                            <i class="fas fa-list-ul"></i> List</button>
                    </div>
                    <div class="w3-section w3-bottombar w3-padding-16" action="index.php" method="post">
                        <form action="index.php" method="post">
                            <span class="w3-margin-right">Filter :</span>
                            <select name="brandfilter" class="w3-select" style="max-width:150px">
                                <option value="">Select Brand</option>
                                <option value="ASUS">ASUS</option>
                                <option value="LENOVO">LENOVO</option>
                                <option value="HP">HP</option>
                                <option value="ACER">ACER</option>
                                <option value="DELL">DELL</option>
                            </select>
                            <select name="cpufilter" class="w3-select w3-margin-left" style="max-width:150px">
                                <option value="">Select CPU</option>
                                <option value="Pentium">Pentium</option>
                                <option value="Celeron">Celeron</option>
                                <option value="Core i3">Core I3</option>
                                <option value="Core i5">Core I5</option>
                                <option value="Core i7">Core I7</option>
                            </select>
                            <select name="ramfilter" class="w3-select w3-margin-left" style="max-width:150px">
                                <option value="">Select RAM</option>
                                <option value="4GB">4GB</option>
                                <option value="8GB">8GB</option>
                                <option value="16GB">16GB</option>
                            </select>
                            <select name="hddfilter" class="w3-select w3-margin-left" style="max-width:150px">
                                <option value="">Select Harddisk</option>
                                <option value="500GB">500GB</option>
                                <option value="1TB">1TB</option>
                            </select>
                            <select name="disfilter" class="w3-select w3-margin-left" style="max-width:150px">
                                <option value="">Select Display</option>
                                <option value="11.6 inch">11.6 inch</option>
                                <option value="14.0 inch">14.0 inch</option>
                                <option value="15.6 inch">15.6 inch</option>
                                <option value="17.3 inch">17.3 inch</option>
                            </select>
                            <button type="submit" name="search_submit" class="w3-btn w3-teal w3-round-large w3-margin-left">
                                <i class="fas fa-search"></i> Search</button>
                            <div class="w3-right">
                                <a href="insert.php"><span class="w3-button w3-green"><i class="fas fa-plus"></i> Add</span></a>
                                <a href="update.php"><span class="w3-button w3-blue"><i class="far fa-edit"></i> Update</span></a>
                                <span class="w3-button w3-red" onclick="document.getElementById('delete-modal').style.display='block'"><i class="far fa-trash-alt"></i> Delete</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal ของ Delete -->
                <div id="delete-modal" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-top" style="width:700px">
                        <header class="w3-container w3-red">
                            <span onclick="document.getElementById('delete-modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Delete</h2>
                        </header>
                        <div class="w3-container">
                            <form class="w3-container" action="index.php" method="post" enctype="multipart/form-data" name="delform">
                                <p>
                                    <label class="w3-text-brown">
                                        <b> Select Notebook to delete : </b>
                                    </label>
                                    <select name="id" class="w3-select" style="width:400px">
                                        <!-- แสดง id ของข้อมูลที่ต้องการลบ -->
                                        <?php readID() ;?>
                                    </select>
                                </p>
                                <div class="w3-container w3-section w3-right">
                                    <span onClick="document.getElementById('delete-modal').style.display='none'" class="w3-button w3-light-grey">Cancel</span>
                                    <button type="submit" name="del_submit" class="w3-button w3-red">
                                        <i class="far fa-trash-alt"></i> Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- แสดงข้อมูลในรูปแบบ Grid -->
                <div id="gview" class="w3-hide w3-show">
                    <div class="w3-row-padding">
                        <?php
                    //เลือกข้อมูลที่ต้องการ query
                    $sql = "SELECT * FROM notebooktable WHERE nname LIKE '%$brandfilter%'";
                    $sql .= " AND cpu LIKE '%$cpufilter%'";
                    $sql .= " AND ram LIKE '%$ramfilter%'";
                    $sql .= " AND hdd LIKE '%$hddfilter%'";
                    $sql .= " AND display LIKE '%$disfilter%'";
                    $query = mysqli_query($conn, $sql);
                    if (!$query) {
                        die ('SQL Error: ' . mysqli_error($conn));
                    }
                    while ($row = mysqli_fetch_array($query))
                    { 
                        //สร้างข้อมูล html ในรูปแบบ grid
                        echo'
                            <div class="w3-quarter w3-container w3-margin-bottom" >
                                <img src="img/'.$row['img'].'" alt="Norway" style="width:100%;height:300px" class="w3-hover-opacity">
                                <div class="w3-container w3-white" style="height:220px;">
                                    <h5 class="titlesmall">'.$row['nname'].'</h5>
                                    <p class="small">CPU : '.$row['cpu'].'</p>
                                    <p class="small">RAM : '.$row['ram'].'</p>
                                    <p class="small">Harddisk : '.$row['hdd'].'</p>
                                    <p class="small">Graphic : '.$row['gpu'].'</p>
                                    <p class="small">Display : '.$row['display'].'</p>
                                </div>
                            </div>';
                }?>
                    </div>
                </div>

                <!-- แสดงข้อมูลในรูปแบบตาราง-->
                <div id="lview" class="w3-container w3-hide">
                    <div style="overflow-x:auto;">
                        <table class="w3-table-all maintable">
                            <thead>
                                <tr class="w3-teal">
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>CPU</th>
                                    <th>Ram</th>
                                    <th>Harddisk</th>
                                    <th>Graphic</th>
                                    <th>Display</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //เลือกข้อมูลที่ต้องการ query
                                $sql = "SELECT * FROM notebooktable WHERE nname LIKE '%$brandfilter%'";
                                $sql .= " AND cpu LIKE '%$cpufilter%'";
                                $sql .= " AND ram LIKE '%$ramfilter%'";
                                $sql .= " AND hdd LIKE '%$hddfilter%'";
                                $sql .= " AND display LIKE '%$disfilter%'";
                                $query = mysqli_query($conn, $sql);
                                    if (!$query) {
                                        die ('SQL Error: ' . mysqli_error($conn));
                                    }
                                        while ($row = mysqli_fetch_array($query))
                                            {
                                            //สร้างข้อมูล html ในรูปแบบ table
                                                echo '<tr>
                                                        <td>'.$row['nname'].'</td>
                                                        <td><img src="img/'.$row['img'].'" height="150px" width="150px"></td>
                                                        <td>'.$row['cpu'].'</td>
                                                        <td>'.$row['ram'].'</td>
                                                        <td>'.$row['hdd'].'</td>
                                                        <td>'.$row['gpu'].'</td>
                                                        <td>'.$row['display'].'</td>
                                                    </tr>';
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <script>
        // เปลี่ยนรูปแบบจาก table เป็น grid
        function changeviewGrid(id) {
            var x = document.getElementById(id);
            // ถ้า div gview ไม่มี classname ให้เพิ่ม class "w3-show"
            if (x.className.indexOf("w3-show") == -1) {
                x.className += "w3-show";
            }
            // ส่วน div lview  ให้ลบ class "w3-show"
            var y = document.getElementById("lview");
            y.className = y.className.replace("w3-show", "");


        }
        // เปลี่ยนรูปแบบจาก grid เป็น table
        function changeviewList(id) {
            var x = document.getElementById(id);
            // ถ้า div lview ไม่มี classname ให้เพิ่ม class "w3-show"
            if (x.className.indexOf("w3-show") == -1) {
                x.className += "w3-show";
            }
            // ส่วน div gview  ให้ลบ class "w3-show"
            var y = document.getElementById("gview");
            y.className = y.className.replace("w3-show", "");
        }


        // สลับปุ่มที่ active ระหว่างปุ่ม GridView กับ ListView
        var container = document.getElementById("btnContainer");
        var btns = container.getElementsByClassName("btnView");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }



    </script>

</body>

</html>