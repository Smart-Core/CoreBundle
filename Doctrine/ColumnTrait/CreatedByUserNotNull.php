<?php

namespace Smart\CoreBundle\Doctrine\ColumnTrait;

use Symfony\Component\Security\Core\User\UserInterface;

trait CreatedByUserNotNull
{
    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="Symfony\Component\Security\Core\User\UserInterface")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $created_by_user;

    /**
     * @return UserInterface
     */
    public function getCreatedByUser()
    {
        return $this->created_by_user;
    }

    /**
     * @param UserInterface $created_by_user
     *
     * @return $this
     */
    public function setCreatedByUser(UserInterface $created_by_user)
    {
        $this->created_by_user = $created_by_user;

        return $this;
    }
}
