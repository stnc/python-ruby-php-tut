@extends('layouts.app')


@section('content')


    <section class="content-wrapper">
        <section class="content">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

<h2>AMAZON</h2>
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Adı</th>
                        <th>Weight</th>
                        <th>Export Weight</th>
                        <th>Resim</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
            </div>

            </section>
    </section>
@endsection



@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('posts/getdata').'?tek='.request()->get('tek') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'Parent_Product_Title', name: 'Parent_Product_Title'},
                    {data: 'Weight_in_KGs', name: 'Weight_in_KGs'},
                    {data: 'Export_Weight_inKGs', name: 'Export_Weight_inKGs'},

                    { data: 'Product_Image', name: 'Product_Image',
                        render: function( data, type, full, meta ) {
                            return "<img src=" + data + " height=\"50\"/>";
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush