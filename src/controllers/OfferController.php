<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Offer.php';
require_once __DIR__ . '/../repository/OfferRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

use exceptions\UnknownUsersException;

class OfferController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];
    private $offerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->offerRepository = new OfferRepository();
    }

    public function offers()
    {
        $offers = $this->offerRepository->getAvailableOffers();
        $this->render('offers', ['offers' => $offers]);
    }

    public function offerDetails()
    {
        $offerId = $_GET['id'];
        $offer = $this->offerRepository->getOffer($offerId);

        if (!$this->isPost()) {
            return $this->render('offer-details', ['offer' => $offer]);
        }

        if (isset($_POST['submit'])) {
            if (!isset($_COOKIE['user_name']))
                return $this->render('login', ['messages' => ['Aby wynrac musisz byc zalogowany']]);


            $cookie = $_COOKIE['user_name'];

            $userRepository = new UserRepository();
            $user = $userRepository->getUser($cookie);

            $userId = $user->getUserId();

            $this->offerRepository->bookOffer($offerId, $userId);

            return $this->render('main-page');
        }

        return $this->render('offer-details', ['offer' => $offer]);
    }

    public function addOffer()
    {
        if (!$this->isPost()) {
            if (isset($_COOKIE['user_name']))
                return $this->render('add-offer', ['messages' => $this->message]);
            else
                return $this->render('login', ['messages' => ['Aby dodac oferte musisz byc zalogowany']]);
        }


        if (isset($_POST['submit']) && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            if (isset($_POST['animals'])) {
                $animals = true;
            } else {
                $animals = false;
            }

            if (isset($_POST['plants'])) {
                $plants = true;
            } else {
                $plants = false;
            }

            if (isset($_POST['cleaning'])) {
                $cleaning = true;
            } else {
                $cleaning = false;
            }

            if (isset($_POST['houseCare'])) {
                $houseCare = true;
            } else {
                $houseCare = false;
            }

            $availableFromTemp = $_POST['availableFrom'];
            $availableToTemp = $_POST['availableTo'];

            if ($availableFromTemp != "") {
                $availableFrom = date($availableFromTemp);
            } else {
                $availableFrom = date('2023-01-01');
            }

            if ($availableToTemp != "") {
                $availableTo = date($availableToTemp);
            } else {
                $availableTo = date('2023-01-01');
            }

            $cookie = $_COOKIE['user_name'];

            $userRepository = new UserRepository();
            $user = $userRepository->getUser($cookie);

            $id = $user->getUserId();

            $offer = new Offer(
                $_POST['title']
                , $_POST['localization']
                , $animals
                , $plants
                , $cleaning
                , $houseCare
                , $availableFrom
                , $availableTo
                , $_POST['offerDescription']
                , $_POST['requirementsDescription']
                , $_FILES['file']['name']
                , $id
                , -1
            );

            $this->offerRepository->addOffer($offer);


            return $this->render('offers', [
                'messages' => $this->message,
                'offers' => $this->offerRepository->getOffers()]);
        }

        return $this->render('add-offer', ['messages' => $this->message]);

    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}