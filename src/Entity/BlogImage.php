<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogImageRepository")
 * @ORM\Table(name="blog_image")
 */
class BlogImage
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"default"="1"})
     */
    private $rank = 1;

    /**
     * @var \BlogPost
     *
     * @ORM\ManyToOne(targetEntity="BlogPost", inversedBy="images")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id", nullable=false)
     */
    private $post;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getPost(): ?BlogPost
    {
        return $this->post;
    }

    public function setPost(?BlogPost $post): self
    {
        $this->post = $post;

        return $this;
    }
}
