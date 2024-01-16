
<?php $this->view('blocks/HeaderClient', $data); ?>
<?php require_once "./App/view/pages/" . $data['pages'] . ".php"; ?>
<?php $this->view('blocks/FooterClient', $data); ?>