<?php

namespace umespa\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as assert;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="umespa\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface
{
   
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="userame", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $userame;

    /**
     * @var string
     *
     * @ORM\Column(name="frist_name", type="string", length=50)
      * @Assert\NotBlank()
     */
    private $fristName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
      * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
      * @Assert\NotBlank()
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", columnDefinition="ENUM('ROLE_ADMIN','ROLE_USER')")
     */
    private $role;

   
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $updateAt;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userame
     *
     * @param string $userame
     * @return User
     */
    public function setUserame($userame)
    {
        $this->userame = $userame;

        return $this;
    }

    /**
     * Get userame
     *
     * @return string 
     */
    public function getUserame()
    {
        return $this->userame;
    }

    /**
     * Set fristName
     *
     * @param string $fristName
     * @return User
     */
    public function setFristName($fristName)
    {
        $this->fristName = $fristName;

        return $this;
    }

    /**
     * Get fristName
     *
     * @return string 
     */
    public function getFristName()
    {
        return $this->fristName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set password
     *
     * @param string $password
     * @return User
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
     * Set role
     *
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

   


    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return User
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
    * @ORM\PrePersist
    */
    public function setCreateAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
    * @ORM\PrePersist
    */
    public function setUpdateAtValue()
    {
        $this->updateAt = new \DateTime();
    }

    public function getRoles()
    {

    }
    public function getSalt()
    {
      return null;
    }
    public function eraseCredentials()
    {

    }
    public function getUsername()
    {

    }

   
}
