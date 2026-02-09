@include('common.header')

<style>
    .ai-feed {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .ai-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e7eaf0;
        padding: 1.25rem 1.5rem;
        position: relative;
        transition: all .25s ease;
    }

    /* AI Accent Line */
    .ai-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 12px;
        bottom: 12px;
        width: 4px;
        background: linear-gradient(180deg, #0d6efd, #6610f2);
        border-radius: 4px;
        opacity: .85;
    }

    .ai-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(13,110,253,.12);
        border-color: #dbe2ff;
    }

    .ai-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: .6rem;
    }

    .ai-id {
        font-size: .7rem;
        letter-spacing: .6px;
        text-transform: uppercase;
        color: #6c757d;
        font-weight: 600;
    }

    .ai-status-active {
        font-size: .75rem;
        font-weight: 600;
        color: #198754;
    }

    .ai-status-inactive {
        font-size: .75rem;
        font-weight: 600;
        color: #dc3545;
    }

    .ai-name {
        font-size: .95rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: .25rem;
    }

    .ai-email {
        font-size: .75rem;
        color: #6c757d;
    }

    .ai-tags {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
        margin-top: .75rem;
    }

    .ai-tag {
        font-size: .7rem;
        padding: .3rem .7rem;
        border-radius: 50px;
        background: #f1f3f9;
        border: 1px solid #e1e5ef;
        white-space: nowrap;
    }

    .ai-message {
        margin-top: .75rem;
        font-size: .82rem;
        color: #343a40;
        line-height: 1.6;
        max-width: 1000px;
    }

    .ai-footer {
        display: flex;
        align-items: center;
        margin-top: 1rem;
        gap: .75rem;
    }

    .ai-date {
        font-size: .7rem;
        color: #6c757d;
    }
</style>

<main class="content-body">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h6 class="fw-semibold mb-1">AI Meeting Research Feed</h6>
            <small class="text-muted">
                Intelligent academic & professional interactions
            </small>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm shadow-sm">
                Back
            </a>
            <a href="{{ route('add.meting') }}" class="btn btn-info btn-sm">
                + New Meeting
            </a>
        </div>
    </div>

    <!-- Feed -->
    <div class="ai-feed">

        @forelse ($meetings as $meeting)

            <div class="ai-card">

                <!-- Top -->
                <div class="ai-top">
                    <span class="ai-id">
                        MEETING #{{ $meeting->id }} • {{ $meeting?->site?->sitename }}
                    </span>

                    @if ($meeting->status == 1)
                        <span class="ai-status-active">● ACTIVE</span>
                    @else
                        <span class="ai-status-inactive">● INACTIVE</span>
                    @endif
                </div>

                <!-- Identity -->
                <div class="ai-name">{{ $meeting->name }}</div>
                <div class="ai-email">{{ $meeting->email }}</div>

                <!-- Tags -->
                <div class="ai-tags">
                    <span class="ai-tag">🎓 {{ $meeting->course }}</span>
                    <span class="ai-tag">🧠 {{ $meeting->supportType }}</span>
                    <span class="ai-tag">📊 Level: {{ $meeting->level }}</span>
                    <span class="ai-tag">🏢 {{ $meeting?->vendorId?->name }}</span>
                    <span class="ai-tag">📅 {{ $meeting->meetingDate }}</span>
                </div>

                <!-- Message -->
                <div class="ai-message">
                    {{ $meeting->message }}
                </div>

                <!-- Footer -->
                <div class="ai-footer">
                    @if($meeting->meetingLink)
                        <a href="{{ $meeting->meetingLink }}" target="_blank"
                           class="btn btn-sm btn-outline-primary rounded-pill">
                            Join Meeting
                        </a>
                    @endif

                    <span class="ai-date ms-auto">
                        Created {{ $meeting->created_at->format('d M Y') }}
                    </span>
                </div>

            </div>

        @empty
            <div class="text-center text-muted py-4">
                No meetings available
            </div>
        @endforelse

    </div>

</main>

@include('common.footer')
