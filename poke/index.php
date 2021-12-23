<?php
$url = 'https://www.canalti.com.br/api/pokemons.json';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$pokemons = json_decode(curl_exec($ch));
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Pokemon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="jumbotron text-center">
        <h1>Poke teste</h1>
        <p>consumo de api com PHP</p>
    </div>
    <section class="container ">
        <?php
        if (count($pokemons->pokemon)) {
            $i = 0;
            foreach ($pokemons->pokemon as $Pokemon) {
                $i++;


        ?><?php if ($i % 3 == 1) { ?>

        <div class='columns features'>
        <?php } ?>
        <div class='columns is-4'>
            <div class='card'>
                <div class='card- image has-texte-centered'>
                    <figure class="image is-128x128">
                        <img src="<?= $Pokemon->img ?>" alt="<?= $Pokemon->name ?>" class="" data-target="modal-image2">
                    </figure>
                </div>
                <div class="card-content has-text-centered">
                    <div class="content">
                        <h4><?= $Pokemon->name ?></h4>
                        <p>
                        <ul>
                            <?php

                            if (count($Pokemon->next_evolution)) {
                                echo "Proximas evoluções:";
                                foreach ($Pokemon->next_evolution as $ProximaEvolucao) {
                                    echo $ProximaEvolucao->name .   "";
                                }
                            } else {
                                echo "Não possui proximás evoluções";
                            }
                            ?>
                        </ul>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
                if ($i % 3 == 0) {
        ?>
            <div>
        <?php }
            }
        } else { ?>
        <strong> Nenhum pokemon retornado pela Api </strong>
    <?php } ?>
    </section>
    </div>

</body>

</html>
