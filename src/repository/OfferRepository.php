<?php

use exceptions\UnknownUsersException;

require_once 'Repository.php';
require_once __DIR__ . '/../models/Offer.php';

class OfferRepository extends Repository
{
    public function getOffer(int $id): ?Offer
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.offers WHERE id_offer = :id_offer
        ');
        $stmt->bindParam(':id_offer', $id, PDO::PARAM_INT);
        $stmt->execute();

        $offer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($offer == false) {
            return null;
        }

        return new Offer(
            $offer['title'],
            $offer['localisation'],
            $offer['animals'],
            $offer['plants'],
            $offer['cleaning'],
            $offer['house_care'],
            $offer['available_from'],
            $offer['available_to'],
            $offer['description'],
            $offer['requirements_description'],
            $offer['img'],
            $offer['offer_user_id'],
            $offer['id_offer']
        );
    }

    public function addOffer(Offer $offer): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO offers (
                               offer_user_id,
                               title,
                               description,
                               available_from,
                               available_to,
                               requirements_description,
                               img,
                               localisation,
                               animals,
                               plants,
                               cleaning,
                               house_care)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');


        $stmt->execute([
            $offer->getUserId(),
            $offer->getTitle(),
            $offer->getOfferDescription(),
            $offer->getAvailableFrom(),
            $offer->getAvailableTo(),
            $offer->getRequirementsDescription(),
            $offer->getImage(),
            $offer->getLocalization(),
            $offer->getAnimals(),
            $offer->getPlants(),
            $offer->getCleaning(),
            $offer->getHouseCare(),
        ]);
    }

    public function getOffers(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM offers
        ');

        $stmt->execute();
        $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($offers as $offer) {
            $result[] = new Offer(
                $offer['title'],
                $offer['localisation'],
                $offer['animals'],
                $offer['plants'],
                $offer['cleaning'],
                $offer['house_care'],
                $offer['available_from'],
                $offer['available_to'],
                $offer['description'],
                $offer['requirements_description'],
                $offer['img'],
                $offer['offer_user_id'],
                $offer['id_offer']
            );
        }

        return $result;
    }

    public function getAvailableOffers(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM offers
        ');

        $stmt->execute();
        $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($offers as $offer) {
            if ($offer['available'])
                $result[] = new Offer(
                    $offer['title'],
                    $offer['localisation'],
                    $offer['animals'],
                    $offer['plants'],
                    $offer['cleaning'],
                    $offer['house_care'],
                    $offer['available_from'],
                    $offer['available_to'],
                    $offer['description'],
                    $offer['requirements_description'],
                    $offer['img'],
                    $offer['offer_user_id'],
                    $offer['id_offer']
                );
        }

        return $result;
    }

    public function bookOffer($offerId, $userId) {

        $stmt = $this->database->connect()->prepare('
            UPDATE offers SET available = false WHERE id_offer = :id_offer
        ');

        $stmt->bindParam(':id_offer', $offerId, PDO::PARAM_INT);


        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO assigned_offers (
                     id_offer,
                     id_user)
            VALUES (?, ?)
        ');


        $stmt->execute([
            $offerId,
            $userId
        ]);
    }

    public function getOfferByLocalisation(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM offers WHERE LOWER(title) LIKE :search OR LOWER(localisation) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}