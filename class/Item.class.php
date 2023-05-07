<?php
 class Item {
    private $name_english;
    private $name_arabic;
    private $price;
    private $new_item,$availability,$description_english,$description_arabic,$category;
    public function __construct($name_english,$name_arabic,$price,$new_item,$availability,$description_english,$description_arabic,$category) {
      $this->name_english = $name_english;
      $this->name_arabic=$name_arabic;
      $this->price=$price;
      $this->new_item=$new_item;
      $this->availability=$availability;
      $this->description_english=$description_english;
      $this->description_arabic=$description_arabic;
      $this->category=$category;
    }
    public function getEnglishName(){
      return $this->name_english;
    }
    public function getArabicName(){
      return $this->name_arabic;
    }
    public function getPrice(){
      return $this->price;
    }
    public function getNewItem(){
      return $this->new_item;
    }
    public function getAvailability(){
      return $this->availability;
    }
    public function getDescriptionEnglish(){
      return $this->description_english;
    }
    public function getDescriptionArabic(){
      return $this->description_arabic;
    }
    public function getCategory(){
      return $this->category;
    }    
 }

?>