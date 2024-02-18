
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm bài viết</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm bài viết</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tiêu đề</label>
                    <input type="text" name="title" class="form-control"  placeholder="Nhập tiêu đề">
                    <p class="text-danger mt-2"><?=isset($data['validate']['TitleValidate'])?$data['validate']['TitleValidate']:""?></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nội dung</label>
                   <textarea id="summernote" name = "content"></textarea>
                   <p class="text-danger mt-2"><?=isset($data['validate']['ContentValidate'])?$data['validate']['ContentValidate']:""?></p>
              </textarea>
                  </div>
                  <div class="form-group">
                    <label >Ảnh</label>
                    <input type="file" name="image" class="form-control pt-1 pl-0 " >
                    <p class="text-danger mt-2"><?=isset($data['validate']['ImageValidate'])?$data['validate']['ImageValidate']:""?></p>
                  </div>
                  <div class="form-group pt-3">
                    <label >Danh mục</label>
                    <select name="category" class ="ml-3" >
                      <?if(isset($data['category'])):?>
                        <?foreach($data['category'] as $category) :?>
                          <option  value="<?=$category['id']?>"><?=$category['name']?></option>
                          <?endforeach?>
                      <?endif?>
                    </select>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
