<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie - The Cinema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body>
    
    <div class="m-5 py-4">
        <h1 class="text-center pb-2">Movie - The Cinema</h1>

        <div class="row rows-cols-2">
            @foreach ($movies as $movie)
                <div class="col">
                    <div class="card shadow" style="width: 25rem;">
                        <img src="{{$movie['cover']}}" class="card-img-top" alt="{{$movie['title']}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$movie['title']}}</h5>
                            <p class="card-text">{!!$movie['synopsis']!!}</p>

                            <br>
                            Starring: 
                            @foreach ($movie['actors'] as $act)
                                {{$act}}
                            @endforeach <br>
                            Director: 
                            @foreach ($movie['director'] as $dic)
                                {{$dic}}
                            @endforeach <br>
                            Genre: {{$movie['genre']}} <br>
                            Age: {{$movie['age']}} <br>
                            Duration: {{$movie['duration']}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>