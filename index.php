<?php
include 'process.php';

$reponse = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'];
    $reponse = reponseIA($question);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IA Étudiant en Communication</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="chatbox">
    <h2>Chat avec l'IA</h2>
    <form method="POST">
        <input type="text" name="question" placeholder="Pose ta question..." required>
        <button type="submit">Envoyer</button>
    </form>

    <?php if (!empty($reponse)): ?>
        <div class="response">
            <strong>Réponse de l'IA :</strong> <br> <?php echo $reponse; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
