<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  

    <form action="index.php" method="post">
        <label>Enter a word : </label>
        <input type="text" name="word">
        <input type="submit" value="Calculate">
    </form>

</body>
</html>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $words = $_POST['word'];
        $allword = [];



        if ($words == "") {

        }
        else {
            
            for ($i=1; $i <= 3; $i++) { 

                // echo "<br> {$i} x {$number} = " . ($number * $i);
                array_push($allword, $words);
            }

        }
        
        foreach ($allword as $wordy) {
            echo $wordy . "<br>";
        }
    }
    

?>