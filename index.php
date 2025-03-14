<?php

$discArr = file_get_contents("./dischi.json");
$decodedArr = json_decode($discArr, true);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    <title>Lista Dischi</title>
</head>

<body>
    <header class="d-fex">
        <img class="logo" width="70" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/2048px-Spotify_logo_without_text.svg.png" alt="logo">
    </header>
    <div class="container">
        <h1 class="text-center my-5">I tuoi Dischi </h1>
        <div class="row">
            <?php
            foreach ($decodedArr as $disc) {
                ?>
                <div class="col-4 my-5">
                    <div class="card text-center">
                        <img src=<?php echo $disc["url_copertina"] ?> class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $disc["titolo"] ?></h5>
                            <p class="card-text"><?php echo $disc["artista"] ?></p>
                            <p class="card-text"><?php echo $disc["anno_pubblicazione"] ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <hr class="my-5">
            <h2 class="text-center">Aggiungi un disco alla collezione</h2>
            <form method="POST" action="server.php" class="my-5">
                <div class="row">
                <?php
                    foreach ($decodedArr[0] as $key => $value) {

                ?>
                    <div class="col-6 mt-3 d-flex justify-content-center">
                        <label class="mx-3 w-50" for=<?php echo $key ?>>Inserisci <?php echo str_replace("_", " ",$key)?></label>
                        <input class="w-50 form-control" required type="text" id=<?php echo $key ?> name=<?php echo $key ?> />
                    </div>
                <?php
                    }
                ?>
                <div class="col-6 d-flex mt-3 justify-content-center">
                    <button class="btn btn-primary">
                        Aggiungi Disco
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>