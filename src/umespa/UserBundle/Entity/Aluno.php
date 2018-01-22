<?php

namespace umespa\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aluno
 *
 * @ORM\Table(name="aluno")
 * @ORM\Entity(repositoryClass="umespa\UserBundle\Entity\AlunoRepository")
 */
class Aluno
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
     * @ORM\Column(name="rg", type="string", length=10)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=14)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=100)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="end_complemento", type="string", length=20)
     */
    private $endComplemento;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=4)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="num_complemento", type="string", length=4)
     */
    private $numComplemento;

    /**
     * @var string
     *
     * @ORM\Column(name="fone", type="string", length=20)
     */
    private $fone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=10)
     */
    private $cep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nsc", type="datetime")
     */
    private $dataNsc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cad", type="datetime")
     */
    private $dataCad;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade_natal", type="string", length=100)
     */
    private $cidadeNatal;


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
     * @return Aluno
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
     * Set rg
     *
     * @param string $rg
     * @return Aluno
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get rg
     *
     * @return string 
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     * @return Aluno
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     * @return Aluno
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string 
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set endComplemento
     *
     * @param string $endComplemento
     * @return Aluno
     */
    public function setEndComplemento($endComplemento)
    {
        $this->endComplemento = $endComplemento;

        return $this;
    }

    /**
     * Get endComplemento
     *
     * @return string 
     */
    public function getEndComplemento()
    {
        return $this->endComplemento;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Aluno
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set numComplemento
     *
     * @param string $numComplemento
     * @return Aluno
     */
    public function setNumComplemento($numComplemento)
    {
        $this->numComplemento = $numComplemento;

        return $this;
    }

    /**
     * Get numComplemento
     *
     * @return string 
     */
    public function getNumComplemento()
    {
        return $this->numComplemento;
    }

    /**
     * Set fone
     *
     * @param string $fone
     * @return Aluno
     */
    public function setFone($fone)
    {
        $this->fone = $fone;

        return $this;
    }

    /**
     * Get fone
     *
     * @return string 
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Aluno
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
     * Set cep
     *
     * @param string $cep
     * @return Aluno
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string 
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set dataNsc
     *
     * @param \DateTime $dataNsc
     * @return Aluno
     */
    public function setDataNsc($dataNsc)
    {
        $this->dataNsc = $dataNsc;

        return $this;
    }

    /**
     * Get dataNsc
     *
     * @return \DateTime 
     */
    public function getDataNsc()
    {
        return $this->dataNsc;
    }

    /**
     * Set dataCad
     *
     * @param \DateTime $dataCad
     * @return Aluno
     */
    public function setDataCad($dataCad)
    {
        $this->dataCad = new \DateTime();

        return $this;
    }

    /**
     * Get dataCad
     *
     * @return \DateTime 
     */
    public function getDataCad()
    {
        return $this->dataCad;
    }

    /**
     * Set cidadeNatal
     *
     * @param string $cidadeNatal
     * @return Aluno
     */
    public function setCidadeNatal($cidadeNatal)
    {
        $this->cidadeNatal = $cidadeNatal;

        return $this;
    }

    /**
     * Get cidadeNatal
     *
     * @return string 
     */
    public function getCidadeNatal()
    {
        return $this->cidadeNatal;
    }
}
