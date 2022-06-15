<?php
require_once "doctor.php";
require_once "patient.php";
class Feedback  {
     
     private $comment;
     private $id;
     private  $doctor_id;
     private  $patient_id;
  
 	/**
	 * 
	 * @return mixed
	 */
	function getComment() {
		return $this->comment;
	}
	
	/**
	 * 
	 * @param mixed $comment 
	 * @return Feedback
	 */
	function setComment($comment): self {
		$this->comment = $comment;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @return Feedback
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getDoctor_id() {
		return $this->doctor_id;
	}
	
	/**
	 * 
	 * @param mixed $doctor_id 
	 * @return Feedback
	 */
	function setDoctor_id($doctor_id): self {
		$this->doctor_id = $doctor_id;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getPatient_id() {
		return $this->patient_id;
	}
	
	/**
	 * 
	 * @param mixed $patient_id 
	 * @return Feedback
	 */
	function setPatient_id($patient_id): self {
		$this->patient_id = $patient_id;
		return $this;
	}
}
 
?>