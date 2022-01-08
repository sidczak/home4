<?php

namespace App\Entity;

class BasicValidators
{
    private $username;

    private $email;

    private $gender;

    private $internetBrowsers;

    private $operatingSystem;

    private $languages;

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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

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

}
