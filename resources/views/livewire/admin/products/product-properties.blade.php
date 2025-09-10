<div class="card-body">
    <div class="px-3">
        <form wire:submit.prevent="submit" class="form" novalidate>
            <div class="form-body">
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="controls">
                            <select wire:model="property_group_id" class="form-control form-select">
                                <option value="" selected>ویژگی را انتخاب کنید</option>
                                @foreach ($property_groups as $property_group)
                                    <option value="{{ $property_group->id }}"> {{ $property_group->title }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <div class="controls">
                            <label class="sr-only" for="projectinput2">نام محصول</label>
                            <input wire:model="title" type="text" placeholder="نام محصول" class="form-control"
                                required data-validation-required-message="فیلد نام محصول الزامی است">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-danger mr-1">
                    <a class="text-white" href="{{ route('products.index') }}"><i class="icon-trash"></i> لغو</a>
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="icon-note"></i> ذخیره
                </button>
            </div>
        </form>

        <table class="table table-responsive-md text-center">
            <thead>
                <tr>
                    <th>گروه ویژگی</th>
                    <th>ویژگی محصول</th>
                    <th>اقدامات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_property_groups as $index => $property_group)
                    <tr>
                        <td class="text-truncate">
                            <span>{{ $property_group->title }}</span>
                        </td>
                        <td>
                            <ul class="list-group">
                                @foreach ($property_group->properties()->where('product_id', $product->id)->get() as $property)
                                    <div class="d-flex justify-content-center align-items-center">
                                        <li class="list-group-item">
                                            {{ $property->title }}
                                        </li>
                                        <a class="p-0 text-danger"
                                            wire:click="deleteProductProperty({{ $property->id }} ,{{ $property_group->id }} )"
                                            data-original-title="" data-toggle="tooltip" data-placement="top"
                                            title="حذف">
                                            <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </ul>
                        </td>

                        <td style="display: flex;justify-content:center">
                            <a class="p-0 text-danger"
                                wire:click="deleteProductPropertyGroup({{ $property_group->id }})"
                                data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>


@section('script')
    <script>
        $('select').select2([
            dir: "rtl",
            dropdownAutoWidth: true,
            dropdownParent: $('#parent')
        ])
    </script>

    <script>
        window.addEventListener('deleteProductPropertyGroup', event => {
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyProductPropertyGroup', event.detail.property_group_id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })


        window.addEventListener('deleteProductProperty', event => {
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyProductProperty', event.detail.property_id, event.detail
                        .property_group_id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
