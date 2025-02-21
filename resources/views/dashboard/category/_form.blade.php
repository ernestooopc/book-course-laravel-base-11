@csrf

        <label for="">Title</label>
        <input type="text" name="title" value="{{$category->title}}">

        <label for="">Slug</label>
        <input type="text" name="slug" value="{{$category->slug}}">

        <button type="submit">send</button>
