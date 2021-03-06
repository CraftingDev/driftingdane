<div id="page-content"><!-- Needed for sticky footer-->
    <main role="main">
     <div class="container">
         <div class="row mt-5">
             <div class="col-md-12 mt-5">
                 <h1 class="text-center text-uppercase mt-5"><i class="fas fa-wave-square color-orange-text fa-rotate-180"></i>
                     Sto<span class="color-orange-text">ries</span> <i class="fas fa-wave-square fa-rotate-90"></i></h1>
             </div>
            <!-- Section -->
            <section class="md-section">
                <div class="container">
                    <!-- layout-blog sidebar-left -->
                    <div class="layout-blog sidebar-left">
                        <div class="layout-blog__content">
                            <?php
                            foreach ($data['posts'] as $post) :
                                    $postImg = check_for_webp_version($post->ps_img);
                                if ($post->is_published === "YES") :
                                ?>
                                <!--  -->
                                <div class="post-01__style-02 md-text-center">
                                    <div class="post-01__media">
                                        <a href="<?php echo URLROOT . '/stories/show/' . $post->ps_slug . '/' . cleanerUrl($post->ps_title . ' ' . $post->ps_sub_title); ?>">
                                            <img class="img-fluid" src="<?php echo URLROOT . '/storyImg/feat/' . $postImg; ?>" alt="<?php echo $postImg; ?>">
                                        </a>
                                    </div>
                                    <div>
                                        <h4 class="post-01__categories color-orange-text">
                                            <?php echo $post->ps_cat_name; ?>
                                            <!--<a href="<?php echo URLROOT . '/categories/' . $post->ps_cat_slug . '/' . cleanerUrl($post->ps_cat_name); ?>"><?php echo $post->ps_cat_name; ?></a>-->
                                        </h4>
                                        <h2 class="post-01__title"><a
                                                    href="<?php echo URLROOT . '/stories/show/' . $post->ps_slug . '/' . cleanerUrl($post->ps_title . ' ' . $post->ps_sub_title); ?>"><?php echo $post->ps_title . '<span class="sep_color"> | </span>' . $post->ps_sub_title; ?></a>
                                        </h2>
                                        <div class="post-01__time">Put in writing on:</div>
                                        <div class="post-01__note"><?php echo infoDate($post->ps_created); ?>.</div>
                                        <div class="post-01__time">&nbsp;Updated:</div>
                                        <div class="post-01__note"><?php echo infoDate($post->ps_updated); ?>.</div>
                                        <div class="post-01__time">&nbsp;By:</div>
                                        <div class="post-01__note"><?php echo ucwords($post->us_first . '&nbsp;' . $post->us_last); ?></div>
                                    </div>
                                </div><!-- End /  -->
                            <?php endif; endforeach; ?>

                        </div>


                        <?php require APPROOT . '/views/stories/inc/sidebar.php'; ?>


                    </div><!-- End / layout-blog sidebar-left -->

                </div>
            </section>
            <!-- End / Section -->
        </div>
        <!-- End / Content-->



         </div>


     </div>

    </main>
</div><!-- Page id ends sticky footer-->


