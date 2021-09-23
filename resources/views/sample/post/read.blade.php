@extends('sample.layouts.app')

@push('scripts')
    <script src="{{ mix('js/sample/read.js') }}"></script>
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-7">
                <h3>{{ $post->post_title }}</h3>
                <div class="text-secondary">
                    投稿日：{{ $post->post_date->format('Y-m-d') }}
                </div>
                <div class="mt-4">
                    <div class="mb-5">
                        {!! nl2br($post->post_content) !!}
                    </div>

                    <div id="commentList">
                        @foreach ($comments as $comment)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div>
                                        {{ $comment->comment_content }}
                                    </div>
                                    <div class="d-flex justify-content-end mt-2 text-secondary">
                                        コメント日時： {{ $comment->created_at }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-4 offset-1">
                <h6>コメント</h6>
                <div id="commentForm" class="form">
                    <div>
                        <textarea id="commentText" class="form-control" rows="5"></textarea>
                    </div>
                    <input type="hidden" id="postId" value="{{ $post->post_id }}">
                    <div class="mt-2">
                        <button id="commentAdd" class="btn btn-success btn-sm">コメント追加</button>
                        <div id="spinner" class="spinner-border spinner-border-sm text-success ml-2" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection