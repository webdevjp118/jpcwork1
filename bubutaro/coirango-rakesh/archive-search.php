<?php
/* Template Name: Custom Search */        
get_header(); ?> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="contentarea">
        <div class="row">  
            <h3>Search Result for : <?php echo htmlentities($s, ENT_QUOTES, 'UTF-8'); ?> </h3>       
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
            <div class="col-sm-6">
                <div id="post-<?php the_ID(); ?>" class="posts">        
                    <article>   
                        <?php if (has_post_thumbnail( get_the_ID()) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <div id="custom-bg" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                            </a>
                        <?php endif; ?>
                        <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4> 
                        <span> Post By <?php the_author(); ?>    
                         | Date : <?php echo date('j F Y'); ?></span>    
                        <div class="text"><?php the_excerpt(); ?></div>        
                        <p align="right" class="right"><a href="<?php the_permalink(); ?>">Read     More</a></p>    
                        
                    </article><!-- #post -->    
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
</div><!-- contentarea -->  
<style>
    .contentarea{
        width:80%;
        margin: 0 auto;
    }
    
    #custom-bg{
        height: 300px;
        width: 525px;
        background-size: cover;
        background-position: center;
    }
    
    .posts h4 a{
        font-size: 38px;
        font-weight: 600;
        color: #cd2653;
    }
    
    .text p{
        font-size: 20px;
        text-align: justify;
    }
    
    .text{
        height:220px;
    }
    
    .right a{
        color: #cd2653;
    }
    
    .col-sm-6 {
        padding-top: 15px;
    }
</style>
<?php get_footer(); ?>