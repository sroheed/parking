<?php
// Excercise app !
/*
 following code will is solution for an app  will be implementing a parking checkout system that calculates the total price of parking sessions by parking spot, which is priced in hourly bases and handles pricing schemes such as “1 hour price 3 EUR, three hours 2.90”. 
In our system we’ll use letters to identify each parking spot (A, B, C). Each parking spot is priced individually, but some of them are multipriced: “buy n hours, and they will cost you y”

 */
class CheckOut
{
    //variable declaration for rules "made private so should be accessible out of class"
    private $rules = array();
    //variable declaration for payables "made private so should be accessible out of class"
    private $amounts = array();
    /*
     __contract to define rule contract here 
     */
    public function __construct($rule)
    {
        $this->rules = $rule;
    }
    // Parking funtion to add parking entry input taken from user data object will be stored in array form
    public function add($parkings){
        $parking_array = str_split($parkings);
        foreach ($parking_array as $parking){
            if(array_key_exists ($parking, $this->amounts)){
                $this->amounts[$parking] += 1;
            }
            else{
                $this->amounts[$parking] = 1;
            }
        }
    }
    // getTotal function is cacluting data provided by user based on rule and amounts 
    public function getTotal(){
        $total = 0.0;
        foreach ($this->amounts as $key => $cur){
            $result = array_filter($this->rules,function ($c) use($key){
                return $c["Slot"] == $key;
            });
            usort($result,function ($a,$b){
                return  $b["Hour"] - $a["Hour"];
            });
            foreach ($result as $calc){
                while($cur >= $calc["Hour"]){
                    $cur -= $calc["Hour"];
                    $total += $calc["Price"];
                }
            }
        }
        return $total;
    }
    
}
//our array of rule set 
$rules = array(
    array("Slot"=> "A","Hour"=>1,"Price"=>1),
    array("Slot"=> "C","Hour"=>1,"Price"=>8),
    array("Slot"=> "B","Hour"=>1,"Price"=>4),
    array("Slot"=> "D","Hour"=>1,"Price"=>5),
    array("Slot"=> "A","Hour"=>3,"Price"=>2.7),
    array("Slot"=> "B","Hour"=>2,"Price"=>6),
);
//our checkout objects 
$obj = new CheckOut($rules);
$obj->add("A");
$obj->add("A");
$obj->add("AB");
$obj->add("B");
$obj->add("C");
//the result object in form of array 
print_r($obj->getTotal());
?>