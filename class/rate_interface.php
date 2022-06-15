<?php
require_once "feedback.php";
interface Rate{
    public  Feedback $feedback;
    public function setRate(int $rate);
}


?>