<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>検索機能応用</h1>
<!-- 今回はbladeの機能は使わず、簡易的に1つのビューファイルに記述します。

検索機能は3つです。
・キーワードを入力し、教材名から部分一致検索
・媒体をプルダウンより選択して検索
・カテゴリーをプルダウンより選択して検索

プルダウンの選択肢には、データベースに保存されている値を呼び出しています。 -->
<div class="search">
  <!-- 検索機能ここから -->
  <form action="{{ route('index') }}" method="get">
    @csrf
    <div class="form-group">
      <div>
        <label for="keyword">キーワード
          <div>
            <input type="text" name="keyword" value="{{ $keyword }}">
          </div>
        </label>
      </div>
      <div>
        <label for="medium">媒体
          <div>
            <select name="medium" data-toggle="select">
              <option value="">全て</option>
              @foreach($media_list as $media_item)
                <option value="{{ $media_item->medium }}" @if($medium=='{{ $media_item->medium }}') selected @endif>{{ $media_item->medium }}</option>
              @endforeach
            </select>
          </div>
        </label>
      </div>
      <div>
        <label for="category">カテゴリー
          <div>
            <select name="category" data-toggle="select">
              <option value="">全て</option>
              @foreach($categories_list as $categories_item)
                <option value="{{ $categories_item->category }}" @if($category=='{{ $categories_item->category }}') selected @endif>{{ $categories_item->category }}</option>
              @endforeach
            </select>
          </div>
        </label>
      </div>
      <div>
        <input type="submit" value="検索" class="btn">
      </div>
    </div>
  </form>
  <!-- ここまで -->
</div>
<table>
  <tr>
    <th>教材名</th>
    <th>媒体</th>
    <th>コンテンツ</th>
  </tr>
  @foreach($items as $item)
  <tr>
    <td>{{ $item->name }}</td>
    <td>{{ $item->medium }}</td>
    <td>{{ $item->category }}</td>
    <!-- mediaテーブルとcategoriesテーブルを結合しているので、この記述でアクセスできる -->
  </tr>
  @endforeach
</table>
</body>
</html>
