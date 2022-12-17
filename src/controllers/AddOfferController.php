<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Offer.php';

class AddOfferController extends AppController {
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];
    public function addOffer()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['temp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['temp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $offer = new Offer(
                $_POST['title']
                , $_POST['localization']
                , $_POST['animals']
                , $_POST['plants']
                , $_POST['cleaning']
                , $_POST['houseCare']
                , $_POST['availableFrom']
                , $_POST['availableTo']
                , $_POST['offerDescription']
                , $_FILES['file']['name']);


            return $this->render('offers', ['messages' => $this->message, 'offer' => $offer]);
        }

        return $this->render('add-offer', ['messages' => $this->message]);
    }

    private function validate(array $file) : bool{
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