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
                <div class="col-8">
                <div class="card">
                  
                        <div class="card-content">
                          <form method="POST" action="{{route('update',['id' => $data->id])}}" class="addForm">
                              @csrf
                              @method('patch')
                              <select name="product_type">
                                  <option value="cd">CD</option>
                                  <option value="book">book</option>
                              </select>
                              <input type="text" name="title" placeholder="title" value={{ $data->title }} />
                              <input type="text" name="firstname" placeholder="firstname" value={{ $data->firstName }} />
                              <input type="text" name="surname" placeholder="surname" value={{ $data->mainName }} />
                              <input type="text" name="price" placeholder="price" value={{ $data->price }} />
                              <input type="number" name="pages" placeholder="pages/playlenght" value={{ ($data->playLength) ?? ($data->numPages) }} />
                                <input type="submit" value="update" class="btn" />
                          </form>
                          
                          <form action="{{ url('/delete', ['id' => $data->id]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>
