<?php

namespace App\Entity\Dictionary;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 **/
abstract class AbstractDictionary
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * @var \DateTime $create_at
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="create_at",type="datetime")
     */

    protected $createAt;

    /**
     * @var \DateTime $update_at
     * @Gedmo\Timestampable(on={"create", "update"})
     * @ORM\Column(name="update_at", type="datetime")
     */
    protected $updateAt;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function setCreateAt(\DateTime $createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getCreateAt()
    {
        return $this->createAt;
    }

    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTime $updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }
    public function __toString()
    {
        return (string)$this->name;
    }


}