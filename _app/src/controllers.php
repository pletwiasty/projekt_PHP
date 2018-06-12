<?php
/**
 * Routing and controllers.
 *
 * @copyright (c) 2016 Tomasz Chojna
 * @link http://epi.chojna.info.pl
 */

use Controller\HelloController;
use Model\Bookmarks;

$bookmarksModel = new Bookmarks();

$app->mount('/hello', new HelloController());

$app->get(
    '/bookmarks',
    function () use ($app, $bookmarksModel) {
        return $app['twig']->render(
            'bookmarks/index.html.twig',
            ['bookmarks' => $bookmarksModel->findAll()]
        );
    }
);

$app->get(
    '/bookmarks/{id}',
    function ($id) use ($app, $bookmarksModel) {
        return $app['twig']->render(
            'bookmarks/view.html.twig',
            ['bookmark' => $bookmarksModel->findOneById($id)]
        );
    }
);