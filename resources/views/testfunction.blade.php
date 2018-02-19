<!DOCTYPE html>
<html>
	<head>
		<title>Pay</title>
	</head>
	<body>
    {{-- {{ dd($preference) }} --}}
		<a href="{{ $preference->init_point }}" name="MP-Checkout" class="blue-rn-m">Pagar</a>

		<script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>

	</body>
</html>
