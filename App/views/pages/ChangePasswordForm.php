
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/css/formLogin.css">
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
         <h5>  Đổi mật khẩu</h5>
        </div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label for="username">Mật khẩu mới</label>
              <input type="password" class="form-control" id="password" name="password" >
              <p class="text-danger"><?=(isset($data['validate']['validatePass'])?$data['validate']['validatePass']:"") ?></p>
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
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
