@extends('layout.poster')
@section('content')
    <div class="panel-body">
        {{--バリデーションエラーで使用する--}}
        @include('common.errors')

        {{--登録フォーム--}}
        <form action="{{url('posts')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            {{--投稿のタイトル--}}
            <div class="form-group">
                <label for="post" class="col-sm-3 custom-control-label">Post</label>
                <div class="col-sm-6">
                    <input type="text" name="item_name" id="post-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection