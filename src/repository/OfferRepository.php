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
}