<?php /* Template Name: Report */ ?>

<?php get_header(); ?>

<section class="breadcrumb_section">
    <div class="custom_container">
        <div class="breadcrumb_title">
            <h2>REPORT</h2>
            <p>_攻撃的行為または誹謗中傷行為に関する通報</p>
        </div>
    </div>
    <div class="breadcrumb_path">
        <div class="custom_container">
            <ul>
                <li>
                    <a href="<?php echo get_site_url(); ?>">ホーム</a>
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li>
                    <a href="<?php echo get_site_url(); ?>/contact/">お問い合わせ</a>
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li><span>攻撃的行為または誹謗中傷行為に関する通報</span></li>
            </ul>
        </div>
    </div>
</section>
<section class="report_form_section">
    <div class="custom_container">
        <div class="report_text_content">
            <p>当社に所属するバーチャルライバー、キャスト、タレントに対するストーカー等の攻撃的行為、<br class="cpc">インターネット上での誹謗中傷行為を発見された方は、本通報フォームよりご連絡いただけますと幸いです。</p>
            <p><span>※本フォームよりご通報いただいた内容については、当社内において、対応の要否及び対応の方法を検討させていただきます。<br class="cpc">なお、対応結果に関するご報告は、控えさせていただきますことをご承知おきください。</span></p>
        </div>
        <form class="report_form">
            <div class="single_form_input">
                <div class="custom_row">
                    <div class="label_col">
                        <label>
                            <span class="is_required">必須</span>
                            通報者のお名前
                        </label>
                    </div>
                    <div class="input_col">
                        <input type="text" name="" placeholder="田中太郎">
                    </div>
                </div>
            </div>
            <div class="single_form_input">
                <div class="custom_row">
                    <div class="label_col">
                        <label>
                            <span class="is_required">必須</span>
                            メールアドレス
                        </label>
                    </div>
                    <div class="input_col">
                        <input type="email" name="" placeholder="sample@sample.com">
                    </div>
                </div>
            </div>
            <div class="single_form_input">
                <div class="custom_row">
                    <div class="label_col">
                        <label>
                            <span class="not_required">任意</span>対象のファイル（最大6MB）
                        </label>
                    </div>
                    <div class="input_col">
                        <div class="custom_file_upload">
                            <input type="file" name="" id="report_target_file">
                            <label for="report_target_file">
                                <span>ファイルを選択</span>選択されていません
                            </label>
                            <p>対象の画面のPDFファイル、対象のスクリーンショットの画像をお送りいただく場合はこちらへファイルを添付してください。</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_form_input">
                <div class="custom_row">
                    <div class="label_col">
                        <label>
                            <span class="not_required">任意</span>
                            対象のURL
                        </label>
                    </div>
                    <div class="input_col">
                        <input type="text" name="">
                        <p>対象のSNS等のURL、ファイルストレージサービスへアップロードした対象のPDFファイルやスクリーンショットの画像ファイルのURLをご入力ください。</p>
                    </div>
                </div>
            </div>
            <div class="single_form_input">
                <div class="custom_row">
                    <div class="label_col">
                        <label>
                            <span class="is_required">必須</span>
                            通報者の電話番号
                        </label>
                    </div>
                    <div class="input_col">
                        <input type="text" name="" placeholder="01234567890">
                    </div>
                </div>
            </div>
            <div class="single_form_input">
                <div class="custom_row">
                    <div class="label_col">
                        <label>
                            <span class="is_required">必須</span>
                            通報内容
                        </label>
                    </div>
                    <div class="input_col">
                        <textarea placeholder="入力してください"></textarea>
                    </div>
                </div>
            </div>
            <div class="single_form_input">
                <div class="custom_row">
                    <div class="label_col"></div>
                    <div class="input_col">
                        <div class="custom_check">
                            <input type="checkbox" name="" id="i_agree_check">
                            <label for="i_agree_check"><a href="javascript:void(0)">プライバシーポリシー</a>に同意する</label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" name="" value="送信する" class="btn_submit_form">
        </form>
    </div>
</section>
<section class="contact_section">
    <div class="custom_container">
        <div class="contact_content">
            <h3><span>C</span>ONTACT</h3>
            <h6>– お問い合わせ –</h6>
            <p>※取材、お仕事のご依頼などお気軽にお問合せください。<br>
                ※絵画に関するご質問も、こちらからお願い致します。<br>
                ※VASEライバーオーディションに関するお問い合わせには<br>
            回答できません。予めご了承ください。</p>
            <a href="<?php echo get_site_url(); ?>/contact/">お問い合わせフォームへ</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>