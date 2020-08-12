<?php
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    $header = 'Blog';
    include 'inc/header.php';
?>

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" placeholder="Search . . .  ">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-catagory">
                            <h4>Categories</h4>
                            <ul>
                                <?php 
                                    $BlogCategory = new blogcategory();
                                    $blogcategories = $BlogCategory -> getAllBlogCategory();
                                    // debugger($blogcategories);
                                    foreach ($blogcategories as $key => $blogcategory) {
                                ?> 
                                <li><a href="blog?id=<?php echo $blogcategory->id ?>"><?php echo $blogcategory->categoryname ?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            <div class="recent-blog">
                                <?php 
                                    $Blog = new blog();
                                    $blogs = $Blog->getAllBlogWithLimit(0,4);
                                    foreach ($blogs as $key => $blog) {
                                ?>  
                                    <a href="blog-details?id=<?php echo $blog->id ?>" class="rb-item">
                                        <div class="rb-pic">
                                            <?php
                                                if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)){
                                                    $thumbnail = UPLOAD_URL.'blog/'.$blog->image;
                                                    // debugger($thumbnail);
                                                }else{
                                                    $thumbnail = UPLOAD_URL.'noimg.png';
                                                }
                                             ?>
                                            <img src="<?php echo $thumbnail ?>" alt="">
                                        </div>
                                        <div class="rb-text">
                                            <h6><?php echo substr($blog->title ,0, 30)."..." ?></h6>
                                            <p>Fashion <span>- May 19, 2019</span></p>
                                        </div>
                                    </a>
                                <?php
                                    }
                                ?>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-2.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-3.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-4.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="blog-tags">
                            <h4>Product Tags</h4>
                            <div class="tag-item">
                                <?php 
                                    $Category = new category();
                                    $categories = $Category->getAllCategory();
                                    // debugger($categories);
                                    foreach ($categories as $key => $category) {
                                ?>
                                    <a href="shop?id=<?php echo $category->id ?>"><?php echo $category->categoryname ?></a>
                                <?php
                                     } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        <?php
                            $blogs = $Blog->getAllBlogWithLimit(0,2);
                            // debugger($blogs);
                            foreach ($blogs as $key => $blog) {
                        ?>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="blog-item">
                                        <div class="bi-pic">
                                             <?php
                                                if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)){
                                                    $thumbnail = UPLOAD_URL.'blog/'.$blog->image;
                                                    // debugger($thumbnail);
                                                }else{
                                                    $thumbnail = UPLOAD_URL.'noimg.png';
                                                }
                                             ?>
                                            <a href="blog-details?id=<?php echo $blog->id ?>">
                                                <img src="<?php echo $thumbnail ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="bi-text">
                                            <a href="blog-details?id=<?php echo $blog->id ?>">
                                                <h4><?php echo $blog->title ?></h4>
                                            </a>
                                            <p><?php echo $blog->category ?><span>- <?php echo date("M d, Y",strtotime($blog->created_date)) ?></span></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-1.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>The Personality Trait That Makes People Happier</h4>
                                    </a>
                                    <p>travel <span>- May 19, 2019</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-2.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>This was one of our first days in Hawaii last week.</h4>
                                    </a>
                                    <p>Fashion <span>- May 19, 2019</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-3.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>Last week I had my first work trip of the year to Sonoma Valley</h4>
                                    </a>
                                    <p>travel <span>- May 19, 2019</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="img/blog/blog-4.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                        <h4>Happppppy New Year! I know I am a little late on this post</h4>
                                    </a>
                                    <p>Fashion <span>- May 19, 2019</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="loading-more">
                                <i class="icon_loading"></i>
                                <a href="#">
                                    Loading More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

<?php
    include 'inc/footer.php';
?>