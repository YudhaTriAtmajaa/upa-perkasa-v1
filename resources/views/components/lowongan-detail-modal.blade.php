{{--
    Job detail modal — opened from "Lihat Detail" on the company
    vacancy-detail page. One instance is rendered per job (unique id).

    Props:
        job       array  ['id','title','tagsShort','deadline','applyUrl', ...
                        'description','requirements' => [...], 'responsibilities' => [...]]
        company   array  ['name','logo','location']
        modalId   string
--}}
<div class="modal fade upa-lowongan-modal" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" data-lenis-prevent>
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h2 class="modal-title" id="{{ $modalId }}Label">{{ $job['title'] }}</h2>
                    @if (!empty($job['tagsShort']))
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <span class="upa-lowongan-card__meta-label mb-0">Mencari:</span>
                            @foreach ($job['tagsShort'] as $tag)
                                <span class="upa-lowongan-tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <div class="upa-lowongan-modal__company">
                    <div class="upa-lowongan-modal__company-logo">
                        @if (!empty($company['logo']))
                            <img src="{{ $company['logo'] }}" alt="Logo {{ $company['name'] }}">
                        @else
                            <i class="bi bi-building text-muted"></i>
                        @endif
                    </div>
                    <div>
                        <p class="upa-lowongan-modal__company-name">{{ $company['name'] }}</p>
                        <p class="upa-lowongan-modal__company-loc mb-0">{{ $company['shortLocation'] ?? $company['location'] }}</p>
                    </div>
                </div>

                @if (!empty($job['posters']))
                    <div class="upa-lowongan-modal__posters">
                        @foreach ($job['posters'] as $i => $poster)
                            <button type="button" class="upa-lowongan-modal__poster-thumb js-poster-thumb"
                                    data-poster-full="{{ $poster }}"
                                    aria-label="Lihat poster {{ $i + 1 }} ukuran penuh">
                                <img src="{{ $poster }}" alt="Poster lowongan {{ $job['title'] }} {{ $i + 1 }}">
                            </button>
                        @endforeach
                    </div>
                @endif

                @if (!empty($job['description']))
                    <p class="upa-lowongan-modal__section-title">Deskripsi</p>
                    <p class="upa-lowongan-modal__desc">{{ $job['description'] }}</p>
                @endif

                @if (!empty($job['requirements']))
                    <p class="upa-lowongan-modal__section-title">Persyaratan</p>
                    <ul class="upa-lowongan-modal__list upa-lowongan-modal__list--check">
                        @foreach ($job['requirements'] as $req)
                            <li><i class="bi bi-check-circle-fill"></i><span>{{ $req }}</span></li>
                        @endforeach
                    </ul>
                @endif

                @if (!empty($job['responsibilities']))
                    <p class="upa-lowongan-modal__section-title">Tanggung Jawab Pekerjaan</p>
                    <ul class="upa-lowongan-modal__list upa-lowongan-modal__list--arrow">
                        @foreach ($job['responsibilities'] as $resp)
                            <li><i class="bi bi-arrow-right"></i><span>{{ $resp }}</span></li>
                        @endforeach
                    </ul>
                @endif

                <div class="upa-lowongan-modal__notice">
                    <i class="bi bi-info-circle-fill"></i>
                    <span>Hanya kandidat yang sesuai kualifikasi yang akan dihubungi untuk tahapan selanjutnya.</span>
                </div>

                <div class="upa-lowongan-modal__facts">
                    <div class="upa-lowongan-modal__fact">
                        <span class="upa-lowongan-modal__fact-label">Lokasi Kerja</span>
                        <span class="upa-lowongan-modal__fact-value">{{ $company['location'] }}</span>
                    </div>
                    <div class="upa-lowongan-modal__fact">
                        <span class="upa-lowongan-modal__fact-label">Batas Pendaftaran</span>
                        <span class="upa-lowongan-modal__fact-value upa-lowongan-modal__fact-value--danger">{{ $job['deadline'] }}</span>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4">
                    <div class="upa-lowongan-modal__share">
                        <span>Bagikan:</span>
                        <button type="button" class="upa-lowongan-modal__share-btn" aria-label="Bagikan lowongan">
                            <i class="bi bi-share-fill"></i>
                        </button>
                        <button type="button" class="upa-lowongan-modal__share-btn" aria-label="Salin tautan">
                            <i class="bi bi-clipboard"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-upa-outline upa-lowongan-modal__btn-close" data-bs-dismiss="modal">Tutup</button>
                <a href="{{ $job['applyUrl'] ?? '#' }}" class="btn btn-upa-primary">
                    <i class="bi bi-lightning-charge-fill me-1"></i>Lamar Sekarang
                </a>
            </div>
        </div>
    </div>
</div>