@extends('blog.master')

@section('content')



    {{-- <x-blog.post.show :post="$post" data-id='1'/> --}}

    <x-dynamic-component component='blog.post.show' :post="$post"/>

@endsection

