<?php
require_once __DIR__ . '/../vendor/autoload.php';

/*Trabalhando com o microframework Silex*/

/*instanciando a classe aplication do silex*/
$app = new Silex\Application();

$app['debug'] = true; //para desenvolvimento irá mostrar melhor o erro

/*Registrando uma função para o twig com sua configuração
Onde twig irá buscar as views*/
$app->register(new Silex\Provider\TwigServiceProvider(),array(
    "twig.path" => __DIR__ . "/../views"
));

/*Criando as rotas
o Silex trabalha com rotas*/

/*
Retornando a pagina
{nome} = Entendendo como uma variavel e passando ela para a função
*/
$app->get("/ola/{nome}",function ($nome) use ($app){
    // Renderizando o twig e passando para ele um array com as informacoes passadas
    return $app['twig']->render("ola.twig",array("nome" => $nome));
});


/*Rodando o silex, agora que ele será executado*/
$app->run();