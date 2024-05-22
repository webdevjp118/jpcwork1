	<!--ヘッダー開始-->
	<div id="header">
		<h1><!--サイトロゴはコチラ--><a href="./admin.html"><img id="logo" name="logo" src="common/img/logo.jpg" width="516" /></a></h1>
		<div class="fr">
			<p class="link_01"><a href="../" target="_blank">公開ページを確認する</a></p>
			<div class="hello_01">
				<p class="">ようこそ&nbsp;{$admin.name}&nbsp;さん</p>
				<p><a href="logout.html">【ログアウト】</a></p>
			</div>
		</div>

	</div>
	<!--ヘッダー終了-->
	<!--グローバル開始-->
		<ul class="global">
			<li class="global_start"><a href="admin.html">管理画面トップ</a></li>
			{if !$admin.auth1.1 && !$admin.auth1.2 && !$admin.auth1.3 }
			{else}
			<li><a href="admin-authority.html">権限管理</a></li>
			{/if}

			{if !$admin.auth2.1 && !$admin.auth2.2 && !$admin.auth2.3 }
			{else}
			<li><a href="admin-item.html">求人情報管理</a></li>
			{/if}

			{if !$admin.auth3.1 && !$admin.auth3.2 && !$admin.auth3.3 }
			{else}
			<!-- <li><a href="admin-user.html">会員管理</a></li> -->
			{/if}

			{if !$admin.auth4.1 && !$admin.auth4.2 && !$admin.auth4.3 }
			{else}
			<li><a href="admin-entry.html">応募管理</a></li>
			{/if}

			{if !$admin.auth5.1 && !$admin.auth5.2 && !$admin.auth5.3 }
			{else}
			<li><a href="news.html">サイトからのお知らせ管理</a></li>
			{/if}

			{if !$admin.auth6.1 && !$admin.auth6.2 && !$admin.auth6.3 }
			{else}
			<li><a href="contents.html">コンテンツ管理</a></li>
			{/if}

			{if !$admin.auth7.1 && !$admin.auth7.2 && !$admin.auth7.3 }
			{else}
			<li><a href="admin-pr.html">PR管理</a></li>
			{/if}
		</ul>
	<!--グローバル終了-->
	<!--ユーザー開始-->
	<div id="user" class="clear">
		<!--<p>&nbsp;</p>-->
	</div>
	<!--ユーザー終了-->
	<!--ラップ開始-->
	<div id="wrap_01">
		<div class="right"><div class="box">&nbsp;</div></div>
		<div class="left">&nbsp;</div>
	</div>
	<!--ラップ-->
