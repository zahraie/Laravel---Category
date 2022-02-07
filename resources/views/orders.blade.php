<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$pagetitle}}</title>
</head>

<body>
	@foreach($orders as $order)
	عنوان فاکتور : {{$order->title}}<br>
	مبلغ فاکتور : {{$order->amount}}
	<hr>
	@endforeach
</body>

</html>