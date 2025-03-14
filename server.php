<?php
session_start();
$_SESSION["popup"] = true;

$discArr = file_get_contents("./dischi.json");
$decodedArr = json_decode($discArr, true);


isset($_POST["titolo"]) && $titolo = $_POST["titolo"];
isset($_POST["artista"]) && $artista = $_POST["artista"];
isset($_POST["anno_pubblicazione"]) && $anno_pubblicazione = $_POST["anno_pubblicazione"];
isset($_POST["url_copertina"]) && $url_copertina = $_POST["url_copertina"];

if (isset($titolo) && isset($artista) && isset($anno_pubblicazione) && isset($url_copertina)) {
    $decodedArr[] = [
        "titolo" => $titolo,
        "artista" => $artista,
        "anno_pubblicazione" => $anno_pubblicazione,
        "url_copertina" => $url_copertina,
    ];

    $updatedArr = json_encode($decodedArr);
    file_put_contents("./dischi.json", $updatedArr);
}

header("Location: ./index.php");
?>