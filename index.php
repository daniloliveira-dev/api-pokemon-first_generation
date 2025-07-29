<?php

require __DIR__ . '/vendor/autoload.php';

use App\WebService\Pokemon;

$objPokemon = Pokemon::searchPokemonCurl();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokémons</title>
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">

    <!-- Fonts e CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <style>
        body {
            background: #f7f9fc;
            font-family: 'Open Sans', sans-serif;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform .2s ease, box-shadow .2s ease;
            background: #fff;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-image img {
            border-radius: 50%;
            background: #f1f1f1;
            padding: 8px;
            transition: transform 0.3s;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        .pokemon-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 6px;
            color: #363636;
        }

        .evolutions {
            font-size: 0.9rem;
            color: #555;
        }

        .hero.is-info {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
        }

        .no-pokemon {
            text-align: center;
            margin: 40px 0;
            font-weight: bold;
            color: #b91c1c;
        }
    </style>
</head>

<body>
    <section class="hero is-info is-small">
        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title is-3 has-text-white">
                    Listagem de Pokémons - Primeira Geração
                </p>
            </div>
        </div>
    </section>

    <section class="container py-6">
        <div class="columns is-multiline">
            <?php if (isset($objPokemon) && $objPokemon !== []): ?>
                <?php foreach ($objPokemon->pokemon as $pokemon): ?>
                    <div class="column is-4-tablet is-3-desktop">
                        <div class="card has-text-centered">
                            <div class="card-image p-3">
                                <figure class="image is-128x128 is-inline-block">
                                    <img src="<?= $pokemon->img ?>" alt="<?= $pokemon->name ?>">
                                </figure>
                            </div>
                            <div class="card-content">
                                <p class="pokemon-name"><?= $pokemon->name ?></p>
                                <p class="evolutions">
                                    <?php if (isset($pokemon->next_evolution) && count($pokemon->next_evolution)): ?>
                                        Próximas evoluções:
                                        <?php foreach ($pokemon->next_evolution as $evo): ?>
                                            <?= $evo->name ?> 
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        Não possui próximas evoluções
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-pokemon">Nenhum Pokémon retornado pela API</p>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>
