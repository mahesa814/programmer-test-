<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">Mahesa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('nasabah.index') }}">Nasabah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaction.index') }}">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('point.index') }}">Point</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('report.index') }}">Report</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
