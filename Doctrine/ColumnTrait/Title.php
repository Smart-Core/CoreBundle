<?php

namespace Smart\CoreBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;

/**
 * Title column
 */
trait Title
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
