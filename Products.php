<?php


//display 4 images in a card grid
foreach ($photos as $Products) {
    $productImage = $Products['image_src'];
    $productPrompt = $Products['prompt'];
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<div class='input-group'>";
    echo "<img src='$productImage' class='img-responsive' style='width:50%' alt='Image'>";
    //description of the product
    echo "<p>$productPrompt</p>";
    echo "<div class='input-group-btn'>";
    echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action <span class='caret'></span></button>";
    echo "<ul class='dropdown-menu dropdown-menu-right'>";
    echo "<li><a href='#'>Add to Cart</a></li>";
    echo "<li><a href='#'>Add to Wishlist</a></li>";
    echo "<li><a href='#'>Add to Compare</a></li>";
    echo "<li role='separator' class='divider'></li>";
    echo "<li><a href='#'>View Details</a></li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


}
