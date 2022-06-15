<?php
require "order_item.php";
require_once "order_patient.php";
class Order
{
	public function getTotal():float
    {
		$total=0.0;
		foreach ($this->items as  $value) {
			$total+=$value->getTotal();
			
		}
		return $total;
    }
    static public Order $order;
    static public function getInstance():Order
    {
        if( isset($order) ==false)
        $order= new Order;
        return $order;
        
    }
	private  $order_patient;
	private DateTime $date;
    private int $order_id;
    private array $items=[];

    
	public function __toString():String
    {
		 $str="";
		foreach($this->items as $item){
       $str .= $item->getCount()." ".$item->getMedcine()."<br>";
		}
		if(isset($this->order_id))
		$str.=$this->order_id;
		return $str;
		
	}

	/**
	 * 
	 * @return array
	 */
	function getItems(): array {
		return $this->items;
	}
	
	/**
	 * 
	 * @param array $items 
	 * @return Order
	 */
	function setItems(array $items): self {
		$this->items = $items;
		return $this;
	}
	/**
	 * 
	 * @return int
	 */
	function getOrder_id(): int {
		return $this->order_id;
	}
	
	/**
	 * 
	 * @param int $order_id 
	 * @return Order
	 */
	function setOrder_id(int $order_id): self {
		$this->order_id = $order_id;
		return $this;
	}
	/**
	 * 
	 * @return DateTime
	 */
	function getDate(): DateTime {
		return $this->date;
	}
	
	/**
	 * 
	 * @param DateTime $date 
	 * @return Order
	 */
	function setDate(DateTime $date): self {
		$this->date = $date;
		return $this;
	}
    public function addItem (OrderItem $orderItem)
    {
        $c=false;
        $element=new OrderItem;
        foreach ($this->items as  $item) {
            
         $c=   $item->comepare( $orderItem->getMedcine());
         if($c)
         {
             $element=$item;
         break;
         }
        }
        if($c)
        {
            $element->setCount($element->getCount()+$orderItem->getCount());
        }else
        {    
                array_push($this->items,$orderItem);
                
        }

        }
    function print(){
        foreach ($this->items as $item) {
            echo $item->getCount()."   ";
            echo $item->getMedcine()->getTitle();
        }
    }
	/**
	 * 
	 * @return mixed
	 */
	function getOrder_patient() {
		return $this->order_patient;
	}
	
	/**
	 * 
	 * @param mixed $order_patient 
	 * @return Order
	 */
	function setOrder_patient($order_patient): self {
		$this->order_patient = $order_patient;
		return $this;
	}
}
?>