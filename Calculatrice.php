<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $operateur = $_POST['operateur'];
    $resultat = 0;

    if ($operateur == "+") {
        $resultat = $nombre1 + $nombre2;
    } elseif ($operateur == "-") {
        $resultat = $nombre1 - $nombre2;
    } elseif ($operateur == "*") {
        $resultat = $nombre1 * $nombre2;
    } elseif ($operateur == "/") {
        if ($nombre2 != 0) {
            $resultat = $nombre1 / $nombre2;
        } else {
            $resultat = "Erreur : Division par zéro.";
        }
    } elseif ($operateur == "^") { 
        $resultat = pow($nombre1, $nombre2);
    } else {
        $resultat = "Erreur : Opérateur non reconnu.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #2b4157, #4b749f);
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: white; 
        }
        .calculatrice {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .operateurs {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .operateurs label {
            flex: 1 0 30%;
            margin: 5px;
            text-align: center;
        }
        input[type="radio"] {
            display: none; 
        }
        .operateurs label {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .operateurs label:hover {
            background-color: #0056b3;
        }
        .operateurs input[type="radio"]:checked + label {
            background-color: #0056b3;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Calculatrice</h1>
    <div class="calculatrice">
        <form method="post" action="">
            <input type="number" name="nombre1" placeholder="Nombre 1" required>
            <input type="number" name="nombre2" placeholder="Nombre 2" required>
            
            <div class="operateurs">
                <input type="radio" name="operateur" value="+" id="add" required>
                <label for="add">+</label>
                
                <input type="radio" name="operateur" value="-" id="subtract">
                <label for="subtract">-</label>
                
                <input type="radio" name="operateur" value="*" id="multiply">
                <label for="multiply">*</label>
                
                <input type="radio" name="operateur" value="/" id ="divide">
                <label for="divide">/</label>
                
                <input type="radio" name="operateur" value="^" id="power">
                <label for="power">^</label>
            </div>
            <button type="submit">Calculer</button>
        </form>

        <?php if (isset($resultat)): ?>
            <h2>Résultat : <?php echo $resultat; ?></h2>
        <?php endif; ?>
    </div>
</body>
</html>