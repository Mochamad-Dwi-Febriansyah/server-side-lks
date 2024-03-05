<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link rel="stylesheet" href="{!! url('css/style.css') !!}">
</head>
<body>
    <div class="container">
        <div class="title"><h1>Selamat Datang {{ Auth::user()->name }}</h1></div>
        <div class="menu-button">
            <a href="{{ url('/quizz-completed') }}"><span>Quiz</span></a>
            <a href=""><span>User</span></a>
            <a href="{{ url('/logout') }}"><span>Logout</span></a>
        </div>
        <div class="menu-help">
            <div class="search">
                <form action="" method="get">
                    <input type="text" name="name" value="{{ Request::get('name') }}" placeholder="CARI">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="sort-by">
                <button>Sort By</button>
            </div>
        </div>
        <div class="main-quiz">
            @foreach ($getRecord as $item)    
            <div class="quiz-box">
                <div class="title-quiz"><h2>{{ $loop->iteration }}. {{ $item->name }}</h2></div>
                <div class="sub-title-quiz">
                    <ul>
                        <li>Kategori : {{ $item->category }}</li>
                        <li>Jadwal : {{ $item->schedule }}</li>
                        <li>Jam : {{ $item->time_start }} - {{ $item->time_end }}</li>
                        <li>Random : {{ $item->random_type }}</li>
                        <li>Status : {{ $item->status }}</li>
                    </ul>
                </div>
            </div> 
            @endforeach

        </div>
        <div class="paginate">
            {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
        </div>
    </div>
</body>
</html>