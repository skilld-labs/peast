<?php
namespace Peast\Syntax\ES6\Node;

class EmptyStatement extends Node implements Statement
{
    public function compile()
    {
        return ";";
    }
}