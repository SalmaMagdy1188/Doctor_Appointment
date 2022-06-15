<?php
require_once "payment.php";
    class Cash extends Payment{
        private $CashTendered;

        public function SetCashTendered ($CashTendered)
        {
            $this->CashTendered=$CashTendered;
        }
        public function GetCashTendered($CashTendered)
        {
          return $this->CashTendered;
        } 
    }

?>
