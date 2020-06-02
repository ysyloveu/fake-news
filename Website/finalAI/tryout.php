<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">

<body>
    
    <nav class="w3-bar w3-black">
        <a href="index.php" class="w3-button w3-bar-item">Home</a>
        <a href="" class="w3-button w3-bar-item">Feedback</a>
    </nav>

    <section class="w3-container w3-center" style="max-width:600px">
        <h2 class="w3-wide">I Don't Know If Its Fake</h2>
        <p class="w3-opacity">We check yours facts<i></i></p>
    </section>

    <section class="w3-container w3-content w3-center" style="max-width:600px">

            <form autocomplete="off" action="TryoutP.php" method="get">
                <div> <p class="title">Facadetection</p>
                    <div>
                    <input type="text" name="url" placeholder="Article URL">
                    </div>
                    <div>
                    <input type="text" name="title" placeholder="Article Title">
                    </div>
                    <div>
                    <input type="text" name="content" placeholder="Article Content">
                    </div>
                    <button type="submit" > SUMIT </button>
                </div>
            </form>
    </section>
</body>
</html>