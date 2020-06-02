<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php  $query = $_GET['query']; ?>

<?php
        
        include('simple_html_dom.php');

        $query = $_GET['query'];
        $query=sprintf('"%s"', $query);

        $finalQuery = str_replace(" ", "+", $query);
        
        $html = file_get_html("https://www.google.com/search?source=lnms&tbm=nws&q=" . strval($finalQuery));
    
    ?>
    
    <?php include('title.php') ?>
    <?php include('source.php'); ?>
    <?php include('url.php'); ?>
    <?php 
         #$titles
         #$sources
         #$finalUrlArray
         #$query
         $total_number = count($urlArray);
         $number = 0;
         while ($number < $total_number){
            $command1= 'python scraperfunc.py '.$urlArray[$number];
            escapeshellcmd($command1);
            exec($command1,$output);
            $output=implode("",$output);
            $output=str_replace('"', "", $output);
            $output=str_replace("'", "", $output);
            $output=sprintf('"%s"', $output);  
            $output = (strlen($output) > 8000) ? substr($output, 0, 8000) . '...' : $output;
            print("strlen:".strlen($output));
            echo "<br>";
            escapeshellarg($output);
            $command2='python calculate.py '.$query.' '.$output;    
            exec($command2,$output2);
            print("strlen:".strlen($output));
            print ("Number : ".$number);
            echo "<br>";
            print("URL : ".$urlArray[$number]); 
            echo "<br>";
            print("this is content ".$output);
            print("Query : ".$query);
            echo "<br>";
            print("Titles : ".$titles[$number]);
            echo "<br>";
            echo"Match Percentage : ".$output2[$number];
            echo "<br>";
            echo "<br>";
            $number = $number + 1;
         }