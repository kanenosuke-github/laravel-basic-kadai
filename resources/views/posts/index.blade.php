<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel-basic-kadai</title>
</head>
<body>
  <h1>投稿一覧</h1>
  <table>
         <tr>
             <th>ID</th>
             <th>タイトル</th>
             <th>内容</th>
             <th>作成日時</th>
             <th>更新日時</th>
         </tr>
         @foreach($posts as $post)
             <tr>
                 <td>{{ $post->id }}</td>
                 <td>{{ $post->title }}</td>
                 <td>{{ $post->content }}</td>
                 <td>{{ $post->created_at }}</td>
                 <td>{{ $post->updated_at }}</td>
             </tr>            
         @endforeach       
     </table>
</body>
</html>