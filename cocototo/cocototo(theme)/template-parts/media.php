<?php /* Template Name: Media*/ ?>
<?php 
get_header(); 
?>
<main id="primary" class="site-main">


<section class="heading_image_section inner_page_heading_image_section full_height_section">
        <h1>Media</h1>
    </section>
    <!-- about_media_section -->
    <section class="media_section">
        <div class="small_custom_container">
            <div class="breadcrumb_sec">
                <ul>
                    <li>
                        <a href="<?php echo get_site_url(); ?>">COCOTOTO</a>
                    </li>
                    <li>
                        <a href="#" class="active_breadcrumb">media</a>
                    </li>
                </ul>
            </div>
            <div class="about_media_sec">
                <div class="heading_text">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cocototo-heading-image-white.png">
                    <h2>About Media</h2>
                </div>
                <div class="about_media_inner">
                    <p class="about_media_text_inner">健康や環境にいいコトしたい⼈集まれ</p>
                    <p>COCOTOTO MEDIAでは、健康や環境に優しい活動をしている仲間が<br>
                    5つのグループ（飲み物・⾷べ物・⽇⽤品・⾐類・⾏動）に関連する<br>
                    ケンカツの紹介することであなたのケンカツをサポートします。</p>
                </div>
                <div class="about_blue_box">
                    <div class="about_blue_box_heading">
                        <h5><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-icon-1.png">こんな方におすすめです。</h5>
                    </div>
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-icon-2.png"> 自分に合った簡単にできるケンカツ方法を知りたい</p>
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-icon-2.png"> 今より意欲的にケンカツをしたい</p>
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-icon-2.png"> ネットで調べても結局どれがいいのかわからない</p>
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-icon-2.png"> ケンカツの紹介をみんなに共有したい</p>
                </div>
                <div class="about_media_inner_text">
                    <p>投稿者のプロフィールやケンカツ記事を見ながら<br class="cpc6">
                    あなたに適した記事を参考にすることができます。</p>
                </div>
                <div class="article_about_section">
                    <div class="article_about_box_sec">
                        <div class="article_about_box_inner">
                            <div class="article_desc">
                                <p>
                                    食べ物や飲み物、毎日使う日用品や衣類、<br>
                                    また、<font color="#f30e63">ひとりひとりの日々の行動は、<br>
                                    わずかではあっても長い目でみると健康や環境に影響があります。</font><br>
                                    まずは、活動記事を読んでみることから<br class="csp6"><font color="00a0de">ケンカツ</font>を始めてください。<br>
                                </p>
                            </div>
                            <div class="animal_list">
                                <div class="animal_row">
                                    <div class="animal_col aclick">
                                        <div class="animal_click">
                                            <p>気になるカテゴリーの<br>
                                                アイコンをクリックして<br>
                                                ケンカツ記事⼀覧へ<br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="animal_col stork js_button" data-href="<?php echo get_site_url(); ?>/media-list/?cd=コウノトリ">
                                        <div class="animal_img stork"></div>
                                        <div class="animal_text">
                                            <p class="animal_thname">飲み物</p>
                                            <p class="animal_jpname">コウノ<br>トリ</p>
                                            <p class="animal_engname">Stork</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="animal_row">
                                    <div class="animal_col leopard js_button" data-href="<?php echo get_site_url(); ?>/media-list/?cd=ツシマヤマネコ">
                                        <div class="animal_img stork"></div>
                                        <div class="animal_text">
                                            <p class="animal_thname">食べ物</p>
                                            <p class="animal_jpname">ツシマ<br>ヤマネコ</p>
                                            <p class="animal_engname"><nobr>Tsushima Leopard Cat</nobr></p>
                                        </div>
                                    </div>
                                    <div class="animal_col otter js_button" data-href="<?php echo get_site_url(); ?>/media-list/?cd=ラッコ">
                                        <div class="animal_img stork"></div>
                                        <div class="animal_text">
                                            <p class="animal_thname">日用品</p>
                                            <p class="animal_jpname"><br>ラッコ</p>
                                            <p class="animal_engname">Sea Otter</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="animal_row">
                                    <div class="animal_col turtle js_button" data-href="<?php echo get_site_url(); ?>/media-list/?cd=アオウミガメ">
                                        <div class="animal_img"></div>
                                        <div class="animal_text">
                                            <p class="animal_thname">衣類</p>
                                            <p class="animal_jpname">アオ<br>ウミガメ</p>
                                            <p class="animal_engname">Green Turtle</p>
                                        </div>
                                    </div>
                                    <div class="animal_col bear js_button" data-href="<?php echo get_site_url(); ?>/media-list/?cd=ツキノワグマ">
                                        <div class="animal_img"></div>
                                        <div class="animal_text">
                                            <p class="animal_thname">行動</p>
                                            <p class="animal_jpname">ツキノ<br>ワグマ</p>
                                            <p class="animal_engname">Asiatic Black Bear</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="all_animals js_button" data-href="<?php echo get_site_url(); ?>/media-list/">
                                <div class="all_animals_img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_stork_circle_text.svg"></div>
                                <div class="all_animals_img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_leopard_circle_text.svg"></div>
                                <div class="all_animals_img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_otter_circle_text.svg"></div>
                                <div class="all_animals_img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_turtle_circle_text.svg"></div>
                                <div class="all_animals_img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_bear_circle_text.svg"></div>
                                <div class="all_animals_text"><p>すべての<br>ケンカツ<br>記事⼀覧へ</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->
<?php
get_footer();