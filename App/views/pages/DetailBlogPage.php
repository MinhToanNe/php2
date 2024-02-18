<link rel="stylesheet" href="/public/css/blogDetail.css">
<div id="main-content" class="blog-page">

    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 left-box">
            <? if(isset($data['Blog'])): ?>
                <? foreach($data['Blog'] as $Blog):?>
            <div class="card single_post">
                <article class="article">
                    <div class="article-img">
                        <img src="/<?=$Blog['image']?>" title="" alt="">
                    </div>
                    <div class="article-title">
                        <h2><?=$Blog['title']?></h2>
                        <div class="media">
                            <div class="media-body">
                                <span><?=substr($Blog['created_at'],0,10)?></span>
                            </div>
                        </div>
                    </div>
                    <div class="article-content">
                        <p><?=$Blog['content']?></p>
                    </div>
                </article>
            </div>
            <? endforeach ?>
            <? endif ?>
        </div>
        <div class="col-lg-4 col-md-12 right-box">
            <div class="card">
                <form action="/">
                    <div class="body search">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" name="SearchKey" class="form-control" placeholder="Tìm kiếm...">
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
                        <? if (isset($data['Category'])) : ?>
                            <? foreach ($data['Category'] as $Category) :  ?>
                                <li><a href="/?category_id=<?= $Category['id'] ?>"><?= $Category['name'] ?></a></li>
                            <? endforeach ?>
                        <? endif ?>

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
                            <? if (isset($data['RecentBlog'])) : ?>
                                <? foreach ($data['RecentBlog'] as $RecentBlog) : ?>
                                    <a href="/home/detailBlog?id=<?= $RecentBlog['id'] ?>" style="text-decoration: none;; color: inherit">
                                        <div class="single_post">
                                            <p class="m-b-0"><?= $RecentBlog['title'] ?></p>
                                            <span><?= getTimeElapsedString($RecentBlog['created_at']) ?></span>
                                            <div class="img-post">
                                                <img src="/<?= $RecentBlog['image'] ?>" alt="Awesome Image" style="width:300px;height:200px">
                                            </div>
                                        </div>
                                    </a>
                                <? endforeach ?>
                            <? endif ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>