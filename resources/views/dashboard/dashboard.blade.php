@extends('layout.dashboard')
@section('title', __('site.dashboard'))
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">@lang("site.dashboard")</a></li>

@endsection
@section('content')
<h1> @lang("site.dashboard")</h1>
@endsection

