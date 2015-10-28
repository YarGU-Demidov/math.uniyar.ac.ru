<?php
	$user = AdminAuth::user();

	$name       = $user->name;
	$surname    = $user->surname;
	$middlename = $user->middlename;

	$fullname = $name . " " . $surname;

	if(isset($middlename) && !empty($middlename) && $middlename != "")
		$fullname .= " " . $middlename;

	$userImage = $user->image;
?>

		<!-- Sidebar user panel -->
<div class="user-panel">
	<div class="image" style="text-align: center; margin: 20px 0;">
		<img src="{{ $userImage }}" class="img-circle" alt="User Image">
	</div>
	<div style="text-align: center; color: #fff; overflow: hidden;">
		<span class="sidebarUserName">
			{{ $fullname }}
		</span>
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