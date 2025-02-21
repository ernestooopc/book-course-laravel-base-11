@extends('dashboard.master')

@section('content')

    <a href="{{route('category.create')}}" target="blank">Create</a>

    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Options</td>
            </tr>

        </thead>
        <tbody>

            @foreach ($categories as $c)
            <tr>
                <td>
                    {{$c->id}}
                </td>
                <td>
                    {{$c->title}}
                </td>

                <td>
                    <a href="{{route('category.edit',$c->id)}}">Edit</a>
                    <a href="{{route('category.show',$c->id)}}">Show</a>
                    <form action="{{route('category.destroy', $c)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>

                </td>

            </tr>



            @endforeach

        </tbody>
    </table>


    {{$categories -> links()}}


@endsection

