<?php
require_once "real_rate.php";

require_once "rate_interface.php";

class RateProxy implements Rate {
    static int $count=0;
    private RealRate $realRate;
	
	/**
	 *
	 * @param int $rate
	 *
	 * @return mixed
	 */
	function setRate(int $rate) {
        if($this->checkRateTime()==true){
            $this->count++;
            $this->realRate->setRate($rate);
        }
       
        
	}
    public function checkRateTime():bool{
        if($this->count>5)
        return false;
        else return true;
        }
    
}


?>