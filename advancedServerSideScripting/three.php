<?php


    trait Cplusplus{

        public $fastestCompilation = 'it compiled natively';
        public $hardwareCommunication = 'it can communicate directly with hardware';
        public $memoryManagement = 'it has fine control over memory';

    }

    trait Javascript{

        public $asynchronousProgamming = 'javascript is based on promise';
        public $eventDrivenArchitecture = 'javascript can send events across different parts of an application';
        public $singleThreaded = 'javscript executes in single threaded cpu core';

    }

    class Nodejs{
        use Cplusplus;
        use Javascript;
    }

    const node = new Nodejs();
    echo node->asynchronousProgamming;
    echo node->singleThreaded;
    echo node->fastestCompilation;
    echo node->hardwareCommunication;


?>