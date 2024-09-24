<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function displayOrderSummary() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            echo "<h2>Order Summary</h2>";

            $coffee_prices = [
                "espresso" => 500,
                "latte" => 600,
                "cappucino" => 650,
                "kapengbarako" => 719,
                "mocha" => 750,
                "americano" => 750,
            ];

            $size_prices = [
                "small" => 0.00,
                "medium" => 50.0,
                "large" => 80.0,
            ];

            $extras_prices = [
                "sugar" => 5.00,
                "cream" => 10.00
            ];

            $coffee_type = $_POST["coffee"];
            $size = $_POST["size"];
            $instructions = $_POST["instructions"];
            $name = $_POST["name"];

            if(isset($_POST["extras"])) {
                $extras = $_POST["extras"];
            } else {
                $extras = [];
            }

            // $total_price = $coffee_prices[$coffee_type] + $size_prices[$size];

            // foreach($extras as $extra) {
            //     $total_price = $total_price + $extras_prices[$extra];
            // }

            $total_price = calculatePrice($coffee_prices, $size_prices, $extras_prices, $coffee_type, $size, $extras);

            echo $name;
            echo "<br>";
            echo $instructions;
            echo "<br>";
            echo $total_price;

            $receiptContent = generateReceipt($name, $coffee_type, $size, $total_price, $instructions);
            saveReceipt($receiptContent);

            displayJoke($coffee_type, $total_price);

            
        }
    }
      

    function calculatePrice($coffee_prices, $size_prices, $extras_prices, $coffee_type, $size, $extras) {
        $total_price = $coffee_prices[$coffee_type] + $size_prices[$size];

            foreach($extras as $extra) {
                $total_price = $total_price + $extras_prices[$extra];
            }

            return $total_price;
    }

    function generateReceipt($name, $coffee_type, $size, $total_price, $instructions) {
        $receiptContent = "Order Summary\n";
        $receiptContent .= "---------------------\n";

        $receiptContent .= "Name" . $name . "\n";
        $receiptContent .= "Coffee Type: " . $coffee_type . "\n";
        $receiptContent .= "Size: " . $size . "\n";
        $receiptContent .= "Total Price: " . $total_price . "\n";
        $receiptContent .= "instructions: " . $instructions . "\n";
        $receiptContent .= "Thank you for ordering!";

        return $receiptContent;
    }

    function saveReceipt($receiptContent) {
        $file = fopen("Order Summary.txt", "w") or die("Unable to Open text file");
        fwrite($file, $receiptContent);

        fclose($file);
        echo "<br>";
        echo "Receipt saved.";
    }

    function displayJoke($coffee_type, $total_price) {
        if ($coffee_type !== "espresso") {
            echo "<br>";
            echo "Hey, ", htmlspecialchars($_POST["name"]) . "!";
            echo "<p>Here's a joke for you: Why did the coffee file a police report? It got mugged!</p>";
        } 

        if ($total_price > 450 && $total_price < 700) {
            echo "<p>Password for the CR: coffee 123</p>";
        } elseif ($total_price >= 900) {
            echo "<p>Password for Wi-Fi: mocha456";
        }
    }

    displayOrderSummary();
    ?>
</body>
</html>