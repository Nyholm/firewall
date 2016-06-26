<?php

namespace Http\Server\Firewall;

use Http\Server\Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface Policy
{
    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface|null
     *
     * @throws Exception
     */
    public function apply(ServerRequestInterface $request);
}
