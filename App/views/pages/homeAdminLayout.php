<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Bài viết</h1>
              <!-- </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Bài viết</li>
              </ol>
            </div> -->
            </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- <div class="card-header">
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Thể loại</th>
                        <th>Image</th>
                        <th>Người thêm</th>
                        <th>Ngày thêm</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($data['BlogList'])) : ?>
                        <?php $stt = 0 ?>
                        <?php foreach ($data['BlogList'] as $Blog) : ?>
                          <?php $stt++ ?>
                          <td ><?= $stt ?></td>
                          <td class="text-wrap"><?= $Blog['title'] ?></td>
                          <td><?= $Blog['name'] ?></td>
                          <td><img src="<?= $Blog['image'] ?>" style= "width:150px; height:100px;" alt="Đang cập nhật"></td>
                          <td><?= $Blog['user_name'] ?></td>
                          <td><?= substr($Blog['created_at'],0,10) ?></td>
                          <td class = row>
                            <a class="btn btn-primary col-5" href="/admin/edit?id=<?=$Blog['id']?>">Sửa</a>
                            <form class="col" method="post" action = "/admin/delete">
                                <input name="id" type="hidden" value="<?= $Blog['id'] ?>">
                                <button type ="submit" class = "btn btn-danger">Xóa</button>
                            </form>
                          </td>
                    </tbody>
                  <?php endforeach ?>
                <?php endif ?>
                  </table>
                  <ul class="pagination pagination-primary">
                  <?php if(!isset($_GET['page']))
                {
                    $_GET['page'] = 1;
                }
                ?>
                <li class="page-item"><a class="page-link" href="/admin?page=<?= ($_GET["page"] > 1 ? $_GET["page"] - 1 : 1) ?>">Previous</a></li>
                <?php if (isset($data['TotalPage'])) : ?>
                    <?php for ($page = 1; $page <= $data['TotalPage']; $page++) : ?>
                        <li class="page-item active ml-2"><a class="page-link" href="/admin?page=<?= $page ?>"><?= $page ?></a></li>
                    <?php endfor ?>
                <?php endif ?>
                <li class="page-item ml-2"><a class="page-link" href="/admin?page=<?= $_GET["page"] < $data['TotalPage'] ? $_GET["page"] + 1 : $data['TotalPage'] ?>">Next</a></li>
            </ul>
                </div>
                
                
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->

          <!-- /.row -->

          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->