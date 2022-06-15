<?php
class Medcine

{
    private float $price;
    public int $medcine_id;
    private string $title;
    private string $description;





    function getPrice(): float
    {
        return $this->price;
    }


    function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    function getMedcine_id()
    {
        return $this->medcine_id;
    }
    public function __toString():String
    {
        return $this->title." ".$this->description." ".$this->price." ".$this->medcine_id;
    }

    function setMedcine_id(int $medcine_id): self
    {
        $this->medcine_id = $medcine_id;
        return $this;
    }

    function getDescription(): string
    {
        return $this->description;
    }


    function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    function getTitle(): string
    {
        return $this->title;
    }


    function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
}
