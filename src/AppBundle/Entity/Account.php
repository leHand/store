<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Account
 *
 * @ORM\Table(name="account",
 *  indexes={
 *      @ORM\Index(name="username_idx", columns={"username"}),
 *      @ORM\Index(name="password_idx", columns={"password"}),
 *      @ORM\Index(name="email_idx", columns={"email"})})
 * })
 * @ORM\Entity
 * @UniqueEntity(fields={"email"}, message="account.email.in_use")
 */
class Account extends BaseEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Account
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Account
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getUsername();
    }
}
