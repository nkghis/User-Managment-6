@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'roles'
])
@section('title', 'Gestion des rôles')

@section('css')
    {{--<link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="content">
        @role('Admin')
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h7 class="modal-title">
                        <button type="button" class="btn btn-sm btn-dark">
                            <strong>{{ 'Rôles', $roles->count()}}</strong> <span class="badge badge-danger">{{ $roles->total() }}</span>
                        </button>

                    </h7>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4 page-action text-right">
                    @can('add_roles')
                    <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm"> <i class="nc-icon nc-simple-add"></i> <b>Nouveau</b></a>
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
                        <th>Permissions</th>
                        <th>Date Création</th>
                        @can('edit_roles', 'delete_roles')
                            <th class="text-center">Actions</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td style="word-wrap: break-word;max-width: 660px;white-space:normal;">{{ $item->permissions->implode('name', ', ') }}</td>
                            <td>{{ $item->created_at->toFormattedDateString() }}</td>

                            @can('edit_users', 'delete_roles')
                                <td class="text-center">
                                    @include('roles.shared._action', [
                                        'entity' => 'roles',
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
