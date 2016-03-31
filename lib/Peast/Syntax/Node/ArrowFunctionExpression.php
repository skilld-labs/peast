<?php
namespace Peast\Syntax\Node;

class ArrowFunctionExpression extends Node implements Expression, Function_
{
    use Extension\Function_;
    
    protected $expression = false;
    
    public function setBody(BlockStatement $body)
    {
        $this->assertType($body, array("BlockStatement", "Expression"));
        $this->body = $body;
        return $this;
    }
    
    public function getExpression()
    {
        return $this->expression;
    }
    
    public function setExpression($expression)
    {
        $this->expression = (bool) $expression;
        return $this;
    }
    
    public function compile()
    {
        $ret .= " (" . $this->compileNodeList($this->getParams()) . ") => ";
        
        if (!$this->getExpression()) {
            $ret .= "{";
        }
        
        $ret .= $this->getBody()->compile();
        
        if (!$this->getExpression()) {
            $ret .= "}";
        }
        
        return $ret;
    }
}