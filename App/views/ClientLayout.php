
<?php $this->render('blocks/HeaderClient', $data); ?>
<?php require_once "./App/views/pages/" . $data['pages'] . ".php"; ?>
<?php $this->render('blocks/FooterClient', $data); ?>