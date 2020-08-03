@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users'
])
@section('title', 'Gestion des utilisateurs')

@section('css')
    {{--<link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')


    <div class="content">

         @role('Admin')
      {{--  <div class="card">--}}

            @include('flash-message')

            <div class="card-header">

                <div class="row">
                    <div class="col-md-4">
                        <h7 class="modal-title">
                            <button type="button" class="btn btn-sm btn-dark">
                                <strong>{{ 'Utilisateurs', $result->count() }}</strong> <span class="badge badge-danger">{{ $result->total() }}</span>
                            </button>
                            {{--<span class="badge badge-secondary">{{ $result->total() }}
                            </span> {{ str_plural('Utilisateur', $result->count()) }}--}}
                        </h7>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 page-action text-right">
                        @can('add_users')
                            <a href="{{ route('user.create') }}" class="btn btn-success btn-sm"> <i class="nc-icon nc-simple-add"></i> <b>Nouveau</b></a>
                        @endcan
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm" id="data-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date Création</th>
                            @can('edit_users', 'delete_users')
                                <th class="text-center">Actions</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->roles->implode('name', ', ') }}</td>
                                <td>{{ $item->created_at->toFormattedDateString() }}</td>

                                @can('edit_users', 'delete_users')
                                    <td class="text-center">
                                        @include('users.shared._action', [
                                            'entity' => 'user',
                                            'id' => $item->id
                                        ])
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

       {{-- </div>--}}

        @else
            @include('error-permission')
        @endrole
    </div>
@endsection


@section('script')
    {{--<script src="{{ asset('vendor') }}/DataTables/datatables.js"></script>--}}
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

   <script>
         $(document).ready(function() {
             $('#data-table').DataTable({
                 "language": {
                     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                 },

                 "order": [[ 0, 'desc' ]]
             });
         } );
     </script>
@endsection
@push('scripts')
   {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>--}}
@endpush
