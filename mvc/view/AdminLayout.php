<?php $this->view('blocks/AdminHeader', $data); ?>
<?php require_once "./mvc/view/pages/" . $data['pages'] . ".php"; ?>
<?php $this->view('blocks/AdminFooter', $data); ?>