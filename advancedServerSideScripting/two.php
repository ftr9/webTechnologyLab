<?php 

    class Vehicle{
        public function accelerate(){
            echo "accelerate";
        }
        public function brake(){
            echo "brake";
        }
        public function steering(){
            echo "sterring";
        }
    }

    class Aeroplane extends Vehicle{
       
        public function autoPilotMode(){
            echo "auto pilotMode";
        }

        public function takeOff(){
            echo "takeoff";
        }

        public function Landing(){
            echo "landing";
        }

    }

    class Bike extends Vehicle{
        public function ABS(){
            echo "automatic braking system";
        }

        public function drift(){
            echo "drifting";
        }

        public function gpsMode(){
            echo "gps mode enabled";
        }

    }

    $airbus = new Aeroplane();
    $airbus->accelerate();
    $airbus->brake();
    $airbus->steering();
    $airbus->autoPilotMode();
    $airbus->takeOff();
    $airbus->Landing();


    $splender = new Bike();
    $splender->accelerate();
    $splender->brake();
    $splender->steering();
    $splender->ABS();
    $splender->drift();
    $splender->gpsMode();



?>