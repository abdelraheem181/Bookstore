@extends('layouts.main')

@section('content')
<div class="container">
      <div class="row justify-content-center">
            <div class="col-md-8">
                  <div class="card">
                        <div class="card-header">تصنيفات الكتب</div>


                        <div class="card-body">
                              <div class="row-justify-content-center">
                                    <form action="{{ route('cotegories.search')}}" method="GET">
                                          <div class="row d-flex justify-content-center">
                                              <input type="text" class="col-3 mx-sm-3 mb-2" name="term" placeholder="ابحث عن تصنيف...">
                                              <button type="submit" class="col-1 btn btn-secondary bg-secondary mb-2">ابحث</button>
                                          </div>
                                      </form>
                              </div>

                              <hr>

                              <br>
                              <h1 class="my-3"><b> {{$title}}</b></h1>
                              @if($categories->count())
                                <ul>
                                    @foreach ($categories as $category)
                                    <a style="color:grey" href="{{ route('categories.list', $category) }}">
                                          <li class="list-group-item">
                                              {{ $category->name }} ({{ $category->books->count() }})
                                          </li>
                                      </a>
                                    @endforeach
                                </ul>

                              @else
                              <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Well done!</h4>
                                    <p>حاول مرة اخرى رجاء </p>
                                    <hr>
                                    <p class="mb-0">شكرا لك</p>
                                </div>
                              @endif

                        </div>
                  </div>
            </div>
      </div>
</div>
    
@endsection