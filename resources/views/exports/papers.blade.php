<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .paper-title {
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
        }
        .magazine-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .magazine-table th, .magazine-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .magazine-table th {
            background-color: #FFFF00;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @foreach($magazines as $paperId => $magazineGroup)
        <div class="paper-title">{{ $romanNumeral }}. Paper: {{ $magazineGroup->first()->paper->name }}</div>
        <table class="magazine-table">
            <thead>
                <tr>
                    <th>Magazine Name</th>
                    <th>Year</th>
                    <th>Journal</th>
                    <th>Scientists and Roles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($magazineGroup as $magazine)
                    <tr>
                        <td>{{ $magazine->magazine_name }}</td>
                        <td>{{ $magazine->year }}</td>
                        <td>{{ $magazine->journal }}</td>
                        <td>
                            @foreach ($magazine->scientists as $scientist)
                                {{ $scientist->profile_name }} ({{ \App\Models\Role::find($scientist->pivot->role_id)->role_name }}),
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
    @endforeach
</body>
</html>