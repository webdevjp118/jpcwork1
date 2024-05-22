<?php get_header(); ?>

<?php

if(isset($_POST['submit_action']) && $_POST['submit_action'] == "contact_submit") {
    $u_name = isset($_POST['u_name']) ? $_POST['u_name'] : "";
    $u_phone = isset($_POST['u_phone']) ? $_POST['u_phone'] : "";
    $u_email = isset($_POST['u_email']) ? $_POST['u_email'] : "";
    $u_special = isset($_POST['u_special']) ? $_POST['u_special'] : "";
    $other = isset($_POST['other']) ? $_POST['other'] : "";
    
    $to      = 'koide3019@yahoo.com';

    $message = "
        お名前 : ".$u_name."<br>
        携帯電話 : ".$u_phone."<br>
        メールアドレス : ".$u_email."<br>
        保有資格 : ".$u_special."<br>
        その他 : ".$other."<br>
    ";

    $headers = 'From: ' . $u_email . "\r\n" .
        'Reply-To: ' . $u_email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if(mail($to, $subject, $message, $headers)) {
        echo '<script>alert("Success!"); location.href="'.home_url().'"</script>';
    } else {
        echo '<script>alert("Failed!"); location.href="'.home_url().'"</script>';
    }

}

?>

<div class="banner-block-hp" style="background:url(<?php echo get_stylesheet_directory_uri();?>/images/banner.jpg) no-repeat top center; background-size:cover;">
    <div class="banner-overlay-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner-block-in-hp">
                    <div class="banner-text-main-hp">
                        <div class="banner-text-hp">
                            常に<span>笑顔</span>で<span>心</span>に寄り添う支援をお約束します
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service-block-hp" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 service-block-in-hp">
                <div class="service-middle-hp">
                    <div class="service-img-hp">
                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/service_img.png" alt="" /></a>
                    </div>
                    <div class="service-info-hp">
                        <div class="common-title-hp left-title-hp">
                            <h2>SERVICES</h2>
                            <p>事業内容</p>
                        </div>
                        <div class="service-details-hp">
                            <p>ぎのわん相談支援事業所では、障がい者の方のサービス等利用計画や障がい児の方の支援利用計画を作成します モニタリングなどのコミュニケーションを重ねる中でご本人やご家族との確かな信頼関係を構築し本当に必要な支援は何なのかについて真摯に考え提案いたします</p>
                            <p>様々な支援を受けることで体験や経験の幅を広げその人なりの意志表現が引き出され、経験の裏づけのもとに意思決定につながるよう、全力でサポートしていきます</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="service-block-hp message-block-hp" id="message">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 service-block-in-hp">
                <div class="service-middle-hp">
                    <div class="service-img-hp">
                        <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/message_img.png" alt="" /></a>
                    </div>
                    <div class="service-info-hp">
                        <div class="common-title-hp left-title-hp">
                            <h2>MESSAGE</h2>
                            <p>メッセージ</p>
                        </div>
                        <div class="service-details-hp">
                            <p>児童発達支援管理責任者、放課後等デイサービス事業所の管理者として三年半の経験の中で得られた知見を基に、新たな取り組みとしてより多方向からの支援を行うために相談支援事業所を立ち上げました。</p>
                            <p>保護者のニーズを最大限に汲み取りながらも、利用される当事者の声を直接聞き具現化できるプランを作成したり、必要に応じて連絡をしたりするなどの寄り添うことを意識して対応するように心がけています。</p>
                            <p>一緒に頑張ってきた人、一緒に励ましてくれる職場のメンバーさんとこの会社を良くしていき、この会社で目指すもの・イメージを実現していけるよう日々がんばっていきたいと思っています。</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="recruit-block-hp" id="recruit">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 recruit-block-in-hp">
                <div class="common-title-hp">
                    <h2>RECRUIT</h2>
                    <p>求人募集</p>
                </div>
                <div class="recruit-details-hp">
                    ライフワークバランス重視!リモート勤務・時短勤務も相談可能！<br> あなたもぎのわん相談支援事業所の一員になりませんか？
                </div>
                <div class="recruit-middle-hp">
                    <div class="recruit-middle-in-hp">
                        <div class="recruit-title-hp">募集内容</div>
                        <div class="recruit-info-hp">
                            <div class="recruit-info-in-hp">
                                <h3>募集職種</h3>
                                <div class="recruit-rest-hp">
                                    <p>相談支援員（生活支援員）</p>
                                </div>
                            </div>
                            <div class="recruit-info-in-hp">
                                <h3>仕事内容</h3>
                                <div class="recruit-rest-hp">
                                    <p>・居宅等を訪問し相談支援の説明や契約</p>
                                    <p>・利用者やその家族等へのアセスメント</p>
                                    <p>・本人が希望する生活にむけての課題や目標を整理し、サービス等利用計画を作成</p>
                                    <p>・サービス担当者会議の開催、サービス事業所や行政等との連絡調整</p>
                                    <p>・必要に応じ、ケースカンファレンスの実施や定期的なモニタリングの実施</p>
                                    <p>・新たな社会資源の発掘や開発、各関係機関と連携のための活動</p>
                                </div>
                            </div>
                            <div class="recruit-info-in-hp">
                                <h3>診療科目・サービス形態</h3>
                                <div class="recruit-rest-hp">
                                    <p>障害者支援</p>
                                    <p>就労移行支援</p>
                                    <p>給与 【正職員】 月給 230,000円～（試用期間あり）</p>
                                    <p>給与の備考 </p>
                                    <p>※給与は本人のスキル・経験に応じて決定</p>
                                    <p>※試用期間3ヶ月</p>
                                    <p>待遇</p>
                                    <p>社会保険完備</p>
                                    <p>賞与あり</p>
                                    <p>交通費支給</p>
                                    <p>研修制度あり</p>
                                    <p>雇用保険、労災保険、健康保険、厚生年金保険</p>
                                    <p>研修制度</p>
                                    <p>OJT</p>
                                </div>
                            </div>
                            <div class="recruit-info-in-hp">
                                <h3>勤務時間</h3>
                                <div class="recruit-rest-hp">
                                    <p>9:00～18:00</p>
                                    <p>※状況に応じて相談可能（リモート・時短も応相談）</p>
                                </div>
                            </div>
                            <div class="recruit-info-in-hp">
                                <h3>休日</h3>
                                <div class="recruit-rest-hp">
                                    <p>週休2日</p>
                                    <p>年間休日120日以上</p>
                                    <p>年間120日前後</p>
                                    <p>※土日祝休み</p>
                                </div>
                            </div>
                            <div class="recruit-info-in-hp">
                                <h3>長期休暇・特別休暇</h3>
                                <div class="recruit-rest-hp">
                                    <p>夏期休暇</p>
                                    <p>年末年始休暇</p>
                                    <p>GW</p>
                                    <p>慶弔休暇</p>
                                    <p>特別休暇</p>
                                    <p>有給休暇</p>
                                </div>
                            </div>
                            <div class="recruit-info-in-hp">
                                <h3>応募要件</h3>
                                <div class="recruit-rest-hp">
                                    <p>精神保健福祉士</p>
                                    <p>社会福祉士</p>
                                    <p>無資格可</p>
                                    <p>介護福祉士</p>
                                    <p>介護職員初任者研修（旧ヘルパー2級）以上</p>
                                    <p>福祉・医療・介護で実務経験が5年以上ある方（障害者支援、相談・就労支援業務、介護業務）</p>
                                </div>
                            </div>
                            <div class="recruit-info-in-hp">
                                <h3>歓迎要件</h3>
                                <div class="recruit-rest-hp">
                                    <p>社会福祉士、精神保健福祉士、介護福祉士、介護職員初任者研修（旧ヘルパー2級）などの有資格者歓迎</p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="contact-block-hp" id="entry_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contact-block-in-hp">
                <div class="common-title-hp">
                    <h2>ENTRY FORM</h2>
                    <p>お問い合わせ</p>
                </div>
                <div class="contact-info-hp">
                    <div class="contact-phone-hp">
                        <a href="tel:080-6499-9891">TEL：080-6499-9891</a>
                    </div>
                    <div class="contact-phone-info-hp">下記エントリーフォームに必要事項をご記入の上、送信をお願いします。</div>
                </div>
                <form class="contact-form-hp" action="" method="post">
                    <div class="form-field-hp">
                        <div class="form-field-name-hp">お名前</div>
                        <div class="form-field-input-hp"><input type="text" name="u_name" required/></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-hp">
                        <div class="form-field-name-hp">携帯電話</div>
                        <div class="form-field-input-hp"><input type="text" name="u_phone" required /></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-hp">
                        <div class="form-field-name-hp">メールアドレス</div>
                        <div class="form-field-input-hp"><input type="email" name="u_email" required /></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-hp">
                        <div class="form-field-name-hp">保有資格</div>
                        <div class="form-field-input-hp"><input type="text" name="u_special" required /></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-field-hp">
                        <div class="form-field-name-hp textarea-name-hp">その他</div>
                        <div class="form-field-input-hp"><textarea name="other" required></textarea></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-btn-hp">
                        <input type="hidden" name="submit_action" value="contact_submit">
                        <input type="submit" value="内容を確認して送信する" />
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="news-info-block-hp" id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 news-info-block-in-hp">
                <div class="news-block-main-hp">
                    <div class="news-block-hp">
                        <div class="common-title-hp">
                            <h2>NEWS</h2>
                            <p>お知らせ</p>
                        </div>
                        <?php
                        
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 2,
                        );

                        $news_query = new WP_Query($args);
                        if($news_query->have_posts()):
                            while($news_query->have_posts()):
                                $news_query->the_post();
                        
                        ?>
                        <div class="news-list-hp">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="news-date-hp"><?php echo get_the_date('Y/m/d'); ?></div>
                                <div class="news-name-hp"><?php echo get_the_title(); ?></div>
                            </a>
                        </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                        <div class="news-btn-hp">
                            <a href="<?php echo home_url(); ?>/news">お知らせ一覧を見る <img src="<?php echo get_stylesheet_directory_uri();?>/images/button_arrow_black.png" alt="" /></a>
                        </div>
                    </div>
                </div>
                <div class="info-block-main-hp" id="information">
                    <div class="info-block-hp">
                        <div class="common-title-hp">
                            <h2>INFORMATION</h2>
                            <p>事業所情報</p>
                        </div>
                        <div class="info-banner-hp">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/info_banner.png" alt="" /></a>
                        </div>
                        <div class="info-title-hp">ぎのわん相談支援事業所</div>
                        <div class="info-details-hp">
                            <p>〒901-2213 沖縄県宜野湾市志真志３丁目９−１０-2F</p>
                            <p>TEL　080-6499-9891</p>
                            <p>営業時間　平日10:00～18：00　土日休み</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>

<?php get_footer(); ?>