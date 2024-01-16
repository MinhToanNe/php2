
<?php $this->view('blocks/HeaderClient', $data); ?>
<?php require_once "./App/views/pages/" . $data['pages'] . ".php"; ?>
<?php $this->view('blocks/FooterClient', $data); ?>