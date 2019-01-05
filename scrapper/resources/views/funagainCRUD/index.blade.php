@extends('layouts.app')


@section('content')


    <section class="content-wrapper">
        <section class="content">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

<h2>Fun AGAIN </h2>
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Adı</th>
                        <th>URL</th>
                        <th>Description</th>
                        <th>Manufacturers</th>
                        <th>Categories</th>
                        <th> Players</th>
                        <th> Age</th>
                        <th> Time</th>
                        <th>Game Mechanic</th>
                        <th>Type</th>
                        {{--<th>Category</th>--}}
                        {{--<th>System</th>--}}
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
                ajax: '{{ route('posts/getfaproduct').'?tek='.request()->get('tek') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'Parent_Product_Title', name: 'Parent_Product_Title'},
                    {data: 'funagain_url', name: 'funagain_url'},
                    {data: 'Product_Description', name: 'Product_Description'},
                    {data: 'Manufacturers', name: 'Manufacturers'},
                    {data: 'Categories', name: 'Categories'},
                    {data: 'Tag_Group_1_Players_', name: 'Tag_Group_1_Players_'},
                    {data: 'Tag_Group_2_Age', name: 'Tag_Group_2_Age'},
                    {data: 'Tag_Group_3_Playing_Time', name: 'Tag_Group_3_Playing_Time'},
                    {data: 'Tag_Group_4_Game_Mechanic', name: 'Tag_Group_4_Game_Mechanic'},
                    {data: 'Tag_Group_5_Type', name: 'Tag_Group_5_Type'},
                    // {data: 'Tag_Group6_Game_Category', name: 'Tag_Group6_Game_Category'},
                    // {data: 'Tag_Group_8_System', name: 'Tag_Group_8_System'},


                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush