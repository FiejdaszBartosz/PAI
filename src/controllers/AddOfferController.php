<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Offer.php';
require_once __DIR__ . '/../repository/OfferRepository.php';

class AddOfferController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];
    private $offerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->offerRepository = new OfferRepository();
    }

    public function addOffer()
    {
        if (!$this->isPost()) {
            return $this->render('add-offer', ['messages' => $this->message]);
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

            if ($_POST['availableFrom'] != "") {
                $availableFrom = DateTime::createFromFormat('d-m-Y', $_POST['availableFrom'])->format('Y-m-d');
            } else {
                $availableFrom = DateTime::createFromFormat('d-m-Y', '01-01-2023')->format('Y-m-d');
            }

            if ($_POST['availableTo'] != "") {
                $availableTo = DateTime::createFromFormat('d-m-Y', $_POST['availableTo'])->format('Y-m-d');;
            } else {
                $availableTo = DateTime::createFromFormat('d-m-Y', '01-01-2023')->format('Y-m-d');;
            }

            //echo $animals, $cleaning, $plants, $houseCare;

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
                , $_FILES['file']['name']);

            $this->offerRepository->addOffer($offer);


            return $this->render('offers', ['messages' => $this->message, 'offer' => $offer]);
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