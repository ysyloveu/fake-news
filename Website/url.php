
<!-- Codes for displaying URLs -->

<?php
        
        // echo"<p style='color:red;'>Urls</p>";

        // Creating an Array to store URLs
        $urls = array();

        //Locating the href (URL) 

        // Locating <div class='kCrYT'> in HTML
        foreach($html->find('div.kCrYT') as $urlDiv)
        {
            // Locating <a> tag in <div>
            foreach($urlDiv->find('a') as $u)
            {
                
                // Storing dirty link as a var called Temp
                $temp = $u->attr['href'];
                // Goes through if else statements to filter out non-local news sources
                if ( (strpos($temp, 'www.straitstimes.com') !== false) or (strpos($temp, 'www.channelnewsasia.com') !== false) 
                or (strpos($temp, 'www.businesstimes.com.sg') !== false) or (strpos($temp, 'www.todayonline.com/singapore') !== false)
                or (strpos($temp, 'cnaluxury.channelnewsasia.com') !== false)  or (strpos($temp, 'www.tnp.sg') !== false)
                or (strpos($temp, 'mothership.sg') !== false)) 
                    {
                        // Process of removing unwanted characters in var
                        $cut3 = substr($temp, 7, -103);
                        // Store variable into an array
                        $urls [] = $cut3;
                    }
            }
        }

        // Only displayed odd no. index links to prevent duplications
        $finalUrlArray = array_filter($urls, function ($input) {return $input & 1;}, ARRAY_FILTER_USE_KEY);
        $urlArray = array_values($finalUrlArray)
?>