<?php

class service
{
    public $available = false;
    



    public function __construct() {
        $this->available = true;
    }

    public function __destruct()
    {
        //echo "this class '" . __CLASS__ . "' has started";
    }


    public function all(){
        return[
            ['name' => 'constration', 'price' => 600 , 'days'=>['sun','mon']],
            ['name' => 'teatching', 'price' => 500 , 'days'=>['stun','tus']],
            ['name' => 'training', 'price' => 900 , 'days'=>['wens','fri']],
            

        ];
    }

}

