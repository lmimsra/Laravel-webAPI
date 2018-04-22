@extends('layout.poster')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            <form action="{{ url('post/update')}}" method="POST">
                <!-- item_name -->
                <div class="form-group">
                    <label for="post_title"> Title </label>
                    <input type="text" id="post_title" name="post_title" class="form-control" value="{{$post->title}}">
                </div> <!--/ item_name --> <!-- item_number -->
                <div class="form-group">
                    <label for="post_body"> body </label>
                    <input type="text" id="post_body" name="post_body" class="form-control" value="{{$post->body}}">
                </div> <!--/ item_number --> <!-- item_amount -->
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary"> 更新 </button>
                    <a class="btn btn-link pull-right" href="{{ url('/') }}">
                        <i class="glyphicon glyphicon-backward"></i> Back </a>
                </div> <!--/ 㻿 ave ボタン/Back ボタン --> <!-- id 値 を 送信 -->
                <input type="hidden" name="id" value="{{$post->id}}" />
                <!--/ id 値 を 送信 --> <!-- C 㻿 㻾 F -->
            {{csrf_field()}}
            </form>
        </div>
    </div>

@endsection