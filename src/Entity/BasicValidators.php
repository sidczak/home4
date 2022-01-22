<?php

namespace App\Entity;

class BasicValidators
{
    private $firstName;
    
    private $lastName;

    private $username;

    private $email;

    private $website;
    
    private $password;

    private $gender;

    private $age;
    
    private $birthday;

    private $internetBrowsers;

    private $operatingSystem;

    private $languages;

    private $programmingLanguages;

    private $comment;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $publishedAt): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getInternetBrowsers(): ?string
    {
        return $this->internetBrowsers;
    }

    public function setInternetBrowsers(string $internetBrowsers): self
    {
        $this->internetBrowsers = $internetBrowsers;

        return $this;
    }

    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    public function setOperatingSystem($operatingSystem): self
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    public function getLanguages(): ?array
    {
        return $this->languages;
    }

    public function setLanguages(array $languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    public function getProgrammingLanguages(): ?array
    {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages(array $programmingLanguages): self
    {
        $this->programmingLanguages = $programmingLanguages;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

}
