@extends ('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('projects.only_projects')

@endsection
