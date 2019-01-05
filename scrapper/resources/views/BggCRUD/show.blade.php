@extends('layouts.app')



@section('content')


    <div class="content-wrapper">

        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            <div><a href="#"><img src="{{$tags[0]->image}}"></a></div>
                        </div> <!-- slider-product.// -->
                        <div class="img-small-wrap">

                            @foreach ($tags as  $employee)

                                @if ($loop->iteration == 1)

                                @endif

                                <div class="item-gallery">
                                    <a href="{{ $employee->image }}">
                                        <img src="{{ $employee->image }}" alt="Exterior"/></a>
                                </div>
                            @endforeach


                        </div> <!-- slider-nav.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{$Posts->product_name}}</h3>

                        <p class="price-detail-wrap">
	<span class="price h3 text-warning">
		<span class="num">{{$Posts->fiyat}}</span> <span class="currency">TL</span>
	</span>
                        </p> <!-- price-detail-wrap .// -->

                        <dl class="param param-feature">
                            <dt>n11 subtitile</dt>
                            <dd>{{$Posts->product_subtitle}}</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>Marka</dt>
                            <dd>{{$Posts->virtual_brand}}</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>satıcı Kodu</dt>
                            <dd>{{$Posts->satici_kodu}}</dd>
                        </dl>  <!-- item-property-hor .// -->

                        <dl class="param param-feature">
                            <dt>n11 sayfasına git</dt>
                            <dd>
                                <a href="https://urun.n11.com/arnascrm/arans_urun-P{{$Posts->n11_id}}">n11 urun
                                    sayfası</a>

                            </dd>
                        </dl>  <!-- item-property-hor .// -->

                        <dl class="param param-feature">
                            <dt>Stok Bilgisi</dt>
                            <dd>stok bilgisi olacak</dd>
                        </dl>  <!-- item-property-hor .// -->

                        <h2> Eklenecek özellikler</h2>
                        <br>
                        <a href="#">n11 sayfasını düzenle</a>
                        <br>
                        <a href="#">hepsi burada sayfasını düzenle</a>
                        <br>
                        <a href="#">web sitesi sayfasını düzenle</a>
                        <br><br>

                        <dl class="param param-feature">
                            <dt>Kategori bilgisi</dt>
                            <dd>@json($Posts->kategori_info)</dd>
                        </dl>  <!-- item-property-hor .// -->


                        <dl class="param param-feature">
                            <dt>attribute bilgisi</dt>
                            <dd>@json($Posts->attributes_info)</dd>
                        </dl>  <!-- item-property-hor .// -->


                        <dl class="item-property">
                            <dt>Açıklama</dt>
                            <dd>

                                {!! $Posts->urun_aciklama !!}

                            </dd>
                        </dl>

                        <hr>

                        <hr>

                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->


        <div class="clearfix"></div>


    </div>






@endsection
