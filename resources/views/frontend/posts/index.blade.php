<x-guest-layout>

    <h1>{{$post->title}}</h1>
    {!! $post->render('post_content') !!}

</x-guest-layout>