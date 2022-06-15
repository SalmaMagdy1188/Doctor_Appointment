<?php
require_once "rate_interface.php";
class RealRate implements Rate{
    private String $rate;
	/**
	 * 
	 * @param string $rate 
	 * @return RealRate
	 */
	
	/**
	 * 
	 * @param string $rate 
	 * @return RealRate
	 */
	function setRate( $rate) {
		$this->rate = $rate;
		return $this;
	}
}


?>