@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div class="container" style="max-width: 800px; margin: 0 auto; padding: 40px 20px;">

    <h1 style="font-size: 36px; font-weight: bold; margin-bottom: 30px;">Blog</h1>

    @forelse ($posts as $post)

        <div style="margin-bottom: 30px;">
            <a href="/blog/{{ $post->slug }}" style="text-decoration:none; color:inherit;">
                <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">
                    {{ $post->title }}
                </h2>
		<p style="color:#fff; margin-top:10px;">
            		{{ \Illuminate\Support\Str::limit(strip_tags(\Illuminate\Support\Str::markdown($post->content)), 200) }}
        	</p>
                <p style="font-size: 14px; color:#666;">
                    {{ $post->published_at?->format('d M Y') }}
                </p>
            </a>
        </div>

    @empty
        <p style="color:#555;">No hay posts todavía.</p>
    @endforelse

</div>
@endsection

