@extends('layouts.app')

@section('css')
<style>
    .h1 {
        font-size: 50px !important;
    }
</style>
@endsection

@section('content')
<div class="content-body mt-4">
    <section>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @php
                            $changelog = file_get_contents(base_path('CHANGELOG.md'))
                        @endphp
                        {{ Illuminate\Mail\Markdown::parse($changelog) }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
