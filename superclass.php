<?php
class Cat
{
	public $color;
	public $strip;
	function __construct($col,$str)
	{
		$this->color=$col;
		$this->strip=$str;
	}
	public function getName($name)
	{
		echo "<b>".$name."</b>";
	}
	public function getSound($sound='Meeeaaauuu')
	{
		echo "<h3>".$sound."</h3>";
	}
}
interface Hungry{
	public function feed();
	public function getHungry();
	public function getTemper();
}

class HungryCat extends Cat implements Hungry
{
	private $temper='evil';//настроение
	private $hungry=true;//голод
	private function Hungry($hungry)
	{
		if($hungry){
			$this->getSound();
			$this->temper='evil';
		}
		else
		{
			$this->hungry=false;
			$this->temper='gentle';
		}	
	}
	public function feed()
	{
		$this->Hungry(false);
	}
	public function getHungry()
	{
		return $this->hungry;
	}
	public function getTemper()
	{
		return $this->temper;
	}
	
}


class Player
{	
	protected $color;
	protected $type='MP3';
	protected $weigth=50;
	protected $playlist=array();
	function __construct($type, $weigth=50)
	{
		$this->type=$type;
		$this->weigth=$weigth;
	}
	public function getcolor()
	{
		return $this->color;
	}
	public function gettypepeplayer()
	{
		return $this->type;
	}
	public function getweigth()
	{
		return $this->weigth;
	}
}

interface myMusicPlay{
	public function play();
	public function next_song();
	public function prev_song();
	public function pause();
}
class MyPlayer extends Player implements myMusicPlay{
	protected  $playlist=array();
	public function play()
	{
		foreach ($this->playlist as $key=>$value)
		{
			echo $value."</br>";
		}
	}
	public function next_song()
	{
		return next($this->playlist);
	}
	public function prev_song()
	{
		return  prev($this->playlist);
	}
	public function pause()
	{
		return current($this->playlist);
	}
	public function putMusuc($arr)
	{
		$this->playlist=$arr;
	}
}
	
class Citizen{
	protected  $name;
	protected  $age;
	protected  $sex;//m or f
	function __construct($n,$a,$s)
	{
		$this->name=$n;
		$this->age=(int)$a;
		$this->sex=$s;
	}
	public function sayName(){
		echo $this->name;
	}
	public function sayAge(){		
		echo $this->age;
	}
	public function gotoWar(){
		if ($this->sex=='m' && $this->age>18){
		echo "В атаку!УРААААА!";
		}
		else{
		echo"Я буду бороться с врагом у станка!";	
		}
	}
}
interface Pupilfunc
{
	public function study();
	public function assistancetosenior();//функция помощь старшим
}
//школьник
class Pupil extends  Citizen implements Pupilfunc
{
	public $schoolnumber;
	public function study()
	{
		echo "Я учусь в школе номер ". $this->schoolnumber ;
	}
	public function assistancetosenior()
	{
		echo "Я помогаю старшим";
	}
}

class Camera
{
	protected  $brand;
	protected  $numMp;
	protected  $color;
	protected  $weigth;
	function __construct($brand){
		$this->brand=$brand;
		$this->numMp=$numMp;
	}
	public function getbrand()
	{
		return $this->brand;
	}
	public function getnumMp()
	{
		return $this->numMp;
	}
	public function getcolor()
	{
		return $this->color;
	}
	public function getweigth()
	{
		return $this->weigth;
	}	
}

interface Camint{
	public function getPicture();
	public function flash();
	public function dischargeAcc();
}	
class DLSRCamera extends Camera implements Camint
{
	public $kitlens;
	function __construct($brand, $kitlens){
		$this->brand=$brand;
		$this->kitlens=$kitlens;
	}
	public function getkitlens()
	{
		if ($this->kitlens){
			echo "Объектив в комплекте";
		}else{
			echo "Камера без объектива";
		}	
	}
	public function getPicture(){}
	public function flash(){}
	public function dischargeAcc(){}
	
}



class Oven
{
	protected  $brand;
	protected  $switches=array('button','rotary','sensor');
	protected  $numburner=array(1,2,3,4);//число комфорок
	function __construct($brand, $switches,$numburner){
		$this->brand=$brand;
		$this->switches=$switches;
		$this->numburner=$numburner;
	}
	public function getbrand()
	{
		return $this->brand;
	}
	public function getswitches()
	{
		return $this->switches;
	}
	public function getnumburner()
	{
		return $this->numburner;
	}
}

interface GetCook{
	public function getcook();//реализуется метод приготовления плиты газовой или электрической
}

class ElectricOven extends Oven implements GetCook
{
	private $worksurf=array('ceramic','steel');
	public function getcook(){
	}
	
}

$myoven= new ElectricOven('LG','button',4);
echo $myoven->getnumburner();