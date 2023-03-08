<?php 

     class Student{
        private $name;
        private $age;
        private $gender;
        private $address;

        public function get_name(){
            return $this->name;
        }

        public function get_age(){
            return $this->age;
        }

        public function get_gender(){
            return $this->gender;
        }

        public function get_address(){
            return $this->address;
        }

        public function set_name($name){
            $this->name = $name;
        }

        public function set_age($age){
            $this->age = $age;
        }

        public function set_gender($gender){
            $this->gender = $gender;
        }

        public function set_address($address){
            $this->address = $address;
        }

     }

     $rahul = new Student();
     $rahul->set_name("rahuldotel");
     $rahul->set_age("21");
     $rahul->set_gender("male");
     $rahul->set_address("pepsicola,townplanning");

     echo $rahul->get_name()."<br>";
     echo $rahul->get_age()."<br>";
     echo $rahul->get_gender()."<br>";
     echo $rahul->get_address()."<br>";


?>