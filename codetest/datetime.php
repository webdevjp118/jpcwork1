<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
    var date  = new Date();
    console.log(date);
    var offset = date.getTimezoneOffset();
    console.log(offset);
</script>
<?php
    $date_utc = gmdate("Y-m-d H:i:s");
    echo $date_utc."-utc<BR>";
    echo date( "Y-m-d H:i:s", strtotime( "2009-01-31" ) ); // PHP:  2009-03-03
    echo "<br>";
    echo date( "Y-m-d H:i:s", strtotime( "2009-01-31 +300 minute" ) ); // PHP:  2009-03-03
    echo "<br>";
    echo date( "Y-m-d", strtotime( "2009-01-31 +2 month" ) ); // PHP:  2009-03-31
    echo "<br>";
    echo date( "Y-m-d H:i:s", strtotime( "2009-01-31 +480 minute" ) ); // PHP:  2009-03-03
    echo "<br>";
    $date = date( "Y-m-d H:i:s", strtotime( "2009-01-31" ) ); // PHP:  2009-03-03
    echo date( "Y-m-d H:i:s", strtotime( $date.' +100 minute' ) ); // PHP:  2009-03-03
    echo "<br>";
    echo date( "Y-m-d H:i:s", strtotime( date("Y-m-d H:i:s").' +300 minute' ) ); // PHP:  2009-03-03
    echo "<br>";
    echo date( "Y-m-d H:i:s");
    echo "<br>";
    echo "<br>";
    $time_offset = 600;
    $user_date = date( "Y-m-d H:i:s", strtotime( date("Y-m-d H:i:s").' +'.$time_offset.' minute' ) );
    $date = date('F d, Y', strtotime($user_date));
    $time = date('h:i A', strtotime($user_date));
    echo "<br>";
    echo $date;
    echo "<br>";
    echo $time;
?>
</body>
</html>