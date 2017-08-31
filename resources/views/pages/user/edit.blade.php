@extends('layouts.app')


@section('content')
  <div class="container">

        @include('layouts.partials._bread', ['data' => empty($bread) ? '' : $bread])

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="card-box">

                    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT']) !!}

                        @include('pages.user._form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- end row -->
  </div>
@endsection

@section('scripts')


@endsection
