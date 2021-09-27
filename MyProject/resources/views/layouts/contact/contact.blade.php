@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
    <div class="features_items">

        <h2 class="title text-center">Thông tin website</h2>
        @foreach($contact as $contact)
        <div class="row">
            <div class="col-md-12">
                <h4>Thông tin liên hệ</h4>
                {!! $contact->info_contact !!}
                {!! $contact->info_fanpage !!}

            </div>
            <div class="col-md-12">
                <h4>Bản đồ</h4>
                {!! $contact->info_map !!}
            </div>
        </div>
        @endforeach


    </div>


</div>
@stop()