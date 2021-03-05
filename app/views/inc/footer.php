<!-- start footer Area -->
<div class="col-md-12 text-right consult_backToTop">
    <div class="footer__item"><a href="#" id="back-to-top"> <i class="fa fa-angle-up" aria-hidden="true"> </i><span> Back To Top</span></a></div>
</div>
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Navigation</h6>
                    <div class="row">
                        <div class="col">
                            <ul class="list-unstyled">
                                <?php
                                foreach ($data['menu'] as $menu) : ?>
                                    <li class="nav-item current-menu-item text-capitalize">
                                        <a class="" href="<?php echo URLROOT . '/' . $menu->menu_link; ?>"><i class="<?php echo $menu->menu_icon; ?> fa-fw"></i> <?php echo $menu->menu_name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow me</h6>
                        <ul class="list-unstyled pl-1">
                        <?php if (!empty($data['social']->facebook_so)) : ?>
                            <li class="nav-item text-capitalize">
                            <a id="facebook-page-footer" href="<?php echo $data['social']->facebook_so; ?>" target="_blank"
                               title="<?php echo SITENAME; ?> on Facebook"><i
                                        class="fab fa-facebook fa-fw"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($data['social']->twitter_so)) : ?>
                            <li class="nav-item">
                            <a href="<?php echo $data['social']->twitter_so; ?>" target="_blank"
                               title="<?php echo SITENAME; ?> on Twitter"><i
                                        class="fab fa-twitter fa-fw"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($data['social']->linkedin_so)) : ?>
                            <a id="linkedin-page-footer" href="<?php echo $data['social']->linkedin_so; ?>" target="_blank"
                               title="<?php echo SITENAME; ?> on Linkedin"><i
                                        class="fab fa-linkedin fa-fw"></i></a>
                        <?php endif; ?>
                        <?php if (!empty($data['social']->google_so)) : ?>
                            <li class="nav-item">
                            <a href="<?php echo $data['social']->google_so; ?>" target="_blank"
                               title="<?php echo SITENAME; ?> on google plus"><i
                                        class="fab fa-google-plus-g fa-fw"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($data['social']->instagram_so)) : ?>
                            <li class="nav-item">
                            <a id="instagram-page-footer" href="<?php echo $data['social']->instagram_so; ?>" target="_blank"
                               title="<?php echo SITENAME; ?> on Instagram"><i
                                        class="fab fa-instagram fa-fw"></i></a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($data['social']->quora_so)) : ?>
                            <li class="nav-item">
                            <a id="quora-page-footer" href="<?php echo $data['social']->quora_so; ?>" target="_blank"
                               title="<?php echo SITENAME; ?> on Quora"><i
                                        class="fab fa-quora fa-fw"></i></a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($data['social']->youtube_so)) : ?>
                            <li class="nav-item">
                            <a href="<?php echo $data['social']->youtube_so; ?>" target="_blank"
                               title="<?php echo SITENAME; ?> on Youtube"><i
                                        class="fab fa-youtube fa-fw"></i></a>
                            </li>
                        <?php endif; ?>
                        </ul>

                    <div class="list-inline">
                    <h6>Share me</h6>
                    <a title="Share on Facebook" class="customer share" href="http://www.facebook.com/sharer.php?u=<?php echo URLROOT . '/' . $_GET['url']; ?>"><i class="fab fa-facebook-f fa-fw"></i></a>
                    <a title="Share on Linkedin" class="customer share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo URLROOT . '/' . $_GET['url']; ?>&title="><i class="fab fa-linkedin-in fa-fw"></i></a>
                    <a title="Share on WhatsApp" class="customer share" href=" https://wa.me/?text=<?php echo URLROOT . '/' . $_GET['url']; ?>"><strong><i class="fab fa-whatsapp fa-fw"></i></strong></a>
                    </br>
                    <div class="fb-like mt-2" data-href="https://www.facebook.com/wtrekker/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="mb-20">YouTube Channel</h6>
                    <div class="instafeed d-flex flex-wrap">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLz1ReTgzcSUT1yDqM_f_5mBGzOHkp4Ms-" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

        </div>

        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-sm-12 footer-text m-0 copy">
                <small><?php echo SITENAME; ?> created by <a class="red" href="<?php echo CREATEDBYURL; ?>"><?php echo CREATEDBY; ?></a><span> | <?php echo auto_copyright("2008"); ?> all rights reserved</span>
                    <a class="red" href="<?php echo URLROOT; ?>"><?php echo COPYRIGHT . SITENAMEWITHCOM; ?></a></small>
             </p>
        </div>
    </div>
</footer>
<!-- End footer Area -->


<script src="<?php echo URLROOT; ?>/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/menu.min.js"type="text/javascript" ></script>
<script src="<?php echo URLROOT; ?>/js/fitvids.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/image-reloaded.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/isotope.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/main.js" type="text/javascript"></script>
<script src="<?php echo URLROOT; ?>/js/lightgallery-all.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/lazysizes.min.js" async="" type="text/javascript"></script>

<?php
$ur = $_GET['url'];
if(!$ur) { ?>
<script src="<?php echo URLROOT; ?>/js/layerslider/js/greensock.js"></script>
<script src="<?php echo URLROOT; ?>/js/layerslider/js/layerslider.transitions.js"></script>
<script src="<?php echo URLROOT; ?>/js/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<?php } ?>

<script>

    $(document).ready(function(){
    // Basic FitVids Test
    $(".fitvids").fitVids();

            $('#lightgallery').lightGallery({
                thumbnail:false,
                animateThumb: true,
                showThumbByDefault: false
            });
    });

</script>
<!-- Initializing the slider -->

<?php if(!$ur) { ?>
<script type="text/javascript">

    $(document).ready(function() {
        $('#slider').layerSlider({
            sliderVersion: '6.0.0',
            responsiveUnder: 0,
            maxRatio: 1,
            slideBGSize: 'auto',
            autoPauseSlideshow: 'false',
            hideUnder: 0,
            hideOver: 100000,
            skin: 'outline',
            thumbnailNavigation: 'disabled',
            skinsPath: '<?php echo URLROOT; ?>/js/layerslider/skins/'
        });
    });

</script>
    
    <?php } ?>

<script>
    <!-- show embeded videos on click inside popup modal -->
    $(document).ready(function() {
        autoPlayYouTubeModal();
    });

    function autoPlayYouTubeModal() {
        var trigger = $('.trigger');
        trigger.click(function(e) {
            e.preventDefault();
            var theModal = $(this).data("target");
            var videoSRC = $(this).attr("src");
            var videoSRCauto = videoSRC + "?autoplay=1";
            $(theModal + ' iframe').attr('src', videoSRCauto);
            $(theModal).on('hidden.bs.modal', function(e) {
                $(theModal + ' iframe').attr('src', '');
            });
        });
    }

</script>
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close btn-round btn-primary" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
</body>
</html>