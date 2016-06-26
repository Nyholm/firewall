<?php

namespace Http\Server\Firewall\Policy;

use Psr\Http\Message\ServerRequestInterface;

interface Authentication
{
    /**
     * @param ServerRequestInterface $request
     *
     * @return bool
     */
    public function check(ServerRequestInterface $request);
}
