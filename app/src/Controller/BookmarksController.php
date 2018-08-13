<?php
/**
 * Bookmarks controller.
 *
 * @copyright (c) 2016 Tomasz Chojna
 * @link http://epi.chojna.info.pl
 */
namespace Controller;


use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Model\Bookmarks;
/**
 * Class BookmarksController.
 */
class BookmarksController implements ControllerProviderInterface
{
    /**
     * Routing settings.
     *
     * @param \Silex\Application $app Silex application
     *
     * @return \Silex\ControllerCollection Result
     */
    public function connect(Application $app)
    {
        $controller = $app['controllers_factory'];
        $controller->get('/', [$this, 'indexAction'])->bind('bookmarks_index');
        $controller->get('/{id}', [$this, 'viewAction'])->bind('bookmarks_view');

        return $controller;
    }

    /**
     * Index action.
     *
     * @param \Silex\Application $app Silex application
     *
     * @return string Response
     */
    public function indexAction(Application $app)
    {
        $bookmarksModel = new Bookmarks();

        return $app['twig']->render(
            'bookmarks/index.html.twig',
            ['bookmarks' => $bookmarksModel->findAll()]
        );
    }

    public function viewAction(Application $app, Request $request)
    {
        $bookmarksModel = new Bookmarks();
        $id = $request->get('id', '');
        return $app['twig']->render(
            'bookmarks/view.html.twig',
            ['bookmark' => $bookmarksModel->findOneById($id)]
        );
    }
}