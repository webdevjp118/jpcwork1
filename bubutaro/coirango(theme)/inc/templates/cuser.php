<?php /* Template Name: Cuser*/ ?>
<?php 
get_header(); 
if(!is_user_activated()) {
    wp_redirect(get_site_url().'/login');
}
?>
<div class="gbanner-sec">
    <h1>プロフィール</h1>
</div>
    <main id="primary" class="site-main">

<div class="pg8">
    <div class="c-container">
<?php
    global $current_user, $wp_roles;
    $user_id = $current_user->ID;
    $user_data = $current_user;
    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];
        $user_data =  get_userdata($user_id);  
    }
    $user_id = $user_data->ID;
    $user_editlink = get_site_url().'/cuser-edit?id='.$user_id;
    $user_fullname = $user_data->first_name.' '.$user_data->last_name;
    $user_registered = date('Y.m.d', strtotime($user_data->user_registered));
    $user_favorlaundry = get_user_meta($user_id, 'favor_laundry', true);
    $user_usedyear = get_user_meta($user_id, 'used_year', true);
    $user_usedmonth = get_user_meta($user_id, 'used_month', true);
    $user_bio = get_user_meta($user_id, 'bio', true);
    $user_weburl = get_user_meta($user_id, 'web_url', true);
    $home_laundry = "";
?>
    <article class="profileinfo-sec">
        <div class="profile-header">
            <figure class="image">
                <img width="340" height="200" src="https://konome-hoikuen.com/cms/wp-content/uploads/2019/11/hitomi-1-340x200.jpg" class="attachment-340x200 size-340x200 wp-post-image" alt="このめほいくえん　ひとみ先生" srcset="https://konome-hoikuen.com/cms/wp-content/uploads/2019/11/hitomi-1-340x200.jpg 340w, https://konome-hoikuen.com/cms/wp-content/uploads/2019/11/hitomi-1-300x176.jpg 300w, https://konome-hoikuen.com/cms/wp-content/uploads/2019/11/hitomi-1-768x452.jpg 768w, https://konome-hoikuen.com/cms/wp-content/uploads/2019/11/hitomi-1.jpg 1020w" sizes="(max-width: 340px) 100vw, 340px">							</figure>
            <div class="name-div">
                <h2 class="name"><span><?php echo $user_registered; ?> 登録</span> <?php echo $user_fullname; ?></h2>
                <div class="tonttu-div">
                    <div class="tonttu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tonttu_color.svg"></div>
                    <span class="tonttu-cap">トントゥ</span>
                    <span class="tonttu-value">350</span>
                </div>
                <p class="modify-wrap"><a href="<?php echo $user_editlink; ?>" class="modify-info c-btn c-btn_green c-btn_noarrow">プロフィール編集</a></p>
            </div>
        </div>
		<table class="info-table">
			<tbody>
                <tr>
                    <th>サウナ歴</th>
                    <td><?php echo $user_usedyear; ?>年 <?php echo $user_usedmonth; ?>ヶ月</td>
				</tr>
                <tr>
                    <th>ホーム</th>
                    <td></td>
                </tr>
                <tr>
                    <th>好きなサウナ</th>
                    <td><?php echo $user_favorlaundry; ?></td>
                </tr>
                <tr>
                    <th>プロフィール</th>
                    <td><?php echo $user_bio; ?></td>
                </tr>
                <tr>
                    <th>リンク</th>
                    <td><a href="<?php echo $user_weburl; ?>"><?php echo $user_weburl; ?></a></td>
                </tr>
            </tbody>
        </table>

    </div><!-- c-container -->
</div><!-- pg8 -->
    </main><!-- #main -->

<?php
get_footer();