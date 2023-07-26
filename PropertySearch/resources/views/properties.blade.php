<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Records</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add Font Awesome CSS link here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom styles */
        body {
            background-color: #b9b9b9; /* Gray background for body */
        }
        .navbar {
            background-color: #000; /* Black background for header */
        }
        .footer {
            background-color: #000; /* Black background for footer */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <!-- Add Font Awesome icon and styling -->
            <a class="navbar-brand" href="#" style="color: #fff; font-weight: bold;">
                <i class="fas fa-home" style="font-size: 24px; margin-right: 8px;"></i>
                Real Estate Listings
            </a>
            <!-- Add any additional navigation items if needed -->
        </div>
    </nav>

    <!-- Add the search forms on the same line using Bootstrap grid -->
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="/search-properties" method="post" class="form-inline">
                    @csrf <!-- Add CSRF token -->
                    <div class="form-group">
                        <label for="zipcode" class="mr-2"></label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Search by ZipCodes" required>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="/search-properties-by-type" method="post" class="form-inline">
                    @csrf <!-- Add CSRF token -->
                    <div class="form-group">
                        <label for="property_type" class="mr-2"></label>
                        <input type="text" name="property_type" id="property_type" class="form-control" placeholder="Search by Property Type" required>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="/search-properties-by-location" method="post" class="form-inline">
                    @csrf <!-- Add CSRF token -->
                    <div class="form-group">
                        <label for="location" class="mr-2"></label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Search by Location" required>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Street Number</th>
                        <th>Street</th>
                        <th>Property Type</th>
                        <th>Zipcode</th>
                        <th>State</th>
                        <th>Last Sales Date</th>
                        <th>Last Sales Amount</th>
                        <th>Max Sales Amount</th>
                        <th>Total Records</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($properties) && is_array($properties))
                        @if(isset($properties['data']) && count($properties['data']) > 0)
                            @foreach($properties['data'] as $property)
                                <tr>
                                    <td>{{ $property['_id']['STREET_NUMBER'] }}</td>
                                    <td>{{ $property['_id']['STREET'] }}</td>
                                    <td>{{ $property['_id']['PROPERTY_TYPE'] }}</td>
                                    <td>{{ $property['_id']['ZIPCODE'] }}</td>
                                    <td>{{ $property['_id']['STATE'] }}</td>
                                    <td>{{ date('Y-m-d', strtotime($property['lastSalesDate'])) }}</td>
                                    <td>{{ $property['lastSalesAmount'] }}</td>
                                    <td>{{ $property['maxSalesAmount'] }}</td>
                                    <td>{{ $property['TotalRecords'] }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">No properties found.</td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td colspan="9">Error retrieving data from the API.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <!-- Add pagination links here (you can use Laravel's pagination methods) -->
                <!-- Example: -->
                {{-- {{ $properties['data']->links() }} --}}
            </ul>
        </nav>
    </div>

    <!-- Footer -->
    <footer class="footer py-3 mt-5">
        <div class="container text-center">
            <p style="color: #fff;">&copy; {{ date('Y') }} Real Estate Listings. All rights reserved.</p>
        </div>
    </footer>

    <!-- Add Bootstrap JS and jQuery scripts here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
