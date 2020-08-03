@extends('layouts.app', ['class' => '',
    'elementActive' => 'edit'])

@section('title', 'Gestion des utilisateurs | Edition | '. $user->name)
@section('content')
   {{-- @include('layouts.headers.cards')--}}

            <div class="content">
                @role('Admin')
                    <div class="col-xl-6 order-xl-1 mx-auto">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h6 class="mb-0"><strong>{{ __('Edition Utilisateur | '). $user->name }}</strong></h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary"><i class="nc-icon nc-minimal-left"></i>{{ __('') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-white">
                                <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off">
                                    @csrf
                                    @method('put')

                                    {{--<h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>--}}
                                    <div class="pl-lg-4">
                                        @include('users.partials._form_edit')
                                        @can('edit_users')
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success mt-1">{{ __('Mettre à jour') }}</button>
                                            </div>
                                        @endcan
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        @else
            @include('error-permission')
        @endrole

          {{--  @include('layouts.footers.auth')--}}
        </div>
@endsection
