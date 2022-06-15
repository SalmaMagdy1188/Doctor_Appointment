<?php

require_once "Medicine.php";
class OrderItem 
{
    private  Medcine $medicine;
    private int $count;
    
    public function getTotal():float
    {
        return $this->medicine->getPrice()*$this->count;
        # code...
    }
    public function comepare(  $med ) 
    {
        
        // echo $this->medicine->getMedcine_id();
        if( $this->medicine->medcine_id==$med->medcine_id)
        return true;
        else 
        return false;
        
    }

    public function __toString():String
    {
        return $this->count." ".$this->medicine;
    }
	/**
	 * 
	 * @return int
	 */
	function getCount(): int {
		return $this->count;
	}
	
	/**
	 * 
	 * @param int $count 
	 * @return OrderItem
	 */
	function setCount(int $count): self {
		$this->count = $count;
		return $this;
	}
	/**
	 * 
	 * @return Medcine
	 */
	function getMedcine(): Medcine {
		return $this->medicine;
	}
	
	/**
	 * 
	 * @param Medcine $medcine 
	 * @return OrderItem
	 */
	function setMedcine(Medcine $medcine): self {
		$this->medicine = $medcine;
		return $this;
	}
    
}
?>