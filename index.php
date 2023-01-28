<?php
include_once 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

if (isset($_POST['prompt'])) {
    $prompt = $_POST['prompt'];
} else {
    $prompt = 'A Cyberpunk T-Shirt';
}
if (isset($_POST['n'])) {
    $n = $_POST['n'];
} else {
    $n = 1;
}

if (isset($_POST['size'])) {
    $size = $_POST['size'];
} else {
   // $size = '1024x1024';
    $size = '512x512';
}

if(isset($_POST['submit'])) {
    $client = new Client();
    $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer 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'
    ];

//fill dynamic prompt with user input
    $prompt = $_POST['prompt'];
    //strip html tags
    $prompt = strip_tags($prompt);
    //strip slashes
    $prompt = stripslashes($prompt);
    //Check if prompt is contains word T-Shirt or Shirt if not add word T-Shirt   //"size": "1024x1024"
    if (str_contains($prompt, 'T-Shirt')) {
    } elseif (str_contains($prompt, 'Shirt')) {
    } else {
        $prompt = $prompt . ' T-Shirt';
    }
    $body = '{
  "prompt": "'.$prompt.'",
  "n": 1,
  "size": "512x512"

}';
    $request = new Request('POST', 'https://api.openai.com/v1/images/generations', $headers, $body);
    $res = $client->sendAsync($request)->wait();

    $image = $res->getBody();
//decode the json response
    $image = json_decode($image, true);

}


?>
<HTML>
<HEAD>
    <title>AI TEES</title>
    <!--- Use bootstrap for styling, make search page with 3 tabs, one for each search type, use one search bar for all 3 tabs --->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }

        .card {
            margin-top: 20px;
            margin-bottom: 20px;
            -webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
            box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
            border-radius: 2px;
            background-color: #fff;
            transition: all .3s ease-in-out;
            border: 1px solid #e5e5e5;
            margin-left: 20px;
            margin-right: 20px;
        }

        .card-body {
            padding: 15px;
        }

        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }

        .input-group-btn {
            position: relative;
            font-size: 0;
            white-space: nowrap;
            vertical-align: middle;
            display: table-cell;
        }

        .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
            z-index: 2;
            margin-left: -1px;
        }

        .input-group-btn .btn {
            position: relative;
            z-index: 2;
            float: left;
        }


        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .btn-default:hover {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }


        .btn-default:focus, .btn-default.focus {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
            outline: 0;
            -webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,.125), 0 0 0 3px rgba(82,168,236,.5);
            box-shadow: inset 0 3px 5px rgba(0,0,0,.125), 0 0 0 3px rgba(82,168,236,.5);
        }

        .btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
            -webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
            box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
        }
    </style>
</HEAD>

<body>
<div class="topnav">
    <a class="active" href="#home">AI TEES</a>
    <a href="#news">Help</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
</div>

<!-- Instructions for the user jumbotron -->
<div class="jumbotron">
    <div class="container text-center">
        <h1>AI TEES</h1>
        <p>Implementation of Dalle-e 2 , To allow customer to create custom design T-shirts Prints.
            And also to allow the customer to choose the size of the T-shirt.

            Courier service is also available to deliver the T-shirt to the customer.
        </p>
    </div>
</div>

<!-- Input form handled with php and javascript  to send the input to the backend , prepare for dynamic image output and lead to check out page -->
<br>
<!---



AI Power Printed T-Shirts Store
## TODO:: NOW
Use AI to prompt user for image to put on t shirt
1. [ ] Home page
2. [ ] Show Case
3. [ ] Design
4. [ ] Turtorial
5. [ ] Sign Up to purchase
6. [ ] Image prompt
7. [ ] Choose Size
8. [ ] Color
9. [ ] Variant
10. [ ] Position
11. [ ] Check out
12. [ ] Track Order
13. [ ] Payment
14. [ ] Delivery
15. [ ] Contact Us
16. [ ] About Us
17. [ ] FAQ
18. [ ] Terms and Conditions
19. [ ] Privacy Policy
20. [ ] Refund Policy
21. [ ] Return Policy
22. [ ] Shipping Policy
23. [ ] Cancellation Policy
24. [ ] Disclaimer
25. [ ] Sitemap
26. [ ] Blog
27. [ ] News
28. [ ] Careers
29. [ ] Press
30. [ ] Affiliate Program
31. [ ] Become a Seller
32. [ ] Become a Partner
33. [ ] Become a Vendor
34. [ ] Become a Franchise
-->
<!--- Make middle screen input to give prompt from user to AI to generate image --->
<div class="container">
</div>

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">Get You AI Made T-Shirt Now</h1>
            <form name="submit" method="POST" action="index.php">
                        <input type="text" class="form-control" id="prompt" name="prompt" placeholder="prompt">
                        <button style="width: 100%" type="submit"  name="submit" class="btn btn-primary">Generate T-Shirt</button>
            </form>
        <!-- Build Checkout Section only show if image is generated -->
        <?php
        //show Purchase button only if image is generated
        if (isset($photo)){
            echo "<a href='checkout.php' class='btn btn-primary'>Purchase</a>";
        }
        ?>

        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
            <?php
              if(!empty( $image['data'][0]['url'])){
                $photo =  $image['data'][0]['url'];
                echo "<img class='rounded-lg-3' src='$photo' alt='' width='720'> ";
            }
            ?>
        </div>
    </div>
</div>

</div>


<?php

//save image to local storage
if (isset($photo)){
    $image = file_get_contents($photo);
    $image = base64_encode($image);
    $image = 'data:image/jpeg;base64,'.$image;
    $image = str_replace('data:image/jpeg;base64,','',$image);
    $image = str_replace(' ','+',$image);
    $imageData = base64_decode($image);
    $source = imagecreatefromstring($imageData);
    $rotate = imagerotate($source, 90, 0); // if want to rotate the image
    $image_name = time().'.jpg';
    $imageSave = imagejpeg($rotate,'generatedImages/'.$image_name,100);
    imagedestroy($source);
    /*    $sql = "INSERT INTO images (image_name, image) VALUES ('$image_name', '$image')";
        mysqli_query($conn, $sql);

        //display image in the div card above
        //Get other images from database and display in slider below
        $sql = "SELECT * FROM images";
        $result = mysqli_query($conn, $sql);
        $images = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //Free result from memory
        mysqli_free_result($result);

        //Close connection
        mysqli_close($conn);*/

    //print_r($images);
    //print_r($images[0]['image_name']);
    //print_r($images[0]['image']);

    //display images in slider below
//    echo "<div class='container'>
//    <div class='row'>
//        <div class='col-md-12'>
//            <div id='myCarousel' class='carousel slide' data-ride='carousel'>
//                <!-- Indicators -->
//                <ol class='carousel-indicators'>
//                    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
//                    <li data-target='#myCarousel' data-slide-to='1'></li>
//                    <li data-target='#myCarousel' data-slide-to='2'></li>
//                    <li data-target='#myCarousel' data-slide-to='3'></li>
//                    <li data-target='#myCarousel' data-slide-to='4'></li>
//                </ol>
//
//                <!-- Wrapper for slides -->
//                <div class='carousel-inner'>
//                    <div class='item active'>
//                        <img src='images/".$images[0]['image_name']."' alt='Los Angeles' style='width:100%;'>
//                    </div>
//
//                    <div class='item'>
//                        <img src='images/".$images[1]['image_name']."' alt='Chicago' style='width:100%;'>
//                    </div>
//
//                    <div class='item'>
//                        <img src='images/".$images[2]['image_name']."' alt='New york' style='width:100%;'>
//                    </div>
//
//                    <div class='item'>
//                        <img src='images/".$images[3]['image_name']."' alt='New york' style='width:100%;'>
//                    </div>
//
//                    <div class='item'>
//                        <img src='images/".$images[4]['image_name']."' alt='New york' style='width:100%;'>
//                    </div>
//                </div>
//
//                <!-- Left and right controls -->
//                <a class='left carousel-control' href='#myCarousel' data-slide='prev'>
//                    <span class='glyphicon glyphicon-chevron-left'></span>
//                    <span class='sr-only'>Previous</span>
//                </a>
//                <a class='right carousel-control' href='#myCarousel' data-slide='next'>
//                    <span class='glyphicon glyphicon-chevron-right'></span>
//                    <span class='sr-only'>Next</span>
//                </a>
//            </div>
//        </div>
//    </div>
//</div>";

}
?>
<!--<div class="row">
    <div class="col-sm-4">
        <h3>Design</h3>
        <p>Design your own T-shirt with our AI powered T-shirt design tool.</p>
        <p>Choose from a variety of designs and colors to create your own unique T-shirt.</p>
    </div>
    <div class="col-sm-4">
        <h3>Print</h3>
        <p>Print your T-shirt with our AI powered T-shirt printing tool.</p>
        <p>Choose from a variety of designs and colors to create your own unique T-shirt.</p>
    </div>
    <div class="col-sm-4">
        <h3>Wear</h3>
        <p>Wear your T-shirt with our AI powered T-shirt printing tool.</p>
        <p>Choose from a variety of designs and colors to create your own unique T-shirt.</p>
    </div>
</div>-->
</body>
</HTML>