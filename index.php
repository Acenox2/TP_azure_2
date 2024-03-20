<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP-AZURE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        .tp-azure {
            font-size: 3em;
            color: #333;
            text-transform: uppercase;
        }
        .explanation {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tp-azure">
            TP-AZURE
        </div>
        <div class="explanation">
            <?php
                // Explication du déploiement avec Azure
                echo "<p>Ce site web a été déployé avec Microsoft Azure.</p>";
            ?>
        </div>
    </div>
</body>
</html>
