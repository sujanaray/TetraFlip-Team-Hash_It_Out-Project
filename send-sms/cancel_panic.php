<!DOCTYPE html>
<html>
  <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="buttons.css">

    <meta charset="utf-8">
    <title>SOS Status</title>
  </head>
  <body>
      <center>
    <h1>Thank you for letting us know- we are notified now that everything is okay </h1>
    <h2> <a href="index.html">Back to Dashboard</a> </h2>
      </center>
  </body>
</html>


<?php

    require_once 'C:\Users\samitray\vendor\autoload.php';
    use Twilio\Rest\Client;

    $AccountSid = "AC7395b468f6f2f538d11a0dadac664863";
    $AuthToken = "e62fc5dacdbacdd95d26302eb611757e";

    $client = new Client($AccountSid, $AuthToken);

    $people = array(
      "+918910435979" => "Naviyaa",
      "+905022222222" => "Mike",
      "+905111111111" => "John",
      "+494747474774" => "David"

    );

    $date = date("Y/m/d");

    foreach ($people as $number => $name) {


        $sms = $client->account->messages->create(

            $number,

            array(
                
                'from' => "+918910438837",

                'body' => "Hey $name, Everyting is OK now here, You DO NOT NEED to COME."



            )
        );
        echo "SOS Sent message to $name \n";
    }
