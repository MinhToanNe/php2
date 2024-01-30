<?php $this->render('blocks/AdminHeader', $data); ?>
<?php include "./App/views/blocks/navbar.php" ?>
<?php include "./App/views/blocks/sidebar.php" ?>
<?php require_once "./App/views/pages/" . $data['pages'] . ".php"; ?>
<?php $this->render('blocks/AdminFooter', $data); ?>