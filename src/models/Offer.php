<?php

class Offer
{
    private $title;
    private $localization;
    private $animals;
    private $plants;
    private $cleaning;
    private $houseCare;
    private $availableFrom;
    private $availableTo;
    private $offerDescription;
    private $requirementsDescription;
    private $image;
    private $userId;

    public function __construct(
        $title
        , $localization
        , $animals
        , $plants
        , $cleaning
        , $houseCare
        , $availableFrom
        , $availableTo
        , $offerDescription
        , $requirementsDescription
        , $image
        , $userId)
    {
        $this->title = $title;
        $this->localization = $localization;
        $this->animals = $animals;
        $this->plants = $plants;
        $this->cleaning = $cleaning;
        $this->houseCare = $houseCare;
        $this->availableFrom = $availableFrom;
        $this->availableTo = $availableTo;
        $this->offerDescription = $offerDescription;
        $this->requirementsDescription = $requirementsDescription;
        $this->image = $image;
        $this->userId = $userId;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getLocalization() : string
    {
        return $this->localization;
    }

    public function setLocalization(string $localization)
    {
        $this->localization = $localization;
    }

    public function getAnimals()
    {
        if ($this->animals == "")
            return 0;
        else
            return $this->animals;
    }

    public function setAnimals(bool $animals)
    {
        $this->animals = $animals;
    }

    public function getPlants()
    {
        if ($this->plants == "")
            return 0;
        else
            return $this->plants;
    }

    public function setPlants(bool $plants)
    {
        $this->plants = $plants;
    }

    public function getCleaning()
    {
        if ($this->cleaning == "")
            return 0;
        else
            return $this->cleaning;
    }

    public function setCleaning(bool $cleaning)
    {
        $this->cleaning = $cleaning;
    }

    public function getHouseCare()
    {
        if ($this->houseCare == "")
            return 0;
        else
            return $this->houseCare;
    }

    public function setHouseCare(bool $houseCare)
    {
        $this->houseCare = $houseCare;
    }

    public function getAvailableFrom() : string
    {
        return $this->availableFrom;
    }

    public function setAvailableFrom(string $availableFrom)
    {
        $this->availableFrom = $availableFrom;
    }

    public function getAvailableTo() : string
    {
        return $this->availableTo;
    }

    public function setAvailableTo(string $availableTo)
    {
        $this->availableTo = $availableTo;
    }

    public function getOfferDescription() : string
    {
        return $this->offerDescription;
    }

    public function setOfferDescription(string $offerDescription)
    {
        $this->offerDescription = $offerDescription;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getRequirementsDescription()
    {
        return $this->requirementsDescription;
    }

    public function setRequirementsDescription($requirementsDescription): void
    {
        $this->requirementsDescription = $requirementsDescription;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }
}