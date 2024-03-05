<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz Action</title>
    <link rel="stylesheet" href="{!! url('css/style.css') !!}">
</head>
<body>
    <div class="container">
        <div class="title"><h1>00:00</h1></div>
        <div class="menu-info">
            <div class="info">
                <span>Nama Peserta : {{ Auth::user()->name }}</span>
                <span>Username : {{ Auth::user()->username }} </span>
            </div>
            <div class="info">
                <span>Nama Quiz : {{ $getSingle->name  }}</span>
                <span>Kategori Quiz : {{ $getSingle->category  }}</span>
                <span>Soal Random : {{ $getSingle->random_type }}</span>
            </div>
        </div>
        <div class="main-quiz-action">
            @php
              $i = 1;
              @endphp
              <form action="" method="post">
                  @csrf
                  <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            @foreach ($getRecord as $item)    
            <div class="quiz-action-box">
                <div class="title-action-quiz">
                    <h2>{{ $loop->iteration }}. {{ $item->description }}</h2>
                </div>
                <div class="sub-title-action-quiz">
                        <ul>
                            <li>
                                <input type="hidden" class="form-control" value="{{ $item['id'] }}"  name="answer[{{ $i }}][quesion_id]">
                                <input type="radio" name="answer[{{ $i }}][choice]" value="1">
                                <label for="">A. {{ $item->chioce_1 }}</label>
                            </li>
                            <li>
                                <input type="radio" name="answer[{{ $i }}][choice]" value="2">
                                <label for="">B. {{ $item->chioce_2 }}</label>
                            </li>
                            <li>
                                <input type="radio" name="answer[{{ $i }}][choice]" value="3">
                                <label for="">C. {{ $item->chioce_3 }}</label>
                            </li>
                            <li>
                                <input type="radio" name="answer[{{ $i }}][choice]" value="4">
                                <label for="">D. {{ $item->chioce_4 }}</label>
                            </li>
                        </ul> 
                        @php
                         $i ++;
                         @endphp
                    </div>
                </div>
                @endforeach
                <div style="text-align: center; padding: 20px">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
        <div class="paginate">
            {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
        </div>
    </div>
</body>
</html>