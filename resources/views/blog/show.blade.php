@extends('blog.master')

@section('content')



    <x-blog.show :post="$post" data-id='1'/>

    <x-dynamic-component component='blog.show' :post="$post"/>

@endsection

