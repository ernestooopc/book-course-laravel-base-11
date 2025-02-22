@extends('dashboard.master')

@section('content')

    <a class="btn btn-primary my-3" href="{{route('post.create')}}" target="blank">Create</a>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Id</th>
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Posted</th>
                <th class="border border-gray-300 px-4 py-2">Category</th>
                <th class="border border-gray-300 px-4 py-2">Options</th>
            </tr>

        </thead>
        <tbody>

            @foreach ($posts as $p)
            <tr class="text-center">
                <td>
                    {{$p->id}}
                </td>
                <td>
                    {{$p->title}}
                </td>

                <td>
                    {{$p->posted}}
                </td>

                <td>
                    {{ $p->category->title}}
                </td>
                <td>
                    <a class="btn btn-success mt-2" href="{{route('post.edit',$p->id)}}">Edit</a>
                    <a class="btn btn-success mt-2" href="{{route('post.show',$p->id)}}">Show</a>
                    <form action="{{route('post.destroy', $p)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger mt-2" type="submit">Delete</button>
                    </form>

                </td>

            </tr>



            @endforeach

        </tbody>
    </table>

    <div class="mt-4"></div>


    {{$posts -> links()}}


@endsection

