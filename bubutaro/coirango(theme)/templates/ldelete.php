<?php /* Template Name: LDelete*/ ?>
<?php 
get_header(); 
?>
<div class="gbanner-sec">
    <h1></h1>
</div>
    <main id="primary" class="site-main">

<div class="pg8">
    <div class="c-container">
<article class="profileinfo-sec">
    <style>

    </style>
<?php
    if(!is_user_activated()) {
        wp_redirect(get_site_url().'/login');
        exit;
    }

    if(isset($_GET['id'])):
        $post_id = $_GET['id'];
        $content_post = get_post($post_id);
        $laundry_name = $content_post->post_title;
        wp_delete_post($post_id);
?>
    <p style="text-align:center;">
        店舗「<?php echo $laundry_name; ?>」を削除しました。<br>
        <br>
        コイランＧＯを、引き続きお楽しみください。
        <br>
    </p>
    <p style="text-align:center;"><a style="color:#0000EE; text-decoration:underline" href="<?php echo get_site_url(); ?>/lsearch/">戻る</a></p>
<?php 
    else:
?>
    <p style="text-align:center;">
        店舗情報がないです。<br>
        <br>
    </p>
    <p style="text-align:center;"><a style="color:#0000EE; text-decoration:underline" href="<?php echo get_site_url(); ?>/lsearch/">戻る</a></p>
<?php
    endif;
?>
</article>
    </div><!-- c-container -->
</div><!-- pg8 -->
    
    
    </main><!-- #main -->

<?php
get_footer();