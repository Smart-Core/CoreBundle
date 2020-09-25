<?php

namespace Smart\CoreBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;

trait Slug
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=190, unique=true)
     */
    protected $slug;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getSlug();
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug(string $slug)
    {
        $this->slug = trim($slug);

        return $this;
    }
}
