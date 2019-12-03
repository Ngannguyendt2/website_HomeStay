<div class="row" id="div">
    <div class="col-md-12">
        <div class="row">
            @foreach($houses as $key => $house)

                <div class="col-md-6">
                    <a href="{{route('web.detail',$house->id)}}">
                        <div style="border-radius: 15px; background-image: url('{{asset('storage/images/'.(json_decode($house->image))[0])}}');"
                             class="propertie-item set-bg"
                             data-setbg="{{asset('storage/images/'.(json_decode($house->image))[0])}}">
                            <div class="sale-notic">{{$house->status == 1 ? 'Cho thuê' : "Bán"}}</div>
                            <div class="propertie-info text-white">
                                <div class="info-warp">
                                    <h5>{{$house->category->name}}</h5>
                                    <p><i class="fa fa-map-marker"></i>{{$house->ward->name}}
                                        , {{$house->district->name}} <br> {{$house->province->name}}</p>
                                </div>
                                <div style="margin-top: 5px" class="price"><a
                                            href="{{route('web.detail',$house->id)}}">{{number_format($house->price)}}
                                        Đồng</a></div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{$houses->links()}}
</div>
