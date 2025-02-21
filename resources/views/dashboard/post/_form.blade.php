@csrf

        <label for="">Title</label>
        <input type="text" name="title" value="{{$post->title}}">

        <label for="">Slug</label>
        <input type="text" name="slug" value="{{$post->slug}}">

        <label for="">Content</label>
        <textarea name="content" >{{$post->content}}</textarea>

        <label for="">Category</label>
        <select name="category_id" id="">

            @foreach ($categories as $title => $id)
                <option {{$post->category_id == $id ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
            @endforeach

        </select>

        <label for="">Description</label>
        <textarea name="description" >{{$post->description}}</textarea>

        <label for="">Posted</label>
        <select name="posted">
            <option {{$post->posted == 'not' ? 'selected' : ''}} value="not">NOT</option>
            <option {{$post->posted == 'yes' ? 'selected' : ''}} value="yes">YES</option>
        </select>

        @if (isset($task) && $task == 'edit')
            <label for="">Image</label>
            <input type="file" name="image">
        @endif


        <button type="submit">send</button>
