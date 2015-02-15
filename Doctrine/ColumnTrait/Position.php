<?php

namespace Smart\CoreBundle\Doctrine\ColumnTrait;

/**
 * Position column
 */
trait Position
{
    /**
     * @var int
     *
     * @ORM\Column(type="smallint")
     * @Assert\Range(min = "0", max = "255")
     */
    protected $position;

    /**
     * @param int $position
     * @return $this
     */
    public function setPosition($position)
    {
        if (empty($position)) {
            $position = 0;
        }

        $this->position = $position;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
}
