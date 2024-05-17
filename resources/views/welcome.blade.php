<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><b>BillPlz Pre-Interview Assessment</b><small> By Haris Mazlan</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('password-generator') }}">Password Generator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pizza-order') }}">Pizza Order</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to My Laravel App!</h1>
            <p class="lead">This is a simple application to demonstrate password generation and pizza ordering
                functionality.</p>
            <hr class="my-4">
            <p>Click the buttons below to explore the features:</p>
            <a class="btn btn-primary btn-lg" href="{{ route('password-generator') }}" role="button">Password
                Generator</a>
            <a class="btn btn-secondary btn-lg" href="{{ route('pizza-order') }}" role="button">Pizza Order</a>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            Users have many credits, each credit has a balance column and created datetime
                            (timezone UTC). Write an SQL statement to retrieve users’ last credit balance on 31st
                            December 2022.
                        </h5>
                        <p class="card-text">
                            SELECT user_id, balance
                            FROM credits
                            WHERE created_at <= '2022-12-31 23:59:59' AND (user_id, created_at) IN ( SELECT user_id,
                                MAX(created_at) FROM credits WHERE created_at <='2022-12-31 23:59:59' GROUP BY user_id )
                                </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            What is the difference between saved VS afterCommit?
                        </h5>
                        <p class="card-text">
                            The saved event is fired when an Eloquent model is saved to the database, while the
                            afterCommit
                            event is fired after the database transaction is successfully committed. The afterCommit
                            event
                            is useful when you need to perform an action after the database transaction is successfully
                            committed. (Using try and transaction in Laravel to ensure the transaction is successful is
                            useful to avoid implementing changes when it should not happen)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            Users have many comments and comments can be liked by other users. Write an SQL statement to
                            count how many users liked that comment.
                        </h5>
                        <p class="card-text">
                            SELECT COUNT(DISTINCT user_id) AS likes_count
                            FROM likes
                            WHERE comment_id = 'comment_id';
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            A snail can climb up 3 meters a day and it will drop 2 meters at night. The well is 11
                            meters deep. How many days will the snail need to come out from the well if the snail
                            starts climbing in the morning?
                        </h5>
                        <p class="card-text">
                            The snail will climb 1 meter per day. After a full cycle of 8 days, the Snail will be on the 8th meter point. On the 9th day, the snail will climb 3 meters and
                            reach the top of the well. So the answer is 9 days or 8 days and 1 day (morning only)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2024 BillPlz - Assessment</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
