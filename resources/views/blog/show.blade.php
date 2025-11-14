@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container" style="max-width: 800px; margin: 0 auto; padding: 40px 20px;">

    <h1 style="font-size: 36px; font-weight:bold; margin-bottom:10px;">
        {{ $post->title }}
    </h1>

    <p style="font-size:14px; color:#666; margin-bottom:30px;">
        {{ $post->published_at?->format('d M Y') }}
    </p>

    <div style="
        line-height: 1.7;
        font-size: 18px;
        color: #333;
    ">
        {!! \Illuminate\Support\Str::markdown($post->content) !!}
    </div>
    <style>
        /* Markdown básico */
        .container h1, .container h2, .container h3 {
            margin-top: 25px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .container p {
            margin-bottom: 15px;
        }
        .container ul, .container ol {
            margin-left: 25px;
            margin-bottom: 15px;
        }
        .container pre, .container code {
            background: #f5f5f5;
            padding: 8px 12px;
            border-radius: 6px;
            display: block;
            overflow-x: auto;
            margin-bottom: 20px;
        }
        .container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
        }

    </style>

</div>
@endsection
