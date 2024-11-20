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
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 30px;
            text-shadow: 2px 2px  4px rgba(0, 0, 0, 0.5);
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 2px solid #74ebd5;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="number"]:focus,
        input[type="text"]:focus {
            border-color: #9face6;
            box-shadow: 0 0 5px rgba(0, 122, 255, 0.5);
            outline: none;
        }

        button {
    width: 100%;
    padding: 15px;
    background-color: #9face6;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);
}

button:hover {
    background-color: gray;
    transform: translateY(-2px);
    box-shadow: 0 8px 12px rgba(0, 123, 255, 0.4);
}

button:active {
    transform: translateY(0);
    box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);
}

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Calculatrice PHP</h1>
    <form method="post">
        <label for="nombre1">Nombre 1:</label>
        <input type="number" name="nombre1" required>

        <label for="nombre2">Nombre 2:</label>
        <input type="number" name="nombre2" required>

        <label for="operateur">Opérateur (+, -, *, /):</label>
        <input type="text" name="operateur" required>

        <button type="submit">Calculer</button>
    </form>

    <?php if (isset($resultat)): ?>
        <h2>Résultat: <?php echo $resultat; ?></h2>
    <?php endif; ?>
</body>
</html>