@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">


            <div id="vue-wrapper">
                <div class="content">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="name" name="name"
                                   required v-model="newItem.name" placeholder="Name of a thing you love">

                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="description" name="description"
                                   required v-model="newItem.description" placeholder="Why do you love it?">

                        </div>
                        <div class="col-md-2">
                            <select name="category_id" class="form-control" v-model="newItem.category_id">
                                @foreach ($categories as $menu_category)
                                    <option value="{{ $menu_category->id }}">{{ $menu_category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary" @click.prevent="createItem()" id="name" name="name">
                                <span class="glyphicon glyphicon-plus"></span> ADD
                            </button>
                        </div>
                    </div>
                    <p class="text-center alert alert-danger"
                       v-bind:class="{ hidden: hasError }">Please enter a value!</p>
                    {{ csrf_field() }}
                    <p class="text-center alert alert-success"
                       v-bind:class="{ hidden: hasDeleted }">Deleted Successfully!</p>

                    <div class="table table-borderless" id="table">
                        <table class="table table-borderless" id="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Notes</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tr v-for="item in items">
                                <td>@{{ item.name }}</td>
                                <td>@{{ item.category.name }}</td>
                                <td>@{{ item.description }}</td>
                                <td>
                                    <a @click.prevent="deleteItem(item)" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
