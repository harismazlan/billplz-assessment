<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <nav class="navbar navbar-light bg-light mb-4">
            <a class="navbar-brand" href="#">Pizza Order</a>
            <a class="btn btn-outline-primary" href="{{ url('/') }}">Home</a>
        </nav>

        <form action="{{ route('calculate-bill') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="size">Pizza Size:</label>
                <select class="form-control" id="size" name="size" required>
                    <option value="small">Small (RM15)</option>
                    <option value="medium">Medium (RM22)</option>
                    <option value="large">Large (RM30)</option>
                </select>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="pepperoni" name="pepperoni" value="1">
                <label class="form-check-label" for="pepperoni">Add Pepperoni (Small +RM3, Medium +RM5)</label>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="extra_cheese" name="extra_cheese" value="1">
                <label class="form-check-label" for="extra_cheese">Add Extra Cheese (+RM6)</label>
            </div>

            <button type="submit" class="btn btn-primary">Calculate Bill</button>
        </form>

        @if (isset($total))
            <div class="mt-4">
                <h2>Order Summary:</h2>
                <p>Size: {{ ucfirst($size) }}</p>
                <p>Pepperoni: {{ $pepperoni ? 'Yes' : 'No' }}</p>
                <p>Extra Cheese: {{ $extra_cheese ? 'Yes' : 'No' }}</p>
                <p class="alert alert-success">Total Bill: RM{{ $total }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="mt-4">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>