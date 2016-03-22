<?php
namespace Peast\Syntax\Node;

class BreakStatement extends Statement
{
    protected $label;
    
    public function getLabel()
    {
        return $this->label;
    }
    
    public function setLabel($label)
    {
        $this->assertType($label, "Identifier", true);
        $this->label = $label;
        return $this;
    }
    
    public function getSource()
    {
        $source = "break";
        
        if ($label = $this->getLabel()) {
            $source .= " " . $label->getSource(); 
        }
        
        $source .= ";";
        
        return $source;
    }
}