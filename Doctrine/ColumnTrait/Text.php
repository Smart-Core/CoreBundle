<?php

namespace Smart\CoreBundle\Doctrine\ColumnTrait;

trait Text
{
    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $text;

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}
