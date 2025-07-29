<?php 

namespace App\WebService;

class Pokemon {

    public static function searchPokemonCurl(){

        $url = 'https://www.canalti.com.br/api/pokemons.json';

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL=> $url,
            CURLOPT_RETURNTRANSFER =>true,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);

        $getPokemon = json_decode(curl_exec($curl));
        return $getPokemon;
    }
}