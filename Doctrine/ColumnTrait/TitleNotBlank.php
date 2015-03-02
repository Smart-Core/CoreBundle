<?php

namespace Smart\CoreBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Title column with NotBlank validator
 */
trait TitleNotBlank
{
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @Assert\NotBlank()
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
