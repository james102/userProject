<?php

namespace umespa\UserBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface; //cript
use Symfony\Component\Security\Core\User\AdvancedUserInterface; //cript

use Doctrine\ORM\Mapping as ORM;

/**
 * Temp
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="umespa\UserBundle\Entity\TempRepository")
 */
class Temp implements UserInterface
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
     * @ORM\Column(name="nome", type="string", length=100)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=100)
     */
    private $senha;
     /**
     * @var string
     *
     * @ORM\Column(name="confirma", type="string", length=20)
     */
    private $confirma;

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
     * Set nome
     *
     * @param string $nome
     * @return Temp
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Temp
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
     * Set senha
     *
     * @param string $senha
     * @return Temp
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set confirma
     *
     * @param string $confirma
     * @return Temp
     */
    public function setConfirma($confirma)
    {
        $this->confirma = $confirma;
        if($confirma !='1'){
            $this->confirma = '0';
        }
       

        return $this;
    }

    /**
     * Get confirma
     *
     * @return string 
     */
    public function getConfirma()
    {
        return $this->confirma;
    }
//Securito cript
    public function getRoles()
    {

    }
    public function getSalt()
    {
      return null;
    }
    public function getPassword()
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
