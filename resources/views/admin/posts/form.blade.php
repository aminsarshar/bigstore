<div class="row">

    <div class="col-md-8">

        <div class="form-group">
            <label>عنوان مقاله</label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title',$post->title ?? '') }}">
        </div>

    </div>

    <div class="col-md-4">

        <div class="form-group">
            <label>دسته بندی</label>

            <select
                name="post_category_id"
                class="form-control">

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"

                        @selected(old('post_category_id',$post->post_category_id ?? '')==$category->id)

                    >

                        {{ $category->title }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

</div>

<hr>

<div class="form-group">

    <label>اسلاگ</label>

    <input
        type="text"
        name="slug"
        class="form-control"

        value="{{ old('slug',$post->slug ?? '') }}">

</div>

<hr>

<div class="form-group">

    <label>خلاصه مقاله</label>

    <textarea
        name="excerpt"
        rows="4"
        class="form-control">{{ old('excerpt',$post->excerpt ?? '') }}</textarea>

</div>

<hr>

<div class="form-group">

    <label>متن مقاله</label>

    <textarea
        id="editor"
        name="body"
        rows="12"
        class="form-control">{{ old('body',$post->body ?? '') }}</textarea>

</div>

<hr>

<div class="row">

<div class="col-md-6">

<div class="form-group">

<label>SEO Title</label>

<input
type="text"
name="seo_title"
class="form-control"

value="{{ old('seo_title',$post->seo_title ?? '') }}">

</div>

</div>

<div class="col-md-6">

<div class="form-group">

<label>زمان مطالعه</label>

<input
type="number"
name="reading_time"
class="form-control"

value="{{ old('reading_time',$post->reading_time ?? 1) }}">

</div>

</div>

</div>

<div class="form-group">

<label>SEO Description</label>

<textarea

name="seo_description"

rows="3"

class="form-control">{{ old('seo_description',$post->seo_description ?? '') }}</textarea>

</div>

<hr>

<div class="row">

<div class="col-md-4">

<label>

<input
type="checkbox"

name="status"

value="1"

@checked(old('status',$post->status ?? true))

>

انتشار

</label>

</div>

<div class="col-md-4">

<label>

<input

type="checkbox"

name="is_featured"

value="1"

@checked(old('is_featured',$post->is_featured ?? false))

>

مقاله ویژه

</label>

</div>

</div>
