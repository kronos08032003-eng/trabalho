<?php
 
require __DIR__ . '/../vendor/autoload.php';
 
use Slim\Factory\AppFactory;
 
$app = AppFactory::create();
$app->addBodyParsingMiddleware();
 
$pilotos = [
    [
        'id' => 1,
        'nome' => 'Kimi Antonelli',
        'pontos' => '292',
        'equipe' => 'Mercedes'
    ],
    [
        'id' => 2,
        'nome' => 'Russell',
        'pontos' => '211',
        'equipe' => 'Mercedes'
    ],
    [
        'id' => 3,
        'nome' => 'Hamilton',
        'pontos' => '191',
        'equipe' => 'Ferrari'
        
    ],
    [
        'id' => 4,
        'nome' => 'Norris',
        'pontos' => '186',
        'equipe' => 'MCLaren'
    ],
    [
        'id' => 5,
        'nome' => 'LecLerc',
        'pontos' => '167',
        'equipe' => 'Ferrari'
    ],
    [
        'id' => 6,
        'nome' => 'Max Verstappen',
        'pontos' => '145',
        'equipe' => 'RedBull'
    ],
    [
        'id' => 7,
        'nome' => 'Piastri',
        'pontos' => '120',
        'equipe' => 'MCLaren'
    ],
    [
        'id' => 8,
        'nome' => 'Hadjar',
        'pontos' => '71',
        'equipe' => 'McLaren'
    ],
    [
        'id' => 9,
        'nome' => 'Lawson',
        'pontos' => '59',
        'equipe' => 'Red Bull Racing'
    ],
    [
        'id' => 10,
        'nome' => 'Gasly',
        'pontos' => '41',
        'equipe' => 'Alpine'
    ]
];
 
$app->get('/pilotos', function ($request, $response) use ($pilotos) {
 
    $response->getBody()->write(json_encode($pilotos));
 
    return $response
 
        ->withHeader('Content-Type', 'application/json')
 
        ->withStatus(200);
 
});

$app->get('/pilotos/{id}', function ($request, $response, $args) use ($pilotos) {
 
    $id = $args['id'];
 
    foreach ($pilotos as $planta) {
        if ($planta['id'] == $id) {
 
            $response->getBody()->write(json_encode($planta));
 
            return $response
 
                ->withHeader('Content-Type', 'application/json')
 
                ->withStatus(200);
        }
    }
 
    $response->getBody()->write(json_encode([
        'erro' => 'Piloto não encontrado'
    ]));
 
    return $response
 
        ->withHeader('Content-Type', 'application/json')
 
        ->withStatus(404);
 
});
 
$app->post('/pilotos', function ($request, $response) use (&$pilotos) {
    $dados = $request->getParsedBody();
    $novoPiloto = [
        'id' => count($pilotos) + 1,
        'nome' => $dados['nome'],
        'pontos' => $dados['pontos']
    ];
    $pilotos[] = $novoPiloto;
    $response->getBody()->write(json_encode($novoPiloto));
    return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
});

$app->run();
 
