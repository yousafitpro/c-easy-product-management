@extends(epm_layout())
@section('content')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">



    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    @yield('epm_content')
    <script>

        $('#dt-table').DataTable({
            "order": []
        })
    </script>
@endsection
