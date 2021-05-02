<!DOCTYPE html>
<html>
  <head>
    <!-- Lets get bootstrap CSS for nice styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- we need Bugger BUTTON to be displayed, so lets include our custom button css style-->
    <link rel="stylesheet" href="buttons.css">

    <meta charset="utf-8">
    <title>SOS Status</title>
  </head>
  <body>
    <center>
    <h1>If your are able to please Call 911 immediately!! </h1>
    

    <div class="container">
<center>


              <hr>

              <a href="cancel_panic.php" class="btn btn-success btn-lg" role="button">Everything is OK now!</a>


</center>

</div>
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
      "+905022222222" => "Mike Hassan",
      "+905111111111" => "John Doe",
      "+494747474774" => "David - CEO"

    );



    $date = date("Y/m/d");

    foreach ($people as $number => $name) {


        $sms = $client->account->messages->create(


            $number,

            array(
               
                'from' => "+918910438837",

                'body' => "Hey $name,There is an emergency now as I am in danger,COME NOW URGENTLY !!!. Sent on $date ."



            )
        );

        echo "SOS Sent message to $name successylly \n";
        echo "<br>";

    }

    ?>
