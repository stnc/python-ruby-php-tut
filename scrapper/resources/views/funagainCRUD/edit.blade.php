@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="row">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="col-lg-12 margin-tb">

                <div class="pull-left">

                    <h2> <strong>{{$Lists->Parent_Product_Title}}</strong></h2>

                </div>

                <div class="pull-right">

                    <a class="btn btn-primary" href="{{ route('urunler_funagain.index') }}"> Home</a>
                    <a class="btn btn-primary" href="/urunler_funagain/{{$previous}}/edit"> Önceki ürün</a>
                    <a class="btn btn-primary" href="/urunler_funagain/{{$next}}/edit"> Sonraki ürün</a>
                </div>

            </div>


            @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <strong>Whoops!</strong> There were some problems with your input.<br><br>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {!! Form::model($Lists, ['method' => 'PATCH','files'=>'true','route' => ['urunler_funagain.update', $Lists->id]]) !!}


            <div class="col-md-8 order-md-8 mb-8">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <a style="font-size:25px;color: red"  href="https://www.funagain.com/" onclick="window.open(this.href, 'mywin',
'toolbar=0,menubar=0,scrollbars=1,height=1024,width=1440'); return false;"> funagain.com Search</a>
                    <br>

                    <a target="_blank"
                       href="https://www.funagain.com/">
                       funagain.com Search</a>
                    <br>


                    <div class="form-group">

                        Ürün Adı : <strong>{{$Lists->Parent_Product_Title}}</strong>
                        <br>
                        Sıra No : <strong>{{$Lists->id}}</strong>
                        <br>
                        <br>
                        <br>

                        <strong> funagain.com  Linkini giriniz:</strong>

                        {!! Form::text('funagain_url', $Lists->funagain_url, array('placeholder' => 'funagain Linki','class' => 'form-control')) !!}
                        @if (!empty($Lists->funagain_url))
                            <a target="_blank"
                               href="{{$Lists->funagain_url}}">go</a>
                        @endif
                    </div>

                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </div>



            {!! Form::close() !!}
        </div>
    </div>
@endsection
