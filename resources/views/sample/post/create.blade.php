@extends('sample.layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sample.post.create') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>投稿タイトル</label>
                        <input
                            type="text"
                            class="form-control"
                            name="post_title"
                            value="{{ old('post_title') }}"
                        >
                    </div>

                    <div class="form-group">
                        <label>本文</label>
                        <textarea class="form-control" name="post_content" rows=10>{{ old('post_content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>状態</label>
                        <select name="post_status" class="form-control">
                            @foreach (config('const.post_statuses') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary">投稿</button>
                </form>
            </div>
        </div>
    </div>

@endsection