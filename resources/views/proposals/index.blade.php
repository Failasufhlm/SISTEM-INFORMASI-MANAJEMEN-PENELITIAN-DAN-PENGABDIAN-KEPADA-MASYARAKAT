<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proposal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<main class="container">
    <h1>Daftar Proposal</h1>
    <form method="get">
        <div class="grid">
            <input type="text" name="q" placeholder="Cari judul" value="{{ $filters['q'] }}">
            <select name="type">
                <option value="">Semua Tipe</option>
                <option value="penelitian" @selected($filters['type']==='penelitian')>Penelitian</option>
                <option value="pengabdian" @selected($filters['type']==='pengabdian')>Pengabdian</option>
            </select>
            <select name="status">
                <option value="">Semua Status</option>
                <option value="submitted" @selected($filters['status']==='submitted')>Submitted</option>
                <option value="approved" @selected($filters['status']==='approved')>Approved</option>
                <option value="rejected" @selected($filters['status']==='rejected')>Rejected</option>
            </select>
            <button type="submit">Filter</button>
        </div>
    </form>

    <table role="grid">
        <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Tipe</th>
            <th>Status</th>
            <th>Dosen</th>
            <th>File</th>
            <th>Reviews</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proposals as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->type }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ optional($p->user)->name }}</td>
                <td>
                    @if($p->file_path)
                        <a href="{{ asset('storage/'.$p->file_path) }}" target="_blank">Lihat</a>
                    @endif
                </td>
                <td>{{ $p->reviews->count() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $proposals->links() }}
</main>
</body>
</html>


