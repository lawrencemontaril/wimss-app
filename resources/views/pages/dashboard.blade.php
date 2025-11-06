@extends('layouts.dashboard-layout')

@section('title')
  
@endsection

@section('content')
  <header class="mb-4">
    <h1 class="mb-2 text-3xl font-bold tracking-tight">
      Hello, {{ auth()->user()->full_name }}.
    </h1>
  </header>

  @role('admin')
    @include('components.dashboard.admin-dashboard')
  @endrole

  @role('dean')
    @include('components.dashboard.dean-dashboard')
  @endrole

  @role('hte')
    @include('components.dashboard.hte-dashboard')
  @endrole

  @role('faculty')
    @include('components.dashboard.faculty-dashboard')
  @endrole

  @role('student')
    @include('components.dashboard.student-dashboard')
  @endrole

  @role('guardian')
    @include('components.dashboard.guardian-dashboard')
  @endrole
@endsection
