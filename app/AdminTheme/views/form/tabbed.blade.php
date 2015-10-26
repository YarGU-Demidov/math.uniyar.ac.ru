<form action="{{ $action }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<input type="hidden" name="_redirectBack" value="{{ $backUrl }}" />
	<div role="tabpanel">
		<ul class="nav nav-tabs" role="tablist">
			<?php $active = null; ?>
			@foreach ($items as $label => $_tmp)
				<?php
					if (is_null($active))
					{
						$active = $label;
					}
				?>
				<li role="presentation" {!! ($active == $label) ? 'class="active"' : '' !!}><a href="#{{ md5($label) }}" aria-controls="{{ md5($label) }}" role="tab" data-toggle="tab">{{ $label }}</a></li>
			@endforeach
		</ul>
		<div class="tab-content">
			@foreach ($items as $label => $formItems)
				<div role="tabpanel" class="tab-pane {!! ($active == $label) ? 'in active' : '' !!}" id="{{ md5($label) }}">
					<div class="box">
						@foreach ($formItems as $item)
							{!! $item !!}
						@endforeach
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="form-group">
		<input type="submit" value="{{ trans('admin::lang.table.save') }}" class="btn btn-primary flat"/>
		<a href="{{ $backUrl }}" class="btn btn-default flat">{{ trans('admin::lang.table.cancel') }}</a>
	</div>
</form>