<div class="form-group">

    <label>عنوان دسته بندی</label>

    <input
        type="text"
        name="title"
        class="form-control"

        value="{{ old('title',$postCategory->title ?? '') }}">

    @error('title')

        <small class="text-danger">{{ $message }}</small>

    @enderror

</div>


<div class="form-group mt-2">

    <label>اسلاگ</label>

    <input
        type="text"
        name="slug"
        class="form-control"

        value="{{ old('slug',$postCategory->slug ?? '') }}">

    <small class="text-muted">
        خالی بگذارید تا خودکار ساخته شود.
    </small>

    @error('slug')

        <small class="text-danger">{{ $message }}</small>

    @enderror

</div>
