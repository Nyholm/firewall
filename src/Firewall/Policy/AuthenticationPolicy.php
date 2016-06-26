<?php

namespace Http\Server\Firewall\Policy;

use Http\Server\Exception;
use Http\Server\Exception\UnauthorizedException;
use Http\Server\Firewall\Policy;
use Psr\Http\Message\ServerRequestInterface;

class AuthenticationPolicy implements Policy
{
    /**
     * @var Authentication
     */
    private $authentication;

    public function __construct(Authentication $authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * {@inheritdoc}
     */
    public function apply(ServerRequestInterface $request)
    {
        if (false === $this->authentication->check($request)) {
            throw new UnauthorizedException();
        }
    }
}
