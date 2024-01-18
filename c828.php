<?php
print "<B><U>Iteradores (ejemplo c828.php)</U></B><BR><BR>";

class ObjetoIterador implements Iterator{
	 private $obj;
	 private $num;
	 function __construct($obj) {
	 	$this->obj = $obj;
	 }
	 function rewind(){
	 	$this->num = 0;
	 }
	 function hasMore(){
	 	return $this->num < $this->obj->max;
	 }
	 function key() {
	 	return $this->num;
	 }
	 function current() {
	 	switch ($this->num) {
			case 0;
				return "1st";
			case 1;
				return "2nd";	
			case 2;
				return "3rd";
			default;
				return  $this->num + 1 ."th";
		}
	}	
	function next() {
		$this->num++;
	} 
	function valid(){}
}

class Objeto implements IteratorAggregate {
	public $max = 6;
	function getIterator(){
		return new ObjetoIterador($this);
	}
}
	
$obj = new Objeto;

$it = $obj->getIterator();
for ($it->rewind();$it->hasMore();$it->next()){
	$key = $it->current();
	$val = $it->key();
	print "$key = $val <BR>";
}
unset($it);
?>