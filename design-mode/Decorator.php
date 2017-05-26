<?php

interface Decorator
{
    public function display();
}

class XiaoFang implements Decorator
{
    private $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function display()
    {
        echo 'I`m ' . $this->name . ' I get out!!!' . PHP_EOL;
    }
}

class Finery implements Decorator
{
    private $component;
    
    public function __construct(Decorator $component)
    {
        var_dump(get_class($component));
        $this->component = $component;
    }
    
    public function display()
    {
        $this->component->display();
    }
}

class Shoes extends Finery
{
    public function display()
    {
        echo 'get Shoes' . PHP_EOL;
        parent::display();
    }
}

class Skirt extends Finery
{
    public function display()
    {
        echo 'get Skirt' . PHP_EOL;
        parent::display();
    }
}

class Fire extends Finery
{
    public function display()
    {
        echo 'outdoor Fire before' . PHP_EOL;
        parent::display();
        echo 'outdoor Fire after' . PHP_EOL;
    }
}

$xiaofang = new XiaoFang('xiaofang');
$shoes = new Shoes($xiaofang);
$skirt = new Skirt($shoes);
$fire = new Fire($skirt);
$fire->display();
