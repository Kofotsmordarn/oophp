<?php

namespace Rasb14\T100;

/**
 * DiceGraphic, a six sided die with graphics.
 */
class DiceGraphic extends Dice
{
    /**
     * @var integer SIDES Number of sides of the Dice.
     */
    const SIDES = 6;

    /**
     * Constructor to initiate the dice with six number of sides.
     */
    public function __construct()
    {
        parent::__construct(self::SIDES);
    }

    /**
     * Gets the graphic representation of the die.
     *
     * @return string as the graphical representation of the value.
     */
    public function graphic()
    {
        return "dice-" . $this->value;
    }
}
