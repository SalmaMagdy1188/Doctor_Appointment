<?php

require_once "payment.php";
    class Credit extends Payment{
        private $name;
        private $type;
        private $ExpDate;
    
        public function SetName ($name)
        {
            $this->name=$name;
        }
        public function GetName($name)
        {
          return $this->name;
        }
        public function SetType ($type)
        {
            $this->type=$type;
        }
        public function GetType($type)
        {
          return $this->type;
        }
        public function SetDate ($date)
        {
            $this->date=$date;
        }
        public function GetDate($date)
        {
          return $this->date;
        }

    }

?>