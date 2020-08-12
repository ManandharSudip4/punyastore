<?php
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    $header = 'Contact';
    include 'inc/header.php';
?>

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <?php
                $ContactInfo = new contactinfo();
                $contactinfos = $ContactInfo->getAllContactinfo();
                $contact = $contactinfos[0];
                // debugger($contact); 
                ?>
                <iframe
                    src="<?php echo "$contact->maplink" ?>"
                    height="610" style="border:0" allowfullscreen="">
                </iframe>
                
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p><?php echo sanitize(html_entity_decode($contact->description)) ?></p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p><?php echo $contact->address ?></p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <a href="tel:+977986-1287059">
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>+977<?php echo $contact->phone_number ?></p>
                            </div>
                            </a>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <a href="mailto: <?php echo $contact->email ?>">
                            <div class="ci-text">
                                <span>Email:</span>
                                <p><?php echo $contact->email ?></p>
                            </div>
                          </a>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <p>Our staff will call back later and answer your questions.</p>
                            <form action="process/contact" method="post" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="username" placeholder="Your name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="email" placeholder="Your email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="message" placeholder="Your message"></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

<?php
    include 'inc/footer.php';
?>