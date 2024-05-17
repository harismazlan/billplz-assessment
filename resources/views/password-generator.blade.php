<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <nav class="navbar navbar-light bg-light mb-4">
            <a class="navbar-brand" href="#">Password Generator</a>
            <a class="btn btn-outline-primary" href="{{ url('/') }}">Home</a>
        </nav>

        <form action="{{ route('generate-password') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="length">Password Length:</label>
                <input type="number" class="form-control" id="length" name="length" value="12" min="8" required>
            </div>

            <div class="form-group form-check">
                <input type="hidden" name="include_lowercase" value="0">
                <input type="checkbox" class="form-check-input" id="include_lowercase" name="include_lowercase"
                    value="1" {{ old('include_lowercase', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="include_lowercase">Include Lowercase Letters</label>
            </div>

            <div class="form-group form-check">
                <input type="hidden" name="include_uppercase" value="0">
                <input type="checkbox" class="form-check-input" id="include_uppercase" name="include_uppercase"
                    value="1" {{ old('include_uppercase', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="include_uppercase">Include Uppercase Letters</label>
            </div>

            <div class="form-group form-check">
                <input type="hidden" name="include_numbers" value="0">
                <input type="checkbox" class="form-check-input" id="include_numbers" name="include_numbers" value="1" {{ old('include_numbers', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="include_numbers">Include Numbers</label>
            </div>

            <div class="form-group form-check">
                <input type="hidden" name="include_symbols" value="0">
                <input type="checkbox" class="form-check-input" id="include_symbols" name="include_symbols" value="1" {{ old('include_symbols', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="include_symbols">Include Symbols</label>
            </div>

            <button type="submit" class="btn btn-primary">Generate Password</button>
        </form>

        @if (isset($password))
            <div class="mt-4">
                <h2>Generated Password:</h2>
                <p class="alert alert-success">{{ $password }}</p>
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