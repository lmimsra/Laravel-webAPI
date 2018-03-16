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

        <!-- 現在の投稿を表示 -->
        @if(count($posts) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    現在の投稿
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>投稿一覧</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="table-text">
                                    <div>{{$post->title}}</div>
                                </td>
                                <!-- 削除ボタン -->
                                <td>
                                    <form action="{{url('post/'.$post->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection