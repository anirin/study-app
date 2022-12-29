<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>SETTING</title>
</head>
<body>
    <div>
      <a href = "{{ url('/') }}" >TOP</a>
    </div>
    <form action="{{ route('study.setting') }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            勉強時間
            <input type="number" name="study_time" value="{{old('play_time')?: $setting->study_time}}">
        </div>
        <div>
            休憩時間
            <input type="number" name="rest_time" value="{{old('play_time')?: $setting->rest_time}}">
        </div>
        <button type="submit">
            設定する
        </button>
    </form>
</body>
</html>