<?php

namespace App\Controllers\Command;

use App\Controllers\BaseController;
use CodeIgniter\CLI\CLI;
use SimpleXMLElement;

class CommandController extends BaseController
{
    public function pokemon()
    {

        $client = service('curlrequest');

        $response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon', []);

        $status = $response->getStatusCode();

        if($status==200){
            $data = json_decode($response->getBody());
        
            foreach ($data->results as $i) {
                CLI::write($i->name);
            }
        }else {
            CLI::write("Error al ejecutar el comando");
        }
        
    }

    public function FeedVillena()
    {
        $arrContextOptions = array(
            'ssl' => array(
                'verify_peer'      => false,
                'verify_peer_name' => false,
            ),
        );

        $response = file_get_contents('https://www.villena.es/feed', false, stream_context_create($arrContextOptions));
        $data = new SimpleXMLElement($response);
        $items = $data->channel->item;
        

        foreach ($items as $i) {
            CLI::write($i->title);
        }
    }


}