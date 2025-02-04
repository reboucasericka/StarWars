<?php
require_once 'services/libs/SWAPIClient.php';

use services\libs\SWAPIClient;

class PeoplesController {

    public function index() {
        $client = new SWAPIClient();

        try {
            $characters = $client->fetchData('people');

            if (isset($characters['results']) && is_array($characters['results'])) {
                $characterLinks = [
                    'Luke Skywalker' => 'https://en.wikipedia.org/wiki/Luke_Skywalker',
                    'Darth Vader' => 'https://pt.wikipedia.org/wiki/Darth_Vader',
                    'Leia Organa' => 'https://pt.wikipedia.org/wiki/Leia_Organa',
                    'Obi-Wan Kenobi' => 'https://pt.wikipedia.org/wiki/Obi-Wan_Kenobi',
                    'Han Solo' => 'https://pt.wikipedia.org/wiki/Han_Solo',
                    'Chewbacca' => 'https://pt.wikipedia.org/wiki/Chewbacca',
                    'C-3PO' => 'https://pt.wikipedia.org/wiki/C-3PO',
                    'R2-D2' => 'https://pt.wikipedia.org/wiki/R2-D2',
                    'Yoda' => 'https://pt.wikipedia.org/wiki/Yoda',
                    'Imperador Palpatine' => 'https://pt.wikipedia.org/wiki/Palpatine'
                ];
                $characterImages = [
                    'Luke Skywalker' => '/starwars/img/lukeskywalker.jpg',
                    'Darth Vader' => '/starwars/img/darth-vader.jpg',
                    'Leia Organa' => '/starwars/img/leia_organa.webp',
                    'Obi-Wan Kenobi' => '/starwars/img/obi_wan.jpg',
                    'Han Solo' => '/starwars/img/hansolo.webp',
                    'Chewbacca' => '/starwars/img/chewbacca.jpg',
                    'C-3PO' => '/starwars/img/c3po.jpeg',
                    'R2-D2' => '/starwars/img/r2d2.jpg',
                    'Yoda' => '/starwars/img/yoda.jpeg',
                    'Imperador Palpatine' => '/starwars/img/emperor_palpatine.webp'
                ];

                $results = [];
                foreach ($characters['results'] as $character) {
                    $name = $character['name'];
                    $results[] = [
                        'name' => $name,
                        'gender' => $character['gender'],
                        'link' => $characterLinks[$name] ?? '#',
                        'image' => $characterImages[$name] ?? '/starwars/img/character_placeholder.jpg'
                    ];
                }

                return $results;
            } else {
                throw new Exception("Erro ao carregar os personagens da API.");
            }
        } catch (Exception $e) {
            error_log("Erro no PeoplesController: " . $e->getMessage());
            throw $e;
        }
    }
}
?>
