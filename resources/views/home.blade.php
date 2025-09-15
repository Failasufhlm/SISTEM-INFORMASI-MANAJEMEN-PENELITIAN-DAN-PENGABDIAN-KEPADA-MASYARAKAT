<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM-PPM - Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<main class="container">
    <h1>SIM-PPM</h1>
    <p>Selamat datang. Berikut ringkasan data.</p>

    <div class="grid">
        <article>
            <header>Proposals</header>
            <h3>{{ $stats['proposals'] }}</h3>
            <footer><a href="{{ url('/proposals') }}">Lihat semua</a></footer>
        </article>
        <article>
            <header>Reviews</header>
            <h3>{{ $stats['reviews'] }}</h3>
            <footer><a href="{{ url('/proposals') }}">Ke proposals</a></footer>
        </article>
        <article>
            <header>Progress Reports</header>
            <h3>{{ $stats['progress_reports'] }}</h3>
            <footer><a href="{{ url('/proposals') }}">Ke proposals</a></footer>
        </article>
        <article>
            <header>Final Reports</header>
            <h3>{{ $stats['final_reports'] }}</h3>
            <footer><a href="{{ url('/proposals') }}">Ke proposals</a></footer>
        </article>
        <article>
            <header>Outputs</header>
            <h3>{{ $stats['outputs'] }}</h3>
            <footer><a href="{{ url('/proposals') }}">Ke proposals</a></footer>
        </article>
        <article>
            <header>Deadlines</header>
            <h3>{{ $stats['deadlines'] }}</h3>
            <footer><a href="{{ url('/proposals') }}">Ke proposals</a></footer>
        </article>
    </div>

    <h2>Proposal Terbaru</h2>
    <table role="grid">
        <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Tipe</th>
            <th>Status</th>
            <th>Dosen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($latestProposals as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->type }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ optional($p->user)->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>


