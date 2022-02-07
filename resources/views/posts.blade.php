<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$pagetitle}}</title>
</head>

<body>
	@foreach($posts as $post)
	شناسه : {{$post->id}}<br>
	عنوان : {{$post->title}}<br>
	توضیحات : {{$post->description}}<br>
	<hr>
	
	
	@endforeach
</body>

</html>