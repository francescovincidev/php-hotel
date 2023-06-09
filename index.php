<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$have_parking = filter_var($_GET["have_parking"], FILTER_VALIDATE_BOOLEAN);

$min_vote = (int)$_GET["min_vote"];

$filetredHotels = [];


foreach ($hotels as $hotel) {

    // Prendiamo solo gli hotel con voto maggiore di min_vote (lo fa sempre ma quando inizia o seleziona è = 0)
    if ($hotel['vote'] >= $min_vote) {

        // Se è attivo il selettore di parcheggio
        if ($have_parking) {
            // carichiamo solo gli elementi che hanno hotel[parking] true
            if ($hotel['parking']) {
                $filetredHotels[] = $hotel;
            };

            // se non è attivo il selettore di parcheggio carichiamo gli hotel con voto maggiore di min_vote
        } else {
            $filetredHotels[] = $hotel;
        };
    };
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <h3 class="text-center">Filtra in base ai tuoi gusti</h3>
    <form action="index.php" method="GET" class="text-center mb-4">
        <div>
            <div class="m-3">

                <label for="min_vote">Voto minimo:</label>
                <select type="number" name="min_vote" id="min_vote">
                    <option value=0>Seleziona</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>

                </select>
            </div>
            <div class="m-3">
                <label for="have_parking">Parcheggio</label>
                <input type="checkbox" id="have_parking" name="have_parking" value=true>

            </div>

        </div>
        <button type="submit">Invia</button>
        <button type="reset">Annulla</button>
    </form>

    <h2 class="text-center">Hotels</h2>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col" class="text-center">Parcheggio</th>
                <th scope="col" class="text-center">Voto</th>
                <th scope="col" class="text-center">Distanza dal centro</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($filetredHotels as $hotel) {
            ?>
                <tr>
                    <?php foreach ($hotel as $key => $hotelinfo) {

                    ?> <td <?php if ($key === 'parking' || $key === 'vote' || $key === 'distance_to_center') echo "class=text-center"; ?>><?php
                                                                                                                                            if ($key === 'parking') {
                                                                                                                                                if ($hotelinfo) {
                                                                                                                                                    echo "&#10004;";
                                                                                                                                                } else {
                                                                                                                                                    echo "&#10006;";
                                                                                                                                                }
                                                                                                                                            } else {

                                                                                                                                                echo "$hotelinfo";
                                                                                                                                                if ($key === 'distance_to_center') echo " KM" ?><?php
                                                                                                                                                                                            }
                                                                                                                                                                                        } ?> </td>



                </tr>
            <?php } ?>


        </tbody>

    </table>





</body>

</html>