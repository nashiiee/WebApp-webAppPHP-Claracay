<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web App PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="div-title">
        <a href="#"><h1 class="title">Vinland Saga ⚔️</h1></a>
    </div>
    <div class="php-container">
        <div class="php-main-content">
            <?php 
                echo "Worlds! \n";
                $protagonistName = "Thorfinn";
                $antagonistName = 'His self';
                $doesHeHaveEnemy = false;
                $ageProtagonist = 18;
                $Home = "Iceland";
                $father = "Thors";
                echo "Protagonist name is $protagonistName.<br><br>";
                echo "Protagonist Age is " . $ageProtagonist . ".<br><br>";
                echo "Son of $father the true warrior <br></br>";
                var_dump($protagonistName);
                echo "<br><br>We have no enemy but";
                echo "<br><br>His true enemy is $antagonistName.<br><br>";
                echo "the one that he can called home $Home<br><br>";
                $enemy = $doesHeHaveEnemy ? "He has enemy" : "We have no enemies.";
                echo $enemy;
                
            ?>
        <div>
    </div>
</body>
</html>