<?php get_header(); ?>

<div class="news-block-np">
    <div class="news-overlay-np">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 news-block-in-np">
                    <div class="common-title-hp">
                        <h2>NEWS</h2>
                        <p>お知らせ一覧</p>
                    </div>
                    <div class="news-middle-np">
                        <?php
                        
                        $args = array(
                            'post_type' => 'post',
                        );

                        $news_query = new WP_Query($args);
                        if($news_query->have_posts()):
                            while($news_query->have_posts()):
                                $news_query->the_post();
                        
                        ?>
                            <div class="news-box-np">
                                <div class="news-name-np"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
                                <div class="news-date-np"><?php echo get_the_date('Y/m/d'); ?></div>
                                <div class="news-details-np">
                                <?php
                                    if(has_post_thumbnail()):
                                ?>
                                    <div class="news-details-left-np">
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            <?php echo the_post_thumbnail();?>
                                        </a>
                                    </div>
                                <?php
                                    endif;
                                ?>
                                    <div class="news-details-right-np">
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>

<?php get_footer(); ?>