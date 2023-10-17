<?php

namespace App\Entity;

use App\Repository\SemestreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=SemestreRepository::class)
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 */
class Semestre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"semestre"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $semestre;

    /**
     * @ORM\Column(type="date")
     */
    private $vigencia;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="semestre_convocatoria", fileNameProperty="convocatoriaName")
     *
     * @Assert\File(
     *     maxSize = "3M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido"
     * )
     *
     * @var File
     */
    public $convocatoriaFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $convocatoriaName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="semestre_calendario", fileNameProperty="calendarioName")
     *
     * @Assert\File(
     *     maxSize = "3M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido"
     * )
     *
     * @var File
     */
    public $calendarioFile;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="semestre_rcalendario", fileNameProperty="rcalendarioName")
     *
     * @Assert\File(
     *     maxSize = "3M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido"
     * )
     *
     * @var File
     */
    public $rcalendarioFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $calendarioName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rcalendarioName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="semestre_instructivo", fileNameProperty="instructivoName")
     *
     * @Assert\File(
     *     maxSize = "3M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido"
     * )
     *
     * @var File
     */
    public $instructivoFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instructivoName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="semestre_reconvocatoriam", fileNameProperty="reconvocatoriamName")
     *
     * @Assert\File(
     *     maxSize = "3M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido"
     * )
     *
     * @var File
     */
    public $reconvocatoriamFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reconvocatoriamName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="semestre_reconvocatoriad", fileNameProperty="reconvocatoriadName")
     *
     * @Assert\File(
     *     maxSize = "3M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido"
     * )
     *
     * @var File
     */
    public $reconvocatoriadFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reconvocatoriadName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @ORM\OneToMany(targetEntity=Curso::class, mappedBy="semestre")
     */
    private $cursos;

    public function __construct()
    {
        $this->cursos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSemestre(): ?string
    {
        return $this->semestre;
    }

    public function setSemestre(string $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getVigencia(): ?\DateTimeInterface
    {
        return $this->vigencia;
    }

    public function setVigencia(\DateTimeInterface $vigencia): self
    {
        $this->vigencia = $vigencia;

        return $this;
    }

    /**
     * Set convocatoriaFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $convocatoria
     */
    public function setConvocatoriaFile(?File $convocatoria = null): void
    {
        $this->convocatoriaFile = $convocatoria;

        if (null !== $convocatoria) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getConvocatoriaFile(): ?File
    {
        return $this->convocatoriaFile;
    }

    /**
     * Set reconvocatoriamFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $reconvocatoriam
     */
    public function setReconvoocatoriamFile(?File $reconvocatoriam = null): void
    {
        $this->reconvocatoriamFile = $reconvocatoriam;

        if (null !== $reconvocatoriam) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getReconvocatoriamFile(): ?File
    {
        return $this->reconvocatoriamFile;
    }

    /**
     * Set reconvocatoriadFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $reconvocatoriad
     */
    public function setReconvoocatoriadFile(?File $reconvocatoriad = null): void
    {
        $this->reconvocatoriadFile = $reconvocatoriad;

        if (null !== $reconvocatoriad) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getReconvocatoriadFile(): ?File
    {
        return $this->reconvocatoriadFile;
    }

    public function getConvocatoriaName(): ?string
    {
        return $this->convocatoriaName;
    }

    public function setConvocatoriaName($convocatoriaName): void
    {
        $this->convocatoriaName = $convocatoriaName;
    }

    public function getReconvocatoriamName(): ?string
    {
        return $this->reconvocatoriamName;
    }

    public function setReconvocatoriamName($reconvocatoriamName): void
    {
        $this->reconvocatoriamName = $reconvocatoriamName;
    }

    public function getReconvocatoriadName(): ?string
    {
        return $this->reconvocatoriadName;
    }

    public function setReconvocatoriadName($reconvocatoriadName): void
    {
        $this->reconvocatoriadName = $reconvocatoriadName;
    }

    /**
     * Set calendarioFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $calendario
     */
    public function setCalendarioFile(?File $calendario = null): void
    {
        $this->calendarioFile = $calendario;

        if (null !== $calendario) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getCalendarioFile(): ?File
    {
        return $this->calendarioFile;
    }

    /**
     * Set rcalendarioFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $rcalendario
     */
    public function setRcalendarioFile(?File $rcalendario = null): void
    {
        $this->rcalendarioFile = $rcalendario;

        if (null !== $rcalendario) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getRcalendarioFile(): ?File
    {
        return $this->rcalendarioFile;
    }

    public function getCalendarioName(): ?string
    {
        return $this->calendarioName;
    }

    public function setCalendarioName($calendarioName): void
    {
        $this->calendarioName = $calendarioName;
    }

    public function getRcalendarioName(): ?string
    {
        return $this->rcalendarioName;
    }

    public function setRcalendarioName($rcalendarioName): void
    {
        $this->rcalendarioName = $rcalendarioName;
    }

    /**
     * Set instructivoFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $instructivo
     */
    public function setInstructivoFile(?File $instructivo = null): void
    {
        $this->instructivoFile = $instructivo;

        if (null !== $instructivo) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getInstructivoFile(): ?File
    {
        return $this->instructivoFile;
    }


    public function getInstructivoName(): ?string
    {
        return $this->instructivoName;
    }

    public function setInstructivoName($instructivoName): void
    {
        $this->instructivoName = $instructivoName;
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

    /**
     * @return Collection<int, Curso>
     */
    public function getCursos(): Collection
    {
        return $this->cursos;
    }

    public function addCurso(Curso $curso): self
    {
        if (!$this->cursos->contains($curso)) {
            $this->cursos[] = $curso;
            $curso->setSemestre($this);
        }

        return $this;
    }

    public function removeCurso(Curso $curso): self
    {
        if ($this->cursos->removeElement($curso)) {
            // set the owning side to null (unless already changed)
            if ($curso->getSemestre() === $this) {
                $curso->setSemestre(null);
            }
        }

        return $this;
    }

}
