<?php

use exceptions\UnknownUsersException;

require_once 'Repository.php';
require_once __DIR__.'/../models/Offer.php';

class OfferRepository extends Repository
{
    public function getOffer(int $id): ?Offer {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.offer WHERE id = :id_offer
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
            $offer['$available_from'],
            $offer['$available_to'],
            $offer['description'],
            $offer['requirements_description'],
            $offer['img'],
            $offer['offer_user_id']
        );
    }

    public function addOffer(Offer $offer) : void {
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

        $id_user = 1;

        echo $offer->getAnimals();
        $stmt->execute([
            $id_user,
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

    public function getOffers() : array {
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
                $offer['offer_user_id']
            );
        }

        return $result;
    }
}