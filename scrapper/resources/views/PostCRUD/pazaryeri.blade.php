@extends('layouts.app')


@section('content')
    <section class="content-wrapper">
        <section class="content">
<h2>Ürünlerimiz</h2>
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Adı</th>
                        <th>Marka</th>
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
                ajax: '{{ route('posts/getdata').'?all='.request()->get('all') }}',
                columns: [
                    {data: 'n11_id', name: 'n11_id'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'virtual_brand', name: 'virtual_brand'},

                    { data: 'first_picture', name: 'first_picture',
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