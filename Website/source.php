
<!-- Codes for displaying Sources -->

<?php

        // echo"<p style='color:red;'>Sources</p>";

        // Creating an Array to store sources
        $sources = array();

        //Locating the source 

        //locating <div class="div BNeawe UPmit AP7Wnd"> in HTML
        foreach($html->find('div.BNeawe.UPmit.AP7Wnd') as $sourceDiv)
        {  
            // Store source name as a var called author
            $author = strval($sourceDiv->plaintext);
            // Goes through if else statements to filter out non-local news sources
            if ($author == "CNA" or $author == "The Straits Times" 
            or $author == "The Business Times" or $author == "TODAYonline"
            or $author == "The New Paper" or $author == "Mothership.sg")
                {
                    // store variable into an array
                    $sources [] = $author; 
                }
        }


?>