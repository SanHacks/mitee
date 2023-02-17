<?php
include_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


include_once 'connect.php';

$sql = "SELECT * FROM generatedPhotos ORDER BY timestamp DESC LIMIT 1 ";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$photos = $stmt->fetchAll();


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
  if (empty($_POST['prompt'])) {
        $error_message = 'Please enter a prompt';
        exit();
    }
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
    $prompt = preg_replace('/shirt/i', 't-shirt', $prompt);
    $prompt = preg_replace('/shirts/i', 't-shirt', $prompt);
    $prompt = preg_replace('/tee/i', 't-shirt', $prompt);
    $prompt = preg_replace('/tees/i', 't-shirt', $prompt);
    $prompt = preg_replace('/tshirt/i', 't-shirt', $prompt);
    $prompt = preg_replace('/t-shirts/i', 't-shirt', $prompt);

    $prompt = preg_replace('/t-shirt/i', 't-shirt', $prompt);
    $prompt = preg_replace('/tshirts/i', 't-shirt', $prompt);
    $prompt = preg_replace('/t shirt/i', 't-shirt', $prompt);
    $prompt = preg_replace('/t shirts/i', 't-shirt', $prompt);

    if (strpos($prompt, 'shirt') || (strpos($prompt, 't-shirt')) === false) {
        $prompt = $prompt . ' t-shirt';
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
<!--<div class="jumbotron">
    <div class="container text-center">
        <h1>AI TEES</h1>
        <p>Implementation of Dalle-e 2 , To allow customer to create custom design T-shirts Prints.
            And also to allow the customer to choose the size of the T-shirt.

            Courier service is also available to deliver the T-shirt to the customer.
        </p>
    </div>

</div>-->

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

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">Get You AI Made T-Shirt Now</h1>
            <form name="submit" method="POST" action="index.php">
                        <input type="text" class="form-control" id="prompt" name="prompt" placeholder="prompt">
                        <button style="width: 100%" type="submit"  name="submit" class="btn btn-primary">Design T-Shirt</button>
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
                echo "<img class='img-fluid' src='$photo'> ";
            }else{
            foreach ($photos as $Products) {
                $productImage = $Products['image_src'];
                $productPrompt = $Products['prompt'];

                echo "<img class='img-fluid' src='$productImage' > ";
            }
              }
            ?>
        </div>
    </div>
</div>
<!-- Products Cards Log 4x4 -->
<div class="container my-4">

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
    $rotate = imagerotate($source, 0, 0); // if want to rotate the image
    $image_name = time().'.jpg';
    $imageSave = imagejpeg($rotate,'generatedImages/'.$image_name,100);
    imagedestroy($source);
    $imageSave = 'generatedImages/'.$image_name;
    //TODO:PDO Insert image to database, insert, search term, imageSrc, timestamp
    $sql = "INSERT INTO imageSearches (image_src, prompt, timestamp) VALUES (:searchTerm, :imageSrc, :timestamp)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['searchTerm' => $prompt, 'imageSrc' => $imageSave, 'timestamp' => time()]);
    //TODO:Insert into generatedPhotos table: imageSrc, timestamp, search
    $sql = "INSERT INTO generatedPhotos (image_src, timestamp, prompt) VALUES (:imageSrc, :timestamp, :search)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['imageSrc' => $imageSave, 'timestamp' => time(), 'search' => $prompt]);

    $description = $prompt;
    //product ID is first 3 letters of prompt + 3 random numbers + 3 random letters
    $productID = substr($prompt, 0, 3);
    $productID .= rand(100, 999);
    $productID .= substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
    //SKU number is first 3 letters of prompt + 3 random numbers + 3 random letters
    $skuNumber = substr($prompt, 0, 3);
    $skuNumber .= rand(100, 999);
    $skuNumber .= substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
    //Barcode number is first 3 letters of prompt + 3 random numbers + 3 random letters
    $barcodeNumber = substr($prompt, 0, 3);
    $barcodeNumber .= rand(100, 999);
    $barcodeNumber .= substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
    //QR code number is first 3 letters of prompt + 3 random numbers + 3 random letters
    $qrCodeNumber = substr($prompt, 0, 3);
    $qrCodeNumber .= rand(100, 999);
    $qrCodeNumber .= substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
    //Insert into products table
    $sql = "INSERT INTO products (product_id, sku, barcode_number, qr_code_number, image_src, description, price, shipping, handling, profit_margin, taxes, total_price, timestamp, prompt) VALUES (:productID, :skuNumber, :barcodeNumber, :qrCodeNumber, :imageSrc, :description, :price, :shipping, :handling, :profitMargin, :taxes, :totalPrice, :timestamp, :prompt)";
    $stmt = $pdo->prepare($sql);
    $imagePrice = 70;
    $imageShipping = 7;
    $imageHandling = 7;
    $imageProfitMargin = 7;
    $imageTaxes = 7;
    $imageTotalPrice = $imagePrice + $imageShipping + $imageHandling + $imageProfitMargin + $imageTaxes;

    $stmt->execute(['productID' => $productID, 'skuNumber' => $skuNumber, 'barcodeNumber' => $barcodeNumber, 'qrCodeNumber' => $qrCodeNumber, 'imageSrc' => $imageSave, 'description' => $description, 'price' => $imagePrice, 'shipping' => $imageShipping, 'handling' => $imageHandling, 'profitMargin' => $imageProfitMargin, 'taxes' => $imageTaxes, 'totalPrice' => $imageTotalPrice, 'timestamp' => time(), 'prompt' => $prompt]);
}
?>
</div>
</br>
</br>
</br>
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