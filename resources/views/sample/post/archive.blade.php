@extends('sample.layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('sample.post.create') }}" class="btn btn-info mb-2">
                        投稿
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <th>タイトル</th>
                        <th>投稿日</th>
                        <th>状態</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('sample.post.read', ['post_id' => $post->post_id]) }}">
                                        {{ $post->post_title }}
                                    </a>
                                </td>
                                <td>
                                    {{ $post->post_date->format('Y-m-d') }}
                                </td>
                                <td>
                                    {{ config('const.post_statuses')[$post->post_status] }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a
                                            href="{{ route('sample.post.update', ['post_id' => $post->post_id]) }}"
                                            class="btn btn-success"
                                        >
                                            編集
                                        </a>

                                        <span class="d-inline-block px-2"></span>

                                        <form action="{{ route('sample.post.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                                            <button class="btn btn-danger">
                                                削除
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection