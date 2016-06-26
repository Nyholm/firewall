<?php

namespace Http\Server\Firewall;

use Http\Message\RequestMatcher;

interface Rule extends RequestMatcher, Policy
{
}
