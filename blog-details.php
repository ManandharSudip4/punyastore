<?php
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    $header = 'Blog';
    if (isset($_GET['id']) && !empty($_GET['id'])) {
            // debugger($_GET,true);
        $blog_id = (int)$_GET['id'];
        if($blog_id){
            $Blog = new blog();
            $blog_info = $Blog->getBlogbyId($blog_id);
            if ($blog_info) {
                $blog_info = $blog_info[0];
                $bread = $blog_info->title ;
                // debugger($blog_info);
                $data = array(
                    'view' => $blog_info->view + 1
                );
                $Blog->updateBlogbyId($data,$blog_id);
            }else{
                redirect('index');
            }
        }else{
            redirect('index');
        }
        }else{redirect('index');
    }
    include 'inc/header.php';
?>

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2><?php echo $blog_info->title ?></h2>
                            <p><?php echo $blog_info->category ?> <span>- <?php echo date("M d, Y",strtotime($blog_info->created_date)) ?></span></p>
                        </div>
                        <div class="blog-large-pic">
                            <?php
                                if (isset($blog_info->image) && !empty($blog_info->image) && file_exists(UPLOAD_PATH.'blog/'.$blog_info->image)){
                                    $thumbnail = UPLOAD_URL.'blog/'.$blog_info->image;
                                    // debugger($thumbnail);
                                }else{
                                    $thumbnail = UPLOAD_URL.'noimg.png';
                                }
                             ?>
                            <img src="<?php echo $thumbnail ?>" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p><?php
                                echo html_entity_decode($blog_info->content);
                            ?>
                            </p>
                        </div>
                        <div class="blog-quote">
                            <p>“<?php echo html_entity_decode($blog_info->quote) ?>” <!-- <span>- Steven Jobs</span> --></p>
                        </div>
                        <!-- <div class="blog-more">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="img/blog/blog-detail-1.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="img/blog/blog-detail-2.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="img/blog/blog-detail-3.jpg" alt="">
                                </div>
                            </div>
                        </div> -->
                        <!-- <p>Sum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p> -->
                        

                        <!-- Share options -->
                        <!-- <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>Travel</li>
                                    <li>Beauty</li>
                                    <li>Fashion</li>
                                </ul>
                            </div>
                            <div class="blog-share">
                                <span>Share:</span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div> -->



                        <!-- Next and Prev Blogs-->
                        <!-- <div class="blog-post">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <a href="#" class="prev-blog">
                                        <div class="pb-pic">
                                            <i class="ti-arrow-left"></i>
                                            <img src="img/blog/prev-blog.png" alt="">
                                        </div>
                                        <div class="pb-text">
                                            <span>Previous Post:</span>
                                            <h5>The Personality Trait That Makes People Happier</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-5 offset-lg-2 col-md-6">
                                    <a href="#" class="next-blog">
                                        <div class="nb-pic">
                                            <img src="img/blog/next-blog.png" alt="">
                                            <i class="ti-arrow-right"></i>
                                        </div>
                                        <div class="nb-text">
                                            <span>Next Post:</span>
                                            <h5>The Personality Trait That Makes People Happier</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> -->


                        <div class="posted-by">
                            <!-- <div class="pb-pic">
                                <img src="img/blog/post-by.png" alt="">
                            </div> -->
                            <div class="row">
                                
                                <div class="pb-text">
                                    <a href="#">
                                        <h5>Written By : Shane Lynch</h5>
                                    </a>
                                </div>
                                <!-- <div class="tag-share">
                                <div class="blog-share">
                                    <span>Share:</span>
                                    <div class="social-links">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    </div>
                                </div>
                                </div> -->
                            </div>
                        </div>
                        
                        <!-- <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <form action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Messages"></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

<?php
    include 'inc/footer.php';
?>