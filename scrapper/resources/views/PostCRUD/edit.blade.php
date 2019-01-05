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

                    <a class="btn btn-primary" href="{{ route('urunler_amazon.index') }}"> Home</a>
                    <a class="btn btn-primary" href="/urunler_amazon/{{$previous}}/edit"> Önceki ürün</a>
                    <a class="btn btn-primary" href="/urunler_amazon/{{$next}}/edit"> Sonraki ürün</a>
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


            {!! Form::model($Lists, ['method' => 'PATCH','files'=>'true','route' => ['urunler_amazon.update', $Lists->id]]) !!}


            <div class="col-md-8 order-md-8 mb-8">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <a style="font-size:25px;color: red"  href="https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Dtoys-and-games-intl-ship&field-keywords={{$Lists->Parent_Product_Title}}" onclick="window.open(this.href, 'mywin',
'toolbar=0,menubar=0,scrollbars=1,height=1024,width=1440'); return false;">Amazon Search popup</a>
                    <br>
                    <a target="_blank"
                       href="https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Dtoys-and-games-intl-ship&field-keywords={{$Lists->Parent_Product_Title}}">
                        Amazon Search</a>
                    <br>


                    <div class="form-group">

                        Ürün Adı : <strong>{{$Lists->Parent_Product_Title}}</strong>
                        <br>
                        Sıra No : <strong>{{$Lists->id}}</strong>
                        <br>
                        <br>
                        <br>

                        <strong>Amazon Linkini giriniz:</strong>

                        {!! Form::text('amazon_url', $Lists->amazon_url, array('placeholder' => 'Amazon Linki','class' => 'form-control')) !!}
@if (!empty($Lists->amazon_url))
  <a target="_blank"
                       href="{{$Lists->amazon_url}}">go</a>
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
