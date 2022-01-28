<?php

namespace App\Entity;

use App\Entity\User;
use App\Utils\Blog as Blog;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogPostRepository")
 * @ORM\Table(name="blog_post")
 * @ORM\HasLifecycleCallbacks()
 */
class BlogPost
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
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $excerpt;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $authorEmail;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, options={"default"="publish"})
     */
    private $statusPost = 'publish';

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default"="1"})
     */
    private $showComment = true;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default"="1"})
     */
    private $enableComment = true;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $viewsPost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $publishedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @var Image[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="BlogImage", mappedBy="post", orphanRemoval=true, cascade={"persist"})
     * @ORM\OrderBy({"rank" = "ASC"})
     */
    private $images;

    /**
     * @var Comment[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="BlogComment", mappedBy="post", orphanRemoval=true, cascade={"persist"})
     */
    private $comments;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var \BlogCategory
     *
     * @ORM\ManyToOne(targetEntity="BlogCategory", inversedBy="posts")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $category;

    /**
     * @var Tag[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="BlogTag", inversedBy="posts", cascade={"persist"})
     * @ORM\JoinTable(name="blog_post_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tags;

    /**
     * @var array
     */
    private $files = [];

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(?string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthorEmail(): ?string
    {
        return $this->authorEmail;
    }

    public function setAuthorEmail(string $authorEmail): self
    {
        $this->authorEmail = $authorEmail;

        return $this;
    }

    public function getStatusPost(): ?string
    {
        return $this->statusPost;
    }

    public function setStatusPost(string $statusPost): self
    {
        $this->statusPost = $statusPost;

        return $this;
    }

    public function getShowComment(): ?bool
    {
        return $this->showComment;
    }

    public function setShowComment(bool $showComment): self
    {
        $this->showComment = $showComment;

        return $this;
    }

    public function getEnableComment(): ?bool
    {
        return $this->enableComment;
    }

    public function setEnableComment(bool $enableComment): self
    {
        $this->enableComment = $enableComment;

        return $this;
    }

    public function getViewsPost(): ?int
    {
        return $this->viewsPost;
    }

    public function setViewsPost(?int $viewsPost): self
    {
        $this->viewsPost = $viewsPost;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|BlogImage[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(BlogImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setBlogPost($this);
        }

        return $this;
    }

    public function removeImage(BlogImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getBlogPost() === $this) {
                $image->setBlogPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlogComment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(BlogComment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setBlogPost($this);
        }

        return $this;
    }

    public function removeComment(BlogComment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getBlogPost() === $this) {
                $comment->setBlogPost(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?BlogCategory
    {
        return $this->category;
    }

    public function setCategory(?BlogCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|BlogTag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(BlogTag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(BlogTag $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->publishedAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function setSlugValue()
    {
        $this->slug = Blog::slugify($this->getTitle());
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getFiles(): ?array
    {
        return $this->files;
    }

    public function setFiles(array $files): self
    {
        $this->files = $files;

        return $this;
    }

}
