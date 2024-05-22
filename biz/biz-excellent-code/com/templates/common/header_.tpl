<!--ヘッダー開始-->
<header class="main-header">


<!-- Logo -->
<a href="./admin-graph.html" class="logo">
<span class="logo-mini"><img id="logo" name="logo" src="common/img/logo_s.png" width="40" /></span>
<span class="logo-lg"><img id="logo" name="logo" src="common/img/logo_l.png" width="200" /></span>
</a>



<!--Menu Icon-->
<nav class="navbar navbar-static-top">
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>



<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-bell-o"></i>
{if $count}
<span class="label label-warning">{$count}</span>
{/if}
</a>
<ul class="dropdown-menu">
{if $count}
<li class="header"><a href="admin-entry.html&status=0">未対応の応募が {$count} 件あります</a></li>
{else}
<li class="header">未対応の応募はありません</li>
{/if}
</ul>
</li>

<li>
<a href="/" target="_blank">
<i class="fa fa-external-link"></i>
</a>
</li>

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--<img src="common/AdminLTE/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
<span class="hidden-xs">{$admin.name}&nbsp;さん</span>
</a>

<ul class="dropdown-menu">

<!-- User image -->
<li class="user-header">
<!--<img src="common/AdminLTE/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
<p>ようこそ&nbsp;{$admin.name}&nbsp;さん</p>
</li>

<!-- Menu Body -->
<!--<li class="user-body">
<div class="row">
<div class="col-xs-4 text-center"><a href="#">Followers</a></div>
<div class="col-xs-4 text-center"><a href="#">Sales</a></div>
<div class="col-xs-4 text-center"><a href="#">Friends</a></div>
</div>
</li>-->

<!-- Menu Footer-->
<li class="user-footer">
<!--<div class="pull-left"><a href="#" class="btn btn-default btn-flat">登録情報編集</a></div>-->
<div class="pull-right"><a href="logout.html" class="btn btn-default btn-flat">ログアウト</a></div>
</li>

</ul>
</li>

<!--<li><a href="logout.html"><i class="fa fa-sign-out"></i>ログアウト</a></li>-->

<!-- Control Sidebar Toggle Button -->
<!--<li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>-->


</ul>
</div>
</nav>
</header>
<!--ヘッダー終了-->
