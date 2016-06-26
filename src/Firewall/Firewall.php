<?php

namespace Http\Server\Firewall;

use Psr\Http\Message\ServerRequestInterface;

class Firewall
{
    private $rules;

    /**
     * Firewall constructor.
     *
     * @param Rule[] $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function filter(ServerRequestInterface $request)
    {
        foreach ($this->rules as $rule) {
            if ($rule->matches($request)) {
                return $rule->apply($request);
            }
        }
    }
}
