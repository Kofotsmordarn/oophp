<?php

namespace Rasb14\T100;

/**
 * DiceHand, a class representing a hand with dices.
 */
class DiceHand
{
    /**
     * @var array $dices The DiceHands Dices.
     */
    private $dices;

    /**
     * Constructor to create a Dice.
     *
     * @param int $dices The number of dices of the DiceHand.
     */
    public function __construct(int $dices)
    {
        $this->dices = array();

        for ($i = 0; $i < $dices; $i++) {
            array_push($this->dices, new DiceGraphic());
        }
    }

    /**
     * Roll all dices.
     *
     * @return void.
     */
    public function roll()
    {
        for ($i = 0; $i < count($this->dices); $i++) {
            $this->dices[$i]->roll();
        }
    }

    /**
     * Get values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function values()
    {
        $vals = array();
        for ($i = 0; $i < count($this->dices); $i++) {
            array_push($vals, $this->dices[$i]->value());
        }
        return $vals;
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function sum()
    {
        $val = 0;
        for ($i = 0; $i < count($this->dices); $i++) {
            $val += $this->dices[$i]->value();
        }
        return $val;
    }

    /**
     * Get the average of all dices.
     *
     * @return float as the average of all dices.
     */
    public function average()
    {
        return $this->sum() / count($this->dices);
    }

    /**
     * Checks if any dice currently has the specified value.
     *
     * @param int $value The value to add.
     *
     * @return bool as some die has the specified value.
     */
    public function anyDieHasValue(int $value)
    {
        foreach ($this->dices as $dice) {
            if ($dice->value() == $value) {
                return true;
            }
        }
        return false;
    }

    /**
     * Gets the graphics for the dices.
     *
     * @return array as graphics.
     */
    public function graphic()
    {
        $gfx = array();
        for ($i = 0; $i < count($this->dices); $i++) {
            array_push($gfx, $this->dices[$i]->graphic());
        }
        return $gfx;
    }

    /**
     * Gets the histogram for the dices.
     *
     * @return string as an html ul list.
     */
    public function htmlHistogram()
    {
        $result = '<div class="gameRow">';
        for ($i = 0; $i < count($this->dices); $i++) {
            $hg = new Histogram();
            $hg->injectData($this->dices[$i]);
            $result .= '<div class="gameBox">';
            $result .= '<p>Dice: ' . ($i + 1) . '</p>';
            $result .= $hg->getHtml();
            $result .= '</div>';
        }
        $result .= '</div>';

        return $result;
    }

    /**
     * Gets the histogram for the dices.
     *
     * @return array as a sorted histogram array.
     */
    public function histogram()
    {
        $result = [];
        for ($i = 0; $i < count($this->dices); $i++) {
            $hg = new Histogram();
            $hg->injectData($this->dices[$i]);
            $result[] = $hg->getSortedSequence();
        }
        
        return $result;
    }
}
