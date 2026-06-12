<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses</title>
</head>
<body>

    <h1>Our Courses</h1>

    @php
        $courses = [
            'Web Development',
            'Mobile App Development',
            'Database Fundamentals'
        ];
    @endphp

    <ul>
        @foreach ($courses as $course)
            <li>{{ $course }}</li>
        @endforeach
    </ul>

</body>
</html>