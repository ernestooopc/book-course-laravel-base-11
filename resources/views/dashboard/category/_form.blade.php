@csrf

        <label for="">Title</label>
        <input class="form-control" type="text" name="title" value="{{$category->title}}">

        <label for="">Slug</label>
        <input class="form-control" type="text" name="slug" value="{{$category->slug}}">

        <button class="btn btn-success mt-4" type="submit">send</button>
