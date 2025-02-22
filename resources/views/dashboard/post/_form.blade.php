@csrf

        <label for="">Title</label>
        <input class="form-control" type="text" name="title" value="{{$post->title}}">

        <label for="">Slug</label>
        <input class="form-control" type="text" name="slug" value="{{$post->slug}}">

        <label for="">Content</label>
        <textarea class="form-control" name="content" >{{$post->content}}</textarea>

        <label for="">Category</label>
        <select class="form-control" name="category_id" id="">

            @foreach ($categories as $title => $id)
                <option {{$post->category_id == $id ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
            @endforeach

        </select>

        <label for="">Description</label>
        <textarea class="form-control"name="description" >{{$post->description}}</textarea>

        <label for="">Posted</label>
        <select class="form-control" name="posted">
            <option {{$post->posted == 'not' ? 'selected' : ''}} value="not">NOT</option>
            <option {{$post->posted == 'yes' ? 'selected' : ''}} value="yes">YES</option>
        </select>

        @if (isset($task) && $task == 'edit')
            <label for="">Image</label>
            <input class="form-control" type="file" name="image">
        @endif


        <button class="btn btn-success mt-4" type="submit">send</button>
