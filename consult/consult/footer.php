</section>
        <!-- CONTAIN_END -->
        <!-- FOOTER_START -->
        <footer id="footer">
            <div class="back-to-top-hp">
                <a href="#" id="gototop"></a>
            </div>
            <div class="footer-top-hp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-inner-hp">
                            <div class="footer-logo-hp">
                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" alt="" /></a>
                            </div>
                            <div class="footer-navigation-hp">
                                <ul>
                                    <li>
                                        <a href="<?php echo home_url(); ?>/">	
                                        TOP
                                        <div>トップ</div>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo home_url(); ?>/#service">	
                                        SERVICE
                                        <div>事業内容</div>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo home_url(); ?>/#message">	
                                        MESSAGE
                                        <div>メッセージ</div>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo home_url(); ?>/#recruit">	
                                        RECRUIT
                                        <div>求人募集</div>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo home_url(); ?>/#news">	
                                        NEWS
                                        <div>お知らせ</div>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo home_url(); ?>/#information">	
                                        INFORMATION
                                        <div>事業所情報</div>
                                    </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo home_url(); ?>/#entry_form">	
                                        ENTRY FORM
                                        <div>お問い合わせ</div>
                                    </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-hp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-bottom-in-hp">
                            <div class="copyright-hp">©2020 ぎのわん相談支援事業所.All Rights Reserved.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- FOOTER_END -->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/bootstrap.min.js"></script>
    <script>
        $('.youtube-video-hp[data-video]').one('click', function() {
            var $this = $(this);
            var width = $this.attr("width");
            var height = $this.attr("height");
            $this.html('<div class="embed-container"><iframe src="https://www.youtube.com/embed/' + $this.data("video") + '?autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe></div>');
        });
    </script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/custom.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
</body>

</html>