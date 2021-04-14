<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css" /> 
    <title>App NewsSystem PHP 7 Custom</title>
    <style> 
    </style>
</head>
<body>
    <div>
        <?php include("haut.php"); ?>
        <!-- <header></header> -->
        <nav>
            <a href="index.php?section=0"> <p>Actualités </p></a> <!-- ? = > query string -->
            <a href="index.php?section=1"><p> Thèmes </p> </a>
            <a href="index.php?section=2"> <p>Mots-Clés </p> </a>
            <a href="index.php?section=3"> <p> Upload </p></a>
            <a href="inscription.php"><p> Login </p></a>
         </nav>
         <?php include("section.php"); ?>
         <?php include("footer.php"); ?>
        
    </div>

</body>
</html>