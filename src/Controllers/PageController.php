<?php

namespace Shika\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Shika\Helpers\Session;
use Shika\Helpers\Twig;
use Shika\Repositories\ApiKeyRepository;
use Shika\Repositories\SiteRepository;
use Shika\Repositories\UserRepository;

class PageController
{
    private Twig $twig;
    private Session $session;

    private SiteRepository $sites;
    private UserRepository $users;
    private ApiKeyRepository $keys;

    public function __construct(Twig $twig, Session $session, SiteRepository $sites, UserRepository $users, ApiKeyRepository $keys)
    {
        $this->twig = $twig;
        $this->session = $session;
        
        $this->sites = $sites;
        $this->users = $users;
        $this->keys = $keys;
    }

    public function index(Request $request, Response $response)
    {
        return $this->twig->render($response, "dashboard/index.html.twig", [ "username" => $this->session->get("user.name") ]);
    }

    public function sites(Request $request, Response $response)
    {
        return $this->twig->render($response, "dashboard/sites.html.twig", [ "sites" => $this->sites->getSites() ]);
    }

    public function users(Request $request, Response $response)
    {
        return $this->twig->render($response, "dashboard/users.html.twig", [ "users" => $this->users->getUsers() ]);
    }

    public function keys(Request $request, Response $response)
    {
        return $this->twig->render($response, "dashboard/keys.html.twig", [ "keys" => $this->keys->getKeys() ]);
    }
}