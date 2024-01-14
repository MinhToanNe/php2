<?php $this->view('blocks/HeaderClient', $data); ?>
<?php require_once "./mvc/view/pages/" . $data['pages'] . ".php"; ?>
<?php $this->view('blocks/FooterClient', $data); ?>