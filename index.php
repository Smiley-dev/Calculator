<?php
require_once 'includes/config.php';
require_once 'classes/Calculator.class.php';
require_once 'classes/Database.class.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculator</title>
    <script src="js/calculator.js"></script>
</head>

<body>

    <?php
if(isset($_GET['factors'])){
    
    //Instatiate Calculator class
   $cal = new Calculator();
    
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

    <!-- Results -->
    <div class="container" id="results">

    </div>

    <?php } ?>

</body>

</html>
