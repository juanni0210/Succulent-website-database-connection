<?php
// Create the database query:

$q = "SELECT prod_image, prod_code, prod_name, prod_price
      FROM products";

// Performing query against the database:
$resource = $pdo->query($q);

// Have an empty array ready to be popuklated with record-sets from
// the $resource:
$products = [];

// Loop throught the $resource and extract record sets:
foreach ($resource as $row) {
    array_push($products, $row);
}



// Print the array data:
function collectArray($productType) {
    global $pdo;
    global $products;
    
    $collect = [];
    
    if (sizeof($products) > 0) {
        foreach ($products as $product) {
            if ($productType == $product["prod_code"]) {
                array_push($collect, $product); 
            }
        }
        
        if (!empty($collect)) {
            return $collect;
        } else {
            return $products;
        }
    }
    $pdo = NULL;
}


// PRINT HTML:
// Create function printHTML.
function printHTML() {
   $html = NULL;

    if (isset($_GET["type"])) {
        $collectData = collectArray($_GET["type"]);
        for ($i = 0; $i < sizeof($collectData); $i++ ) {
            if ($_GET["type"] === $collectData[$i]["prod_code"]) {
                $html .= "<div class='col col-12 col-md-6 col-lg-4'>
                              <img class='product-box' src='{$collectData[$i]["prod_image"]}' alt='{$collectData[$i]["prod_name"]}'>
                              <h5 class='text-centered'>" . $collectData[$i]["prod_name"] . "</h5>
                              <p class='text-centered'>" ."$". $collectData[$i]["prod_price"] . "</p>
                          </div>";
            }
        } 
    }  else {
        global $products;
        for ($i = 0; $i < sizeof($products); $i++ ) {
                $html .= "<div class='col col-12 col-md-6 col-lg-4'>
                              <img class='product-box' src='{$products[$i]["prod_image"]}' alt='{$products[$i]["prod_name"]}'>
                              <h5 class='text-centered'>" . $products[$i]["prod_name"] . "</h5>
                              <p class='text-centered'>" ."$". $products[$i]["prod_price"] . "</p>
                          </div>";
        }
    }
    print $html;
}




?>