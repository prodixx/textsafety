@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.preview') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
	<section class="container-fluid d-print-none">
    	<a href="javascript: window.print();" class="btn float-right"><i class="la la-print"></i></a>
		<h2>
			<span class="text-capitalize">
				{!! $entry->title_ro !!}
			</span>
	        <small></small>
	        @if ($crud->hasAccess('list'))
	          <small class=""><a href="{{ url($crud->route) }}" class="font-sm"><i class="la la-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
	        @endif
	    </h2>
    </section>
@endsection

@section('content')
<div class="row">
	<div class="{{ $crud->getShowContentClass() }}">

	<!-- Default box -->
	  <div class="">

		<div class="col-md-12 mb-4">
		    <ul class="nav nav-tabs" role="tablist" id="tabList">
				<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#ro" role="tab" aria-controls="ro">Romana</a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#en" role="tab" aria-controls="en">Engleza</a></li>
		        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#es" role="tab" aria-controls="es">Spaniola</a></li>
		        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fr" role="tab" aria-controls="fr">Franceza</a></li>
		        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#it" role="tab" aria-controls="it">Italiana</a></li>
		        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#de" role="tab" aria-controls="de">Germana</a></li>
		    </ul>
		    <div class="tab-content">
		        <div class="tab-pane active" id="ro" role="tabpanel">
                    {!! $entry->details_ro !!}
                    <hr>
                    {!! $entry->technic_ro !!}
                    <hr>
                    {!! $entry->colors_ro !!}
                </div>

		        <div class="tab-pane" id="en" role="tabpanel">
                    {!! $entry->details_en !!}
                    <hr>
                    {!! $entry->technic_en !!}
                    <hr>
                    {!! $entry->colors_en !!}
                </div>

		        <div class="tab-pane" id="es" role="tabpanel">
                    {!! $entry->details_es !!}
                    <hr>
                    {!! $entry->technic_es !!}
                    <hr>
                    {!! $entry->colors_es !!}
                </div>

		        <div class="tab-pane" id="fr" role="tabpanel">
                    {!! $entry->details_fr !!}
                    <hr>
                    {!! $entry->technic_fr !!}
                    <hr>
                    {!! $entry->colors_fr !!}
                </div>

		        <div class="tab-pane" id="it" role="tabpanel">
                    {!! $entry->details_it !!}
                    <hr>
                    {!! $entry->technic_it !!}
                    <hr>
                    {!! $entry->colors_it !!}
                </div>

		        <div class="tab-pane" id="de" role="tabpanel">
                    {!! $entry->details_de !!}
                    <hr>
                    {!! $entry->technic_de !!}
                    <hr>
                    {!! $entry->colors_de !!}
				</div>
		    </div>
		</div>
	</div>
</div>
@endsection


@section('after_styles')
<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css') }}">
<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/show.css') }}">
@endsection

@section('after_scripts')
<script src="{{ asset('packages/backpack/crud/js/crud.js') }}"></script>
<script src="{{ asset('packages/backpack/crud/js/show.js') }}"></script>
<script>
$(function () {

    var tabId = window.location.hash;

    $("#tabList").find('a[href^=\\' + tabId + ']').tab('show');

});
</script>
@endsection
