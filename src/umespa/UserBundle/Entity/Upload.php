<?php

namespace umespa\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Upload
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="umespa\UserBundle\Entity\UploadRepository")
 */
class Upload
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
     * @ORM\Column(name="arquivo", type="string", length=100)
     */
    private $arquivo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=50)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="caminho", type="string", length=255)
     */
    private $caminho;

    /**
     * @var string
     *
     * @ORM\Column(name="alunoid", type="string", length=4)
     */
    private $alunoid;


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
     * Set arquivo
     *
     * @param string $arquivo
     * @return Upload
     */
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;

        return $this;
    }

    /**
     * Get arquivo
     *
     * @return string 
     */
    public function getArquivo()
    {
        return $this->arquivo;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Upload
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set caminho
     *
     * @param string $caminho
     * @return Upload
     */
    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;

        return $this;
    }

    /**
     * Get caminho
     *
     * @return string 
     */
    public function getCaminho()
    {
        return $this->caminho;
    }

    /**
     * Set alunoid
     *
     * @param string $alunoid
     * @return Upload
     */
    public function setAlunoid($alunoid)
    {
        $this->alunoid = $alunoid;

        return $this;
    }

    /**
     * Get alunoid
     *
     * @return string 
     */
    public function getAlunoid()
    {
        return $this->alunoid;
    }
}
