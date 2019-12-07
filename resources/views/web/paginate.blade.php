<div class="row" id="div">
    <div class="col-md-12">
        <div class="row">
            @foreach($houses as $key => $house)
                <div class="col-lg-4 col-md-6">
                    <!-- feature -->
                    <a href="{{route('web.detail', ['id' => $house->id, 'category_id' => $house->category_id])}}">
                        <div class="feature-item">
                            <div class="feature-pic set-bg"
                                 style="background-image: url('{{asset('storage/images/'.(json_decode($house->image))[0])}}');"
                                 data-setbg="{{asset('storage/images/'.(json_decode($house->image))[0])}}">
                                <div class="sale-notic">{{$house->status == 1 ? 'Cho thuê' : "đang sửa chữa"}}</div>
                            </div>
                            <div class="feature-text">
                                <div class="text-center feature-title">
                                    <h5>{{$house->category->name}}</h5>
                                    <p><i class="fa fa-map-marker"></i>{{$house->ward->name}}
                                        , {{$house->district->name}}
                                        , {{$house->province->name}}</p>
                                </div>
                                <div class="room-info-warp">
                                    <div class="room-info">
                                        <div class="rf-left">
                                            <p><i class="fa fa-bed"></i>{{$house->totalBedRoom}} Phòng ngủ</p>
                                        </div>
                                        <div class="rf-right">
                                            <p><i class="fa fa-bath"></i>{{$house->totalBathroom}} Phòng tắm</p>
                                        </div>
                                    </div>
                                    <div class="room-info">
                                        <div class="rf-left">
                                            <p><i class="fa fa-user"></i>{{$house->user->name}}</p>
                                        </div>
                                        <div class="rf-right">
                                            <p>
                                                <i class="fa fa-clock-o"></i>{{date('d/m/Y', strtotime($house->approved_at))}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('web.detail', ['id' => $house->id, 'category_id' => $house->category_id])}}"
                                   class="room-price">{{number_format($house->price)}} Đồng/Ngày</a>
                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>
    {{$houses->links()}}
</div>



