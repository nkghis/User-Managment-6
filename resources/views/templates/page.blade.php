@extends('layouts.app', [
    'class' => '',

   /* Is to see who sidebar item have selected, you must use same variable in auth navabar for variable $elementActive */
    'elementActive' => 'page'
])
@section('title', 'Gestion des .....')

@section('css')
    {{--<link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">--}}
@endsection

@section('content')
    <div class="content">

    </div>
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
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush
