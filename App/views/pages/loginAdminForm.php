<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Đăng Nhập</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="/public/css/formLogin.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5>Đăng Nhập</h5>
        </div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label for="username">Tên người dùng:</label>
              <input type="text" class="form-control" id="username" name="username" >
              <p class="text-danger"><?=(isset($data['validate']['validateUsername'])?$data['validate']['validateUsername']:"") ?></p>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu:</label>
              <input type="password" class="form-control" id="password" name="password" >
              <p class="text-danger"><?=(isset($data['validate']['validatePass'])?$data['validate']['validatePass']:"") ?></p>
              
            </div>
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            <button type="submit" class="btn btn-primary"><a href="/ForgetPassword">Quên Mật Khẩu</a></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$content = ob_get_clean(); 
echo $content; 
?>