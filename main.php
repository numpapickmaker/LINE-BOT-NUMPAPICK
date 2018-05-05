<!DOCTYPE html>
<html>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l"
    crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c"
    crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Kanit:200|Open+Sans|Taviraj" rel="stylesheet">

<body>

    <style>
        body {
            background-color: white;
        }

        h1 {
            color: #072140;
            text-align: center;
        }

        p {
            font-family: verdana;
            font-size: 20px;
        }

        input[type=text],
        select {
            width: 100%;
            padding: 12px 28px;
            margin: 8px 2px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .kanit {
            font-family: 'Kanit', sans-serif;
        }

        .Taviraj {
            font-family: 'Taviraj', serif;
            font-size: 20px;
            margin: 24px 20px;
        }

        .button {
            background-color: white;
            /* Green */
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: left;
            text-decoration: none;
            display: inline-block;
            font-family: 'Kanit', sans-serif;
            font-size: 24px;
            margin: 0px 0px;
            cursor: pointer;

        }

        .button1 {
            background-color: white;
            color: #072140;
            border: 2px solid white;
            border-radius: 8px;
            width: 100%;
        }

        /* Set a style for all buttons */

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */

        .nextbutton {
            background-color: #072140;
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-family: 'Kanit', sans-serif;
            cursor: pointer;
            width: 100%;
            border-radius: 8px;
            border: 2px solid #072140;
        }

        .delbutton {
            background-color: white;
            border: none;
            color: #FF0000;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-family: 'Kanit', sans-serif;
            cursor: pointer;
            width: 100%;
            border-radius: 8px;
            border: 2px solid #FF0000;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 90%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */

        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */

        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        #outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;
        }

        .numberCircle {
            border-radius: 50%;
            behavior: url(PIE.htc);
            /* remove if you don't care about IE8 */
            width: 50px;
            height: 50px;
            padding: 5px;
            background: #fff;
            display: inline-block;
            border: 3px solid #bbbbbb;
            color: #bbbbbb;
            text-align: center;
            font: 23px kanit, sans-serif;
            font-weight: bold
        }
    </style>
<?php
    $username= $_GET["userid"];
  echo $username;
  //echo $_GET["action"];
    
    $host        = "host=ec2-54-83-48-188.compute-1.amazonaws.com";
    $port        = "port=5432";
    $dbname      = "dbname=ddagopqfb1uood";
    $credentials = "user=vsbryiqqffrttq password=7279cf8dae64f749857461db7933be4a2fb68bdc0ee6c037c158d82a755c3cf2";
    $db = pg_connect( "$host $port $dbname $credentials"  ) ;
    if(!$db) {
         echo "Error : Unable to open database\n";
    } else {
         //echo "Opened database successfully\n";
    }
    $sql ="SELECT * FROM user_info WHERE id='".$username."';";
    echo $sql;
    $ret = pg_query($db, $sql) ;
    if(!$ret) {
        echo pg_last_error($db) ;
    } else {
        $checking = 0;
        $n = 1;
        while($row = pg_fetch_row($ret) ){
            
            $checking = 1;
            echo $checking;
        }
        echo "if check=";
        echo $checking;
        if($checking == 0 ){
            echo "pass condition";
          header("Location: https://numpapick.herokuapp.com/user_info.php?userid=".$username);
         //echo "Records created successfully\n";
        }
        
    }
     
      pg_close($db) ;   
?>
        <div class="w3-container" id="demo">

            <h1 class="kanit" style="color: #072140; ">จัดการข้อมูล</h1>
            <br>
            <label for="fname" class="Taviraj" style="color: #808080; ">แก้ไขประวัติผู้ดูแล</label>

            <ul class="w3-ul">
                <li> </li>
                <form action="https://numpapick.herokuapp.com/user_information.php" method="get">
                    <input type="hidden" name="path" value="main">
                    <li>
                        <button class="button button1" style="color: #505050;" value="<?php echo $username;?>" name="userid">
                            <i class="fas fa-user" style="color: #0F4484;">
                            </i>&emsp;ข้อมูลส่วนตัว
                            <!--<i class="fas fa-chevron-right" style="float:right; color: #505050; "></i>-->
                        </button>
                    </li>
                    <a>
                </form>

            </ul>
            <br>
            <br>
            <br>
            <label for="fname" class="Taviraj" style="color: #808080;">อุปกรณ์</label>
            <ul class="w3-ul">
                <li> </li>

                <form action="https://numpapick.herokuapp.com/managedevice.php" method="get">
                    <input type="hidden" name="path" value="main">
                    <li>
                        <button class="button button1" style="color: #505050;" value="<?php echo $username;?>" name="userid">
                            <i class="fas fa-tasks" style="color: #0F4484;">
                            </i>&emsp;จัดการอุปกรณ์
                            <!--<i class="fas fa-chevron-right" style="float:right; color: #505050;"></i>-->
                        </button>
                    </li>

                    <!--<li>
                        <button class="button button1 " style="color: #505050;">
                            <i class="fas fa-chart-line" style="color: #0F4484; ">
                            </i>&emsp;ประวัติการใช้งาน
                            
                        </button>
                    </li>-->

                    <li></li>

            </ul>
            </a>
            </form>
            <br>
            <br>
            <br>
            <ul class="w3-ul">
                <li> </li>
                <!--<li> <button onclick="unsubscribe();window.close();" class="button button1" style = "color: #505050;">-->
                <li>
                    <button onclick="document.getElementById('id02').style.display='block';" class="button button1" style="color: #505050;">
                        <i class="far fa-trash-alt"></i>
                        <i class="fas fa-trash-alt" style="color: #0F4484;">
                        </i>
                        <a style="color: #505050; text-decoration: none !important;">&emsp;ยกเลิกบริการ </a>
                        <!--<i class="fas fa-chevron-right" style="float:right; color: #505050;"></i>-->
                    </button>
                </li>
                <li></li>

            </ul>
            <div id="id02" class="modal">

                <div class="modal-content animate">
                    <div class="container Taviraj">
                        <p>

                            <h1 class="kanit">ต้องการยกเลิกบริการ ? </h1>
                            <h2 class="Taviraj" style="text-align:center">หากลบจะไม่สามารถทำการกู้คืนข้อมูลได้</h2>
                            <button class="nextbutton " onclick="document.getElementById('id02').style.display='none'" style="font-size: 20px; width:48% ;">
                            ยกเลิก</button>
                            <button class="delbutton " onclick="unsubscribe()" style="font-size: 20px; width:48% ; ">ลบ</button>
                    </div>


                </div>
            </div>


            <input type="hidden" name="userid" id="userid" value="<?php echo $username;?>">
        </div>
        <script>
            // Get the modal
            function unsubscribe() {
                var userid = document.getElementById('userid').value;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // document.getElementById("uname_error").innerHTML = this.responseText;
                        var str = this.responseText.trim();
                        console.log(str);
                        //window.close(); 
                        window.location.replace("https://numpapick.herokuapp.com/main.php?userid=" + userid);


                    }
                };
                xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?Unsubscribe=success&userid=" +userid, true);
                xmlhttp.send();

            }

            function back() {
                var userid = document.getElementById('userid').value;
                window.location.replace("https://numpapick.herokuapp.com/add_device1.php?userid=" + userid);
            }
            var modal2 = document.getElementById('id02');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal2) {
                    modal2.style.display = "none";
                }
            }
        </script>
</body>

</html>
