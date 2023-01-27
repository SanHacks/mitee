<?php
if(isset($_POST['submit'])){
$client = new Client();
$headers = [
    'Content-Type' => 'application/json',
    'Authorization' => 'Bearer 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'
];

//Get prompt from post request and filter all unwanted characters and limit to 100 characters and always append a space at the end and T-Shirt if words shirt is not post request
if(isset($_POST['prompt'])){
    $prompt = $_POST['prompt'];
    $prompt = preg_replace('/[^A-Za-z0-9\-]/', ' ', $prompt);
    $prompt = substr($prompt, 0, 100);
    if(!preg_match('/shirt/', $prompt)){
        $prompt = $prompt . ' T-Shirt';
    }
    $prompt = $prompt . ' ';
}
else{
    $prompt = 'T-Shirt ';
}

//Get n from post request and filter all unwanted characters and limit to 100 characters
if(isset($_POST['n'])){
    $n = $_POST['n'];
    $n = preg_replace('/[^0-9]/', '', $n);
    $n = substr($n, 0, 100);
}
else{
    $n = 1;
}

///Build body of request
$body = '{
    "prompt": "' . $prompt . '",
    "n": ' . $n . ',
    "size": "1024x1024"
}';
$request = new Request('POST', 'https://api.openai.com/v1/images/generations', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
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

    <form name="submit" method="POST" action="index.php">
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <!-- 500px width and 500px height -->
                <button style="width: 100%" type="submit"  name="submit" class="btn btn-primary">Generate Image</button>
            </div>
        </div>
    </form>    <!--- Make middle screen input to give prompt from user to AI to generate image --->
</div>

</body>
</HTML>