
<!-- Codes for displaying Titles -->

<?php
        
        // echo"<p style='color:red;'>Titles</p>";

        // Creating an Array to store titles
        $titles = array();

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
                        // Locating <div> tag in <a>
                        foreach($u->find('div.BNeawe.vvjwJb.AP7Wnd') as $titleDiv)
                        {
                            // store titles into array
                            $titles [] = strval($titleDiv->plaintext);
                        }
                    }
            }
        }
        
    ?>