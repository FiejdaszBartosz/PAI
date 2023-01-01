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
            $offer['img']
        );
    }

    public function addOffer(Offer $offer) : void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO offer (
                               offer_user_id,
                               title,
                               description,
                               avaible_from,
                               avaible_to,
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

        $stmt->execute([
            $id_user,
            $offer->getTitle(),
            $offer->getOfferDescription(),
            $offer->getAvailableFrom()->format('Y-m-d'),
            $offer->getAvailableTo()->format('Y-m-d'),
            $offer->getRequirementsDescription(),
            $offer->getImage(),
            $offer->getLocalization(),
            $offer->getAnimals(),
            $offer->getPlants(),
            $offer->getCleaning(),
            $offer->getHouseCare(),
        ]);
    }
}