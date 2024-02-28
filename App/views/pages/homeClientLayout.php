<div id="main-content" class="blog-page">

    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 left-box">
            <?php if (isset($data['Blog'])) : ?>
                <?php foreach ($data['Blog'] as $Blog) : ?>
                    <div class="card single_post">
                        <div class="body">
                            <div class="img-post">
                                <img class="d-block img-fluid" src="<?= $Blog['image'] ?>" alt="First slide">
                            </div>
                            <h3><a href="/home/detailBlog?id=<?= $Blog['id']?>"><?= $Blog['title'] ?></a></h3>
                        </div>
                        <div class="footer">
                            <div class="actions">
                                <a href="/home/detailBlog?id=<?= $Blog['id']?>" class="btn btn-outline-secondary">Đọc</a>
                            </div>
                            <ul class="stats">
                                <li><a href="javascript:void(0);">General</a></li>
                                <li><a href="javascript:void(0);" class="fa fa-heart">28</a></li>
                                <li><a href="javascript:void(0);" class="fa fa-comment">128</a></li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>


            <ul class="pagination pagination-primary">
                <?php if(!isset($_GET['page']))
                {
                    $_GET['page'] = 1;
                }
                ?>
                <li class="page-item"><a class="page-link" href="<?= $data['href']?><?= ($_GET["page"] > 1 ? $_GET["page"] - 1 : 1) ?>">Previous</a></li>
                <?php if (isset($data['TotalPage'])) : ?>
                    <?php for ($page = 1; $page <= $data['TotalPage']; $page++) : ?>
                        <li class="page-item active ml-2"><a class="page-link" href="<?=$data['href']?><?= $page ?>"><?= $page ?></a></li>
                    <?php endfor ?>
                <?php endif ?>
                <li class="page-item ml-2"><a class="page-link"  href="<?= $data['href']?><?= $_GET["page"] < $data['TotalPage'] ? $_GET["page"] + 1 : $data['TotalPage'] ?>">Next</a></li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-12 right-box">
            <div class="card">
                <form action="/">
                    <div class="body search">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" name = "SearchKey" class="form-control" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="header">
                    <h2>Danh mục</h2>
                </div>
                <div class="body widget">
                    <ul class="list-unstyled categories-clouds m-b-0">
                        <?php if (isset($data['Category'])) : ?>
                            <?php foreach ($data['Category'] as $Category) :  ?>
                                <li><a href="/?category_id=<?= $Category['id'] ?>"><?= $Category['name'] ?></a></li>
                            <?php endforeach ?>
                        <?php endif ?>

                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>Bài viết gần đây</h2>
                </div>
                <div class="body widget popular-post">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (isset($data['RecentBlog'])) : ?>
                                <?php foreach ($data['RecentBlog'] as $RecentBlog) : ?>
                                    <a href="/home/detailBlog?id=<?= $RecentBlog['id']?>" style="text-decoration: none;; color: inherit">
                                        <div class="single_post">
                                            <p class="m-b-0"><?= $RecentBlog['title'] ?></p>
                                            <span><?= getTimeElapsedString($RecentBlog['created_at']) ?></span>
                                            <div class="img-post">
                                                <img src="<?= $RecentBlog['image'] ?>" alt="Awesome Image" style="width:300px;height:200px">
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach ?>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>