<?php

namespace Http\Server\Firewall\Rule;

use Http\Message\RequestMatcher;
use Http\Server\Exception;
use Http\Server\Firewall\Policy;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

class Rule implements \Http\Server\Firewall\Rule
{
    /**
     * @var RequestMatcher
     */
    private $requestMatcher;

    /**
     * @var Policy
     */
    private $policy;

    /**
     * @param RequestMatcher $requestMatcher
     * @param Policy         $policy
     */
    public function __construct(RequestMatcher $requestMatcher, Policy $policy)
    {
        $this->requestMatcher = $requestMatcher;
        $this->policy = $policy;
    }

    /**
     * {@inheritdoc}
     */
    public function matches(RequestInterface $request)
    {
        if (!$request instanceof ServerRequestInterface) {
            throw new \LogicException('This rule only accepts server requests');
        }

        return $this->requestMatcher->matches($request);
    }

    /**
     * {@inheritdoc}
     */
    public function apply(ServerRequestInterface $request)
    {
        return $this->policy->apply($request);
    }
}
