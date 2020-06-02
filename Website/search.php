

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Result Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="index.css" />
</head>

<body>

<?php  $query = $_GET['query']; ?>

<p style="text-align:center;font-size:20px;">Search Results for: <strong style='color:#8BE931;'><?php echo $query; ?></strong></P>

 <?php
        
        include('simple_html_dom.php');

        $query = $_GET['query'];

        $finalQuery = str_replace(" ", "+", $query);

        $html = file_get_html("https://www.google.com/search?source=lnms&tbm=nws&q=" . strval($finalQuery));
    
    ?>
    
    <?php include('title.php') ?>
    <?php include('source.php'); ?>
    <?php include('url.php'); ?>

    <?php 

        $size = count($titles);

        $output = "<table>";
        $output .= "<tr><th>No.</th><th>Title</th><th>Source</th><th>Link</th><th>More info</th></tr>";

        for($i=0; $i<$size; $i++) {
            $output .= "<tr>";
            $output .= "<td> News Article ".($i+1).".</td>";
            $output .= "<td>".$titles[$i]."</td>";
            $output .= "<td>".$sources[$i]."</td>";
            $output .= "<td>".array_values($finalUrlArray)[$i]."</td>";
            $output .= "<td><a target='_blank' href='".array_values($finalUrlArray)[$i]."'>Click here</a></td>";
            $output .= "</tr>";
        }

        $output .= "</table>";

        echo $output;
    
    ?>

   
    <?php 
        session_start();
        $_SESSION['titles'] = $titles;
        $_SESSION['sources'] = $sources;
        $_SESSION['urls'] = $finalUrlArray ;
    ?>


    <br><br>
    
</body>
</html>

