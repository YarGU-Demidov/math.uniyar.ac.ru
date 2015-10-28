<?php
	$user = AdminAuth::user();
	$userPhoto = $user->image;
?>

		<!-- Sidebar user panel -->
<div class="user-panel">
	<div class="image" style="text-align: center; margin: 20px 0;">
		<img src="{{ $userPhoto }}" class="img-circle" alt="User Image">
	</div>
	<div style="position:relative; display: block;width: 100%; text-align: center; color: #fff;">
		<p>test</p>
	</div>
</div>

<!-- search form --><!--
<form action="#" method="get" class="sidebar-form">
	<div class="input-group">
		<input type="text" name="q" class="form-control" placeholder="Search...">
  <span class="input-group-btn">
    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
    </button>
  </span>
	</div>
</form>
<!-- /.search form -->

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
	@foreach (Admin::instance()->getMenu() as $item)
		{!! $item !!}
	@endforeach
</ul>