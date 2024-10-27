@props(['post'])
<div class="flex flex-col m-10 mr-14">
<h1 class="capitalize text-[24px] text-gray-700 font-bold mb-5">{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
</div>

