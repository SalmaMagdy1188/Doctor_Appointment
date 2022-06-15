<?php
class OrderPatient{
    private String $patient_name;
    private String $patient_address;
    
	/**
	 * 
	 * @return string
	 */
	function getPatient_name(): string {
		return $this->patient_name;
	}
	
	/**
	 * 
	 * @param string $patient_name 
	 * @return OrderPatient
	 */
	function setPatient_name(string $patient_name): self {
		$this->patient_name = $patient_name;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getPatient_address(): string {
		return $this->patient_address;
	}
	
	/**
	 * 
	 * @param string $patient_address 
	 * @return OrderPatient
	 */
	function setPatient_address(string $patient_address): self {
		$this->patient_address = $patient_address;
		return $this;
	}
}


?>