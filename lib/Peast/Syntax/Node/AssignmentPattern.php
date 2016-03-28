<?php
namespace Peast\Syntax\Node;

class AssignmentPattern extends Pattern
{
    protected $left;
    
    protected $right;
    
    public function getLeft()
    {
        return $this->left;
    }
    
    public function setLeft(Pattern $left)
    {
        $this->left = $left;
        return $this;
    }
    
    public function getRight()
    {
        return $this->right;
    }
    
    public function setRight(Expression $right)
    {
        $this->right = $right;
        return $this;
    }
    
    public function compile()
    {
        return $this->getLeft()->compile() . "=" . $this->getRight()->compile();
    }
}