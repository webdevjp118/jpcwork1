<!--グローバル開始-->
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">



<!--ログインしている人のプロフィール-->
<!-- Sidebar user panel -->
<!--<div class="user-panel">
<div class="pull-left image"><img src="common/AdminLTE/img/user2-160x160.jpg" class="img-circle" alt="User Image"></div>
<div class="pull-left info"><p>Alexander Pierce</p><a href="#"><i class="fa fa-circle text-success"></i> Online</a></div>
</div>-->


<!--検索窓-->
<!-- search form -->
<!--<form action="#" method="get" class="sidebar-form">
<div class="input-group">
<input type="text" name="q" class="form-control" placeholder="Search...">
<span class="input-group-btn"><button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
</div>
</form>-->
<!-- /.search form -->



<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
<li class="header">管理メニュー</li>

<li>
<a href="admin-graph.html">
<i class="fa fa-dashboard"></i> <span>管理画面トップ</span>
<!--<span class="pull-right-container">
<small class="label pull-right bg-green">new</small>
</span>
-->
</a>
</li>
{if !$admin.auth1.1 && !$admin.auth1.2 && !$admin.auth1.3 }
{else}
<li>
<a href="admin-authority.html">
<i class="fa fa-user-plus"></i> <span>権限管理</span>
<!--<span class="pull-right-container">
<small class="label pull-right bg-green">new</small>
</span>
-->
</a>
</li>
{/if}
{if !$admin.auth2.1 && !$admin.auth2.2 && !$admin.auth2.3 }
{else}
<li>
<a href="admin-item.html">
<i class="fa fa-file-o"></i> <span>求人情報管理</span>
<!--<span class="pull-right-container">
<small class="label pull-right bg-green">new</small>
</span>
-->
</a>
</li>
{/if}
{if !$admin.auth4.1 && !$admin.auth4.2 && !$admin.auth4.3 }
{else}
<li>
<a href="admin-entry.html">
<i class="fa fa-envelope"></i> <span>応募管理</span>
<!--<span class="pull-right-container">
<small class="label pull-right bg-green">new</small>
</span>
-->
</a>
</li>
{/if}
{if !$admin.auth5.1 && !$admin.auth5.2 && !$admin.auth5.3 }
{else}
<li>
<a href="news.html">
<i class="fa fa-info-circle"></i> <span>サイトからのお知らせ管理</span>
<!--<span class="pull-right-container">
<small class="label pull-right bg-blue">17</small>
</span>-->
</a>
</li>
{/if}
{if !$admin.auth6.1 && !$admin.auth6.2 && !$admin.auth6.3 }
{else}
<li>
<a href="contents.html">
<i class="fa fa-file-code-o"></i> <span>コンテンツ管理</span>
<!--<span class="pull-right-container">
<small class="label pull-right bg-blue">17</small>
</span>-->
</a>
</li>
{/if}

{*
{if !$admin.auth7.1 && !$admin.auth7.2 && !$admin.auth7.3 }
{else}
<li>
<a href="admin-pr.html">
<i class="fa fa-picture-o"></i> <span>PR管理</span>
<!--<span class="pull-right-container">
<small class="label pull-right bg-blue">17</small>
</span>-->
</a>
</li>
{/if}
*}
	
{*
{if !$admin.auth8.1 && !$admin.auth8.2 && !$admin.auth8.3 }
{else}
<li>
<a href="admin-branch.html">
<i class="fa fa-building-o"></i> <span>営業所管理</span>
<!--<span class="pull-right-container">
<small class="label pull-right bg-blue">17</small>
</span>-->
</a>
</li>
{/if}
*}

</ul>
</section>
<!-- /.sidebar -->
</aside>
<!--グローバル終了-->
