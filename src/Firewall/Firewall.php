<?php

namespace Http\Server\Firewall;

use Psr\Http\Message\ServerRequestInterface;

class Firewall
{
    /**
     * @var array|Rule[]
     */
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

    /**
     * Insert a rule to the rule chain. Negative value or zero will insert the rule first.
     *
     * @param Rule $rule
     * @param $index
     */
    public function addRule(Rule $rule, $index = 0)
    {
        if ($index <= 0) {
            // Add as first rule
            array_unshift($this->rules, $rule);
        }

        if ($index >= count($this->rules)) {
            // Add as last rule
            array_push($this->rules, $rule);
        }

        // Insert in the middle or the array
        $this->rules = array_splice($this->rules, $index, 0, $rule);
    }
}
