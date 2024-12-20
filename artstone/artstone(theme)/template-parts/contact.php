<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<section class="breadcrumb_section">
    <div class="custom_container">
        <div class="breadcrumb_title">
            <h2>CONTACT</h2>
            <p>_お問い合わせ</p>
        </div>
    </div>
    <div class="breadcrumb_path">
        <div class="custom_container">
            <ul>
                <li>
                    <a href="<?php echo get_site_url(); ?>/">ホーム</a>
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li><span>お問い合わせ</span></li>
            </ul>
        </div>
    </div>
</section>
<section class="contact_form_section">
    <div class="custom_container">
        <div class="contact_black">
            <div class="contact_black_title">
                <h4>各タレントのファンレターの送り先はこちら</h4>
            </div>
            <div class="contact_black_desc">
                <h5>〒271-0091 千葉県松戸市本町15-4　ハモトモビル406</h5>
                <h5>株式会社Art Stone Entertainment ◯◯宛</h5>
                <p>※各タレントへのプレゼントは、現在受付をしておりません。</p>
                <p>※ばけごろうへのプレゼントはイベント会場でも郵送でも受付を行っております。</p>
            </div>
        </div>
        <div class="contact_black">
            <div class="contact_black_title">
                <h4>各タレントのオンラインストアのお問い合わせはこちら</h4>
            </div>
            <div class="contact_black_desc">
                <p>BOOTH / BASEを活用しております。</p>
                <p>操作方法がわからない、住所変更をしたい、商品をキャンセルしたいなどの全般的なお問い合わせは、サポートセンターまでお願い致します。</p>
                <a target="_blank" href="https://booth.pm/support">BOOTHサポートセンター</a>／<a target="_blank" href="https://help.thebase.in/hc/ja/requests/new">BASEサポートセンター</a>
            </div>
        </div>
        <div class="contact_text_content">
            <p>
                上記以外は下記フォームからお問い合わせください。折り返し、担当からご連絡をさせていただきます。<br>※回答には、お時間をいただく場合がございます。<br>なお、内容によってはお答えできない場合もありますので、あらかじめご了承ください。
            </p>
        </div>
        <div class="form_list_tab_title">
            <ul>
                <li><a class="active_tab" href="javascript:void(0);" data-tag="form_tab1">企業の方</a></li>
                <li><a href="javascript:void(0);" data-tag="form_tab2">一般の方</a></li>
            </ul>
        </div>
        <div class="form_list_tab_content">
            <div class="form_tab_content tab_content_active" id="form_tab1">
                <a class="report_btn" href="<?php echo get_site_url(); ?>/report/">
                    攻撃的行為または誹謗中傷行為に関する通報
                </a>
                <form class="contact_form">
                    <div class="single_form_input">
                        <div class="custom_row">
                            <div class="label_col">
                                <label>
                                    <span class="is_required">必須</span>
                                    通報者のお名前
                                </label>
                            </div>
                            <div class="input_col">
                                <div class="custom_radio">
                                    <input type="radio" name="inquiry_com" id="com_inq_1">
                                    <label for="com_inq_1">プロモーション・タイアップ・コラボのご依頼</label>
                                    <input type="radio" name="inquiry_com" id="com_inq_2">
                                    <label for="com_inq_2">専属作家への楽曲制作のご依頼</label>
                                    <input type="radio" name="inquiry_com" id="com_inq_3">
                                    <label for="com_inq_3">取材のご依頼</label>
                                    <input type="radio" name="inquiry_com" id="com_inq_4">
                                    <label for="com_inq_4">絵画販売について</label>
                                    <input type="radio" name="inquiry_com" id="com_inq_5">
                                    <label for="com_inq_5">グッズ販売について</label>
                                    <input type="radio" name="inquiry_com" id="com_inq_6">
                                    <label for="com_inq_6">その他</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_form_input">
                        <div class="custom_row">
                            <div class="label_col">
                                <label>
                                    <span class="is_required">必須</span>
                                    会社名
                                </label>
                            </div>
                            <div class="input_col">
                                <input type="text" name="" placeholder="会社名をご記入ください">
                            </div>
                        </div>
                    </div>
                    <div class="single_form_input">
                        <div class="custom_row">
                            <div class="label_col">
                                <label>
                                    <span class="is_required">必須</span>
                                    氏名
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
                                    <span class="not_required">任意</span>電話番号
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
                                    <span class="is_required">必須</span>
                                    お問い合わせ内容
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
                                    <input type="checkbox" name="" id="i_agree_check_com">
                                    <label for="i_agree_check_com"><a href="javascript:void(0)">プライバシーポリシー</a>に同意する</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="" value="送信する" class="btn_submit_form">
                </form>
            </div>
            <div class="form_tab_content" id="form_tab2" style="display: none;">
                <a class="report_btn" href="<?php echo get_site_url(); ?>/report/">
                    攻撃的行為または誹謗中傷行為に関する通報
                </a>
                <form class="contact_form">
                    <div class="single_form_input">
                        <div class="custom_row">
                            <div class="label_col">
                                <label>
                                    <span class="is_required">必須</span>
                                    お問い合わせ項目
                                </label>
                            </div>
                            <div class="input_col">
                                <div class="custom_radio">
                                    <input type="radio" name="inquiry_pub" id="pub_inq_1">
                                    <label for="pub_inq_1">プロモーション・タイアップ・コラボのご依頼</label>
                                    <input type="radio" name="inquiry_pub" id="pub_inq_2">
                                    <label for="pub_inq_2">専属作家への楽曲制作のご依頼</label>
                                    <input type="radio" name="inquiry_pub" id="pub_inq_3">
                                    <label for="pub_inq_3">VASE配信について</label>
                                    <input type="radio" name="inquiry_pub" id="pub_inq_4">
                                    <label for="pub_inq_4">各種イベントについて</label>
                                    <input type="radio" name="inquiry_pub" id="pub_inq_5">
                                    <label for="pub_inq_5">絵画販売について</label>
                                    <input type="radio" name="inquiry_pub" id="pub_inq_6">
                                    <label for="pub_inq_6">グッズ販売について</label>
                                    <input type="radio" name="inquiry_pub" id="pub_inq_7">
                                    <label for="pub_inq_7">その他</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_form_input">
                        <div class="custom_row">
                            <div class="label_col">
                                <label>
                                    <span class="not_required">任意</span>団体名
                                </label>
                            </div>
                            <div class="input_col">
                                <input type="text" name="" placeholder="団体名をご記入ください">
                            </div>
                        </div>
                    </div>
                    <div class="single_form_input">
                        <div class="custom_row">
                            <div class="label_col">
                                <label>
                                    <span class="is_required">必須</span>
                                    氏名
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
                                    <span class="is_required">必須</span>
                                    お問い合わせ内容
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
                                    <input type="checkbox" name="" id="i_agree_check_pub">
                                    <label for="i_agree_check_pub"><a href="javascript:void(0)">プライバシーポリシー</a>に同意する</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="" value="送信する" class="btn_submit_form">
                </form>
            </div>
        </div>
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
            <a href="#">お問い合わせフォームへ</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>