<?php 
/*1. Создайте базовый класс продукта по аналогии с рассмотренным в примерах;

2. Создайте три любых типа продукта (класса), отличных от приведенных в лекции в разных категориях;

3. Все продукты, кроме одного, имеют 10 процентную скидку и их цена должна выводиться с ней;

4. Один тип продукта - имеет скидку только в том случае, если его вес больше 10 килограмм;

5. Доставка на все продукты - 250 рублей, но если на продукт была скидка - 300 рублей;

6. Используйте примеси, интерфейсы или абстрактные классы в решении задачи.*/
?>


<?php
//Интерфейс доставки
interface myinterface{
	public function delivery();
	public function words();//эту функцию нужно вынести в traits
}

abstract class Product{
	//protected $delivery_price;//не знаю, нужно ли это свойство в суперклассе или лучше перенести его в дочерний
	protected $price;//цена
	protected $productname;
	public function __construct($price,$productname){
		$this->price=$price;
		$this->productname=$productname;
	}	
	public function setprice($price){
		$this->price=$price;
		return $this;
	}
	public function getprice(){
		return $this->price;
	}	
	public function getproductname(){
		return $this->productname;
	}	
	abstract protected function PricewithDiscount();
	
}

class ProductwithDiscountWeigth extends Product implements myinterface{
	protected $weigth;//вес
	protected $delivery_price=250;//все-таки перенес в дочерние потому что они ведут себя немного по-разному
	public function __construct($price, $productname, $weigth){
		$this->price=$price;
		$this->weigth=$weigth;
		$this->productname=$productname;
	}
	public function setweigth($weigth){
		$this->weigth=$weigth;
		return $this->weigth;
	}
	public function getweigth(){
		return $this->weigth;
	}	
	public function PricewithDiscount(){
		if ($this->weigth>10){
			$this->price=$this->price-$this->price*0.1;		
		}
		return $this->price;
	}
	public function delivery(){
		if ($this->weigth<10){
			return $this->delivey_price=250;	
		}
			return $this->delivey_price=300;

	}
	public function words(){
		if ($this->weigth<10){
			return $str=" ";
		}
		return $str="со скидкой ";	
	}
	
	
}	
	
class ProductwithDiscount extends Product implements myinterface{
	protected $discount=true;
	protected $delivery_price=300;//тот же вопрос
	public function setdiscount(){
		$this->discount=true;
		return $this->discount;		
	}
	public function discountoff(){
		$this->discount=false;
		return $this->discount;		
	}
	public function PricewithDiscount(){
		if ($this->discount){
			$this->price=$this->price-$this->price*0.1;
		}
		return $this->price;		
	}
	public function delivery(){
		if (!$this->discount){
			return $this->delivey_price=250;	
		}
			return $this->delivey_price=300;	
	}
	public function words(){
		if (!$this->discount){
			return $str=" ";
		}
		return $str="со скидкой ";
	
	}
}		
	
class Apple extends ProductwithDiscount{}
class Potato extends ProductwithDiscount{}
class Watermelon extends ProductwithDiscountWeigth{}


$redapple=new Apple(50,'Красное яблоко');
echo "Продукт ".$redapple->getproductname().". Цена: " .$redapple->getprice(). "</br>";
echo "Цена продукта " .$redapple->getproductname()." ".$redapple->words().$redapple->PricewithDiscount()."</br>";
echo "Доставка на товар ". $redapple->words() .$redapple->delivery()."</br>";
echo"</br>";
$watermelonbig=new Watermelon(1000,"Суперарбуз",40);//очень тяжелый арбуз
echo "Продукт ".$watermelonbig->getproductname().". Цена: " .$watermelonbig->getprice(). "</br>";
echo "Вес продукта ". $watermelonbig->getproductname().":".$watermelonbig->getweigth()." кг."."</br>";
echo "Цена продукта " .$watermelonbig->getproductname()." ".$watermelonbig->words().$watermelonbig->PricewithDiscount()."</br>";
echo "Доставка на товар ". $watermelonbig->words() .$watermelonbig->delivery()."</br>";
echo"</br>";
$smallwatermelon=new Watermelon(100,"Маленький арбузик",2);
echo "Продукт ".$smallwatermelon->getproductname().". Цена: " .$smallwatermelon->getprice(). "</br>";
echo "Вес продукта ". $smallwatermelon->getproductname().":".$smallwatermelon->getweigth()." кг."."</br>";
echo "Цена продукта " .$smallwatermelon->getproductname()." ".$smallwatermelon->words().$smallwatermelon->PricewithDiscount()."</br>";
echo "Доставка на товар ". $smallwatermelon->words() .$smallwatermelon->delivery()."</br>";