<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Component 2</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('app.css')}}">
    </head>
    <body>
        <div class="mainWrapper">
            <div class="wrapper mt-5">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                           <h2> Book</h2>
                        </div>
                       @foreach($book[0] as $item)
                         <div class="card-content">
                           <h4>{{$item->title}}</h4>
                           <p>{{ $item->firstName.$item->mainName}}</p>
                           <p>{{ $item->price }}</p>
                           <p>Number of pages : {{ $item->numPages }}</p>
                            <a href="{{ route('select',$item->id) }}" class="btn">SELECT </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-3">
                <div class="card">
                        <div class="card-header">
                           <h2> CD</h2>
                        </div>
                       @foreach($cd[0] as $item)
                         <div class="card-content">
                           <h4>{{$item->title}}</h4>
                           <p>{{ $item->firstName.$item->mainName}}</p>
                           <p>{{ $item->price }}</p>
                           <p>Number of pages : {{ $item->playLength }}</p>
                            <a href="{{ route('select',$item->id) }}" class="btn">SELECT </a>
                        </div>
                        @endforeach
                    </div>
                                </div>
                <div class="col-3">
                <div class="card">
                         <div class="card-content">
                          <form method="POST" action="{{ route('addNewproduct') }}" class="addForm">
                              @csrf
                              <select name="product_type">
                                  <option value="cd">CD</option>
                                  <option value="book">book</option>
                              </select>
                              <input type="text" name="title" placeholder="title" />
                              <input type="text" name="firstname" placeholder="firstname" />
                              <input type="text" name="surname" placeholder="surname" />
                              <input type="text" name="price" placeholder="price" />
                              <input type="number" name="pages" placeholder="pages/playlenght" />
                                <input type="submit" value="Add new" class="btn" />

                          </form>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
