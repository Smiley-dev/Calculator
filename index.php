<?php
require_once 'includes/config.php';
require_once 'classes/Calculator.class.php';
require_once 'classes/Database.class.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculator</title>
    <script src="js/calculator.js"></script>
</head>
<body>


<?php

//Check if GET request is sent
if(isset($_GET['factors'])){
    $cal = new Calculator();
    $cal->addToDB();
    echo "<small>Factor 1 = {$cal->getData()[0]} &emsp; Factor 2 = {$cal->getData()[1]} &emsp; Operation = {$cal->getData()[2]} (multiply) &emsp; Result = {$cal->getData()[3]}</small><br>
<h3>Expresion: {$cal->getData()[0]} x {$cal->getData()[1]}</h3>
<h2>Result: {$cal->getData()[3]}</h2>";
} else { ?>
    <h1>Calculator</h1>
    <!-- Generating Table -->
    <div class="container">
    <table>
        <tr>
            <th>Factors</th>
            <?php for($i=1; $i<11; $i++): ?>
                <th><?php echo $i ?></th>
            <?php endfor; ?>
        </tr>

        <?php for($i=1; $i<11; $i++): ?>
            <tr>
                <th><?php echo $i; ?></th>

                <?php for($j=1; $j<11; $j++): ?>
                    <td onclick="sendRequest(this.innerHTML)"><?php echo $i . ' x ' . $j; ?></td>
                <?php endfor; ?>

            </tr>
        <?php endfor; ?>
    </table>
    </div>
    <div class="container" id="expresion">

    </div>
<?php } ?>



</body>
</html>
