@extends('admin.layouts.master')
@section('title')
    اختصاص نقش به کاربر
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">نقش های کاربر : {{$user->name}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('user.store.role', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label for="">نقش های کاربر</label>
                                                @foreach ($roles as $role)
                                                    <input type="checkbox" @if($user->HasRole($role->name)) checked @endif placeholder="ایمیل" name="roles[]"
                                                        value="{{ $role->name }}" class="form-control" />
                                                    <label for="">{{$role->name}}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('users.index') }}"><i class="icon-trash"></i>
                                            لغو</a>
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        <i class="icon-note"></i> ذخیره
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
