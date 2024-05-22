  <?php global $current; ?>
  <nav id="pcnav">
    <ul id="headernav">
      <li<?php if($current == 0) echo ' class="current"'; ?>><a href="/"><span class="jp">ホーム</span></a></li>
      <li<?php if($current == 1) echo ' class="current"'; ?>><a href="/harg/"><span class="jp">HARG TOP</span></a></li>
      <li<?php if($current == 2) echo ' class="current"'; ?>><a href="/harg/effect/"><span class="jp">効果</span></a></li>
      <li<?php if($current == 3) echo ' class="current"'; ?>><a href="/harg/feature/"><span class="jp">特徴</span></a></li>
      <li<?php if($current == 4) echo ' class="current"'; ?>><a href="/harg/flow/"><span class="jp">施術の流れ</span></a></li>
      <li<?php if($current == 5) echo ' class="current"'; ?>><a href="/harg/faq/"><span class="jp">よくあるご質問</span></a></li>
      <li<?php if($current == 6) echo ' class="current"'; ?>><a href="/harg/attention/"><span class="jp">注意事項</span></a></li>
    </ul>
    <ul id="fixedsns">
      <li><a href="https://ameblo.jp/kmclinic" target="_blank"><span><img src="/common/img/ico_ameba.svg" alt="スタッフブログ"></span></a></li>
      <li><a href="https://www.facebook.com/KMshinjukuclinic" target="_blank"><span><img src="/common/img/ico_facebook.svg" alt="facebook"></span></a></li>
      <li><a href="https://www.instagram.com/kmshinjuku_official/" target="_blank"><span><img src="/common/img/ico_instagram.svg" alt="Instagram"></span></a></li>
      <li><a href="https://twitter.com/KMshinjuku" target="_blank"><span><img src="/common/img/ico_twitter.svg" alt="Twitter"></span></a></li>
      <li><a href="https://www.kmshinjuku.com/line/" target="_blank"><span><img src="/common/img/line.svg" alt="line"></span></a></li>
    </ul>
  </nav>
