<?php
/**
 * Routing and controllers.
 *
 * @copyright (c) 2016 Tomasz Chojna
 * @link http://epi.chojna.info.pl
 */

use Controller\HelloController;
use Controller\BookmarksController;
use Model\Bookmarks;

$bookmarksModel = new Bookmarks();

$app->mount('/hello', new HelloController());
$app->mount('/bookmarks', new BookmarksController());



$app->get(
    '/bookmarks/{id}',
    function ($id) use ($app, $bookmarksModel) {
        return $app['twig']->render(
            'bookmarks/view.html.twig',
            ['bookmark' => $bookmarksModel->findOneById($id)]
        );
    }
);