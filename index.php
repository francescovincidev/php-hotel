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
            <?php foreach ($hotels as $hotel) { ?>
                <tr>
                    <?php foreach ($hotel as $key => $hotelinfo) { ?> <td <?php if ($key === 'parking' || $key === 'vote' || $key === 'distance_to_center') echo "class=text-center"; ?>><?php
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

                                                                                                                                                                                                                                    ?> </td>


                    <?php } ?>
                </tr>
            <?php } ?>


        </tbody>

    </table>

</body>

</html>