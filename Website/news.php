<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1 ">
    
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel="stylesheet" type="text/css" href="nav.css" />
    
</head>

<style>



.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
 
}

.newsButton {
  background-color: transparent; 
  color: white; 
  border: 2px solid white;
  border-radius: 10px;
  padding: 5px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  transition-duration: 0.4s;
  cursor: pointer;
  width:150px;
  margin-bottom:30px;
}

.newsButton:hover {
  background-color: #28C8F9;
  color: white;
}}

</style>

<body style=" background: #1D1D1D; color:white; font-family:'Oswald', sans-serif;">

 <?php
        $url = 'http://newsapi.org/v2/top-headlines?country=sg&apiKey=00ddb31a9d3d484f9e9ba691d2eddeff';
        $response = file_get_contents($url);
        $NewsData = json_decode($response);
?>

                <div class="topnav">
                    <a href="index.php">HOME</a>
                    <a style="float:right" href="finalAI/indexphp">AI prototype</a>
                    <a style="float:right" href="/ST/GoogleScrapeSearch/feedback/">FEEDBACK</a>
                    <a style="float:right" href="news.php">NEWS</a>
                    <a style="float:right" href="about.php">ABOUT</a>
                </div>
    
<br><br>
<h1 style="text-align:center;" >Google NEWS | <strong style="color:#34DEF7;">Singapore</strong> </h1>
<br><br>   

<div style="width:80%; margin: 0 auto;">
    <div>

<?php foreach($NewsData->articles as $News) { ?>

        <table style="float:left;width:345px; margin:30px;">
            <tr style="border: 2px solid #28C8F9; font-weight:bold;color:#28C8F9;"><td style="text-align:center;">Source:
                <?php  
                    if ($News->author == "") {
                        echo "NIL";
                    }else{
                        echo $News->author ;
                    }
                ?>
            </td></tr>
            <tr style="border: 2px solid #28C8F9;height:200px; "><td style="padding:15px;">
            <b>
                <?php echo $News->title; ?>
            </b>
            <br><br><br>
            </td></tr>
            <tr style="border: 2px solid #1D1D1D;"><td style="text-align:center;"><br><a
            
            href="<?php echo $News->url ?>"
            
            class="newsButton">More info</a></td><tr>
        </table>

      <?php
            }
        ?>                

    <br>
    <br>
    </div>   
</div>

</body>
</html>

