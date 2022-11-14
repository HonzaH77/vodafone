<?php

namespace App\Item;

abstract class AbstractItem implements AbstractItemInterface
{
    protected string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Funkce vrací ID objektu dané třídy.
     *
     * @return string
     */
    abstract public function getId() : string;
}
