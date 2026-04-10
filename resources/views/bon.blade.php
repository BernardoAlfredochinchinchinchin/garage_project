<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Werkbon</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; color: #111; }
        .bon { max-width: 760px; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        h1 { margin: 0 0 16px; }
        .row { margin: 8px 0; }
        .label { display: inline-block; width: 120px; font-weight: 700; }
        .actions { margin-top: 16px; }
        .actions button { padding: 8px 12px; border-radius: 4px; border: 1px solid #888; background: #f5f5f5; cursor: pointer; }

    </style>
</head>
<body>
    <div class="bon">
        <h1>Werkbon</h1>

        {{-- Gegevens uit afspraak + monteurtaak. --}}
        <div class="row"><span class="label">Klantnaam:</span> {{ $afspraak->naam }}</div>
        <div class="row"><span class="label">Datum:</span> {{ \Carbon\Carbon::parse($afspraak->datum)->format('d-m-Y') }}</div>
        <div class="row"><span class="label">Kenteken:</span> {{ strtoupper($afspraak->kenteken) }}</div>
        <div class="row"><span class="label">Uren:</span> {{ $taak->uren }}</div>
        <div class="row"><span class="label">Materialen:</span> {{ $taak->materialen }}</div>
        <div class="row"><span class="label">Kosten:</span> € {{ number_format($taak->kosten, 2, ',', '.') }}</div>

        
    </div>


</body>
</html>