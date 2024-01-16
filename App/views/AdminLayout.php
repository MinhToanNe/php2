<?php $this->view('blocks/AdminHeader', $data); ?>
<?php require_once "./App/views/pages/" . $data['pages'] . ".php"; ?>
<?php $this->view('blocks/AdminFooter', $data); ?>