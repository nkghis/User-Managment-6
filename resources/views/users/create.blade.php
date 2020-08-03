@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'index'
])
@section('title', 'Gestion des utlisateurs | Nouveau')

@section('css')
    {{--<link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">--}}
@endsection

@section('content')

        <div class="content">
            @role('Admin')
            <div class="col-xl-6 order-xl-1 mx-auto">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <button class="btn btn-sm btn-dark">{{ __('Nouvel utilisateur') }}</button>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary"><i class="nc-icon nc-minimal-left"></i>{{ __('') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                            @csrf

                            {{--<h6 class="heading-small text-muted mb-4">{{ __('Informations de l\'utilisateur') }}</h6>--}}
                            <div class="pl-lg-4">
                                @include('users.partials._form')

                                @can('add_users')
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success mt-1">{{ __('Enregistrer') }}</button>
                                    </div>
                                @endcan
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('error-permission')
    @endrole
@endsection


@section('script')
    {{--<script src="{{ asset('vendor') }}/DataTables/datatables.js"></script>--}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>--}}

    {{-- <script>
         $(document).ready(function() {
             $('#data-table').DataTable({
                 "language": {
                     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                 },

                 "order": [[ 0, 'desc' ]]
             });
         } );
     </script>--}}
@endsection
@push('scripts')
    <script>
      /*  $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });*/
    </script>
@endpush




