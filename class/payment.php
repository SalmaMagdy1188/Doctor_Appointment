<?php
   abstract class Payment{
        private $amount;
        private $id;
        private $date;
        private $time;
        private $TypeOfPayment;
        private $details;

        public function SetAmount ($am)
        {
            $this->amount=$am;
        }
        public function GetAmount($am)
        {
            return $this->amount;
        }
        public function SetId ($id)
        {
            $this->id=$id;
        }
        public function GetId($id)
        {
            return $this->id;
        }
        public function SetTime ($time)
        {
            $this->time=$time;
        }
        public function GetTime($time)
        {
            return $this->time;
        }
        public function SetDate ($date)
        {
            $this->date=$date;
        }
        public function Getdate($date)
        {
            return $this->date;
        }
        public function SetDetails ($details)
        {
            $this->details=$details;
        }
        public function GetDetails($details)
        {
            return $this->details;
        }

    }

?>