<?php
    $host        = "host=ec2-54-83-48-188.compute-1.amazonaws.com";
      $port        = "port=5432";
      $dbname      = "dbname=ddagopqfb1uood";
      $credentials = "user=vsbryiqqffrttq password=7279cf8dae64f749857461db7933be4a2fb68bdc0ee6c037c158d82a755c3cf2";

      $db = pg_connect( "$host $port $dbname $credentials"  ) ;
      if(!$db) {
         echo "Error : Unable to open database\n";
      } else {
         echo "Opened database successfully\n";
      }
      $sql ="SELECT * FROM userline WHERE id='2';";


    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         while($row = pg_fetch_row($ret) ){
         echo "ESP name = " . $row[3] . "\n";
                }
         //echo "Records created successfully\n";
      }

     

      $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         echo "Records created successfully\n";
      }
      pg_close($db) ;
?>
