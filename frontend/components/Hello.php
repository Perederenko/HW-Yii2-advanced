<?php

namespace frontend\components;

use yii\base\Component;

class Hello extends Component
{
    private  $greeting = 'Hello, world!';

    public function show()
    {
        return $this->greeting;
    }


}