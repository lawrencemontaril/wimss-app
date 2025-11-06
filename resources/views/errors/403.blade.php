@extends('layouts.dashboard-layout')

{{-- @section('title-prefix', '') --}}
@section('title', '- Forbidden')

@section('content')
  <div class="flex min-h-96 flex-col items-center justify-center gap-8">
    <img src="{{ asset('images/403.svg') }}" alt="Empty data" class="w-32" />
    <h4 class="text-xl font-semibold text-zinc-500">403: Access denied</h4>
  </div>
@endsection
