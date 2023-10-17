<?php

namespace App\Entity;

use App\Repository\CursoRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CursoRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Curso
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"curso"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $curso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Expression(
     *     "not(this.getCurso() matches '/Temas/' and this.getTema() == null)",
     *     message="El campo Tema* es obligatorio"
     * )
     */
    private $tema;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $objetivo;

    /**
     * @ORM\Column(type="text" , nullable=true)
     * @Assert\Expression(
     *     "not(this.getCurso() matches '/Temas/' and this.getTemario() == null)",
     *     message="El campo Temario* es obligatorio"
     * )
     */
    private $temario;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Expression(
     *     "not(this.getCurso() matches '/Temas/' and this.getBibliografia() == null) ",
     *     message="El campo Bibliografía* es obligatorio"
     * )
     */
    private $bibliografia;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $requisitos;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comentarios;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @ORM\ManyToOne(targetEntity=Semestre::class, inversedBy="cursos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $semestre;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;

        return $this;
    }

    public function getTema(): ?string
    {
        return $this->tema;
    }

    public function setTema(string $tema): self
    {
        $this->tema = $tema;

        return $this;
    }

    public function getObjetivo(): ?string
    {
        return $this->objetivo;
    }

    public function setObjetivo(string $objetivo): self
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    public function getTemario(): ?string
    {
        return $this->temario;
    }

    public function setTemario(string $temario): self
    {
        $this->temario = $temario;

        return $this;
    }

    public function getBibliografia(): ?string
    {
        return $this->bibliografia;
    }

    public function setBibliografia(string $bibliografia): self
    {
        $this->bibliografia = $bibliografia;

        return $this;
    }

    public function getRequisitos(): ?string
    {
        return $this->requisitos;
    }

    public function setRequisitos(string $requisitos): self
    {
        $this->requisitos = $requisitos;

        return $this;
    }

    public function getComentarios(): ?string
    {
        return $this->comentarios;
    }

    public function setComentarios(string $comentarios): self
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }



    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified): void
    {
        $this->modified = $modified;
    }


    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreated(new \DateTime());
        $this->setModified(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setModified(new \DateTime());
    }

    public function getSemestre(): ?Semestre
    {
        return $this->semestre;
    }

    public function setSemestre(?Semestre $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }
}
