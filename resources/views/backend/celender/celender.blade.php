@extends('backend.master')
@section('content')
<style>
    :root {
      --bg: #0b1220;
      --panel: #0f1a2a;
      --muted: #a6b0c3;
      --accent: #6c63ff;
      --accent2: #4641B3;
    }

    body {
      margin: 0;
      font-family: "Inter", sans-serif;
      background: #081028;
      color: #e6eef8;
      min-height: 100vh;
    }

    .main-wrapper {
      display: grid;
      grid-template-columns: 3fr 1fr;
      gap: 20px;
      margin-top: 20px;
    }

    @media(max-width:1100px) {
      .main-wrapper { grid-template-columns: 1fr; }
    }

    .month-card {
      background: #0B1739;
      border-radius: 12px;
      border: 1px solid rgba(108, 99, 255, 0.3);
      padding: 20px;
    }

    .wk {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      text-align: center;
      font-size: 14px;
      font-weight: 600;
      color: var(--muted);
      margin-bottom: 10px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      padding-bottom: 10px;
    }

    .days {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 5px;
    }

    .day {
      background: rgba(255, 255, 255, 0.02);
      border-radius: 6px;
      min-height: 110px;
      padding: 8px;
      border: 1px solid rgba(255,255,255,0.05);
      display: flex;
      flex-direction: column;
      gap: 4px;
      transition: all 0.2s;
    }

    .day.outside { opacity: 0.15; pointer-events: none; }

    .date-num { 
        font-size: 14px; 
        font-weight: 700; 
        align-self: flex-end;
    }

    .today {
      background: rgba(108, 99, 255, 0.15) !important;
      border: 1px solid var(--accent) !important;
    }

    /* Event Badge with Delete Button */
    .event-badge {
        font-size: 10px;
        padding: 3px 6px;
        border-radius: 4px;
        background: var(--accent);
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2px;
        border-left: 3px solid #fff;
    }

    .delete-btn {
        cursor: pointer;
        margin-left: 5px;
        color: #ff4d4d;
        font-weight: bold;
        font-size: 12px;
        line-height: 1;
    }

    .delete-btn:hover { color: #fff; }

    .sidebar-box {
      background: var(--panel);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 12px;
      padding: 20px;
      position: sticky;
      top: 100px;
    }

    .form-control {
      background: #0d1423;
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: #fff;
    }

    a{
        text-decoration: none;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-3 mt-5">
    <h2 id="currentMonthYear" style="font-weight: 700;">Calendar</h2>
    <div>
        <button class="btn btn-sm btn-outline-primary" id="prevMonthBtn">← Prev</button>
        <button class="btn btn-sm btn-primary mx-1" id="todayBtn">Today</button>
        <button class="btn btn-sm btn-outline-primary" id="nextMonthBtn">Next →</button>
    </div>
</div>

<div class="main-wrapper">
    <div id="calendarContainer"></div>

    <div class="sidebar-section">
        <div class="sidebar-box">
            <div class="text-center mb-4">
                <div class="muted">Server Time</div>
                <div id="sidebarDate" style="font-weight:700; color:var(--accent); font-size: 18px;"></div>
                <div id="sidebarDay" class="muted small"></div>
            </div>

            <h6 class="mb-3">Quick Add Event</h6>
            <form id="quickEventForm">
                @csrf
                <div class="mb-2">
                    <input type="text" id="eventTitle" class="form-control form-control-sm" placeholder="Event Title" required>
                </div>
                <div class="mb-3">
                    <input type="date" id="eventDate" class="form-control form-control-sm" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-sm btn-primary">Save Event</button>
                </div>
            </form>

            <h6 class="mt-4 mb-3">Upcoming This Month</h6>
            <div id="upcomingList"></div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let allEvents = @json($events ?? []); 

    const calendarContainer = document.getElementById("calendarContainer");
    const realToday = new Date();
    let currentNavDate = new Date(); 

    function renderCalendar(date) {
        calendarContainer.innerHTML = "";
        const year = date.getFullYear();
        const month = date.getMonth();
        document.getElementById('currentMonthYear').textContent = date.toLocaleString('en-US', { month: 'long', year: 'numeric' });

        const monthCard = document.createElement("div");
        monthCard.className = "month-card";

        const wk = document.createElement("div");
        wk.className = "wk";
        ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"].forEach(d => {
            const el = document.createElement("div");
            el.textContent = d;
            wk.appendChild(el);
        });
        monthCard.appendChild(wk);

        const daysDiv = document.createElement("div");
        daysDiv.className = "days";

        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();
        const prevLastDate = new Date(year, month, 0).getDate();

        for (let i = firstDay; i > 0; i--) daysDiv.appendChild(createDayCell(new Date(year, month - 1, prevLastDate - i + 1), true));
        for (let d = 1; d <= lastDate; d++) daysDiv.appendChild(createDayCell(new Date(year, month, d), false));
        let remaining = 42 - daysDiv.children.length;
        for (let i = 1; i <= remaining; i++) daysDiv.appendChild(createDayCell(new Date(year, month + 1, i), true));

        monthCard.appendChild(daysDiv);
        calendarContainer.appendChild(monthCard);
        updateUpcomingList(year, month);
    }

    function createDayCell(dateObj, isOutside) {
        const div = document.createElement("div");
        div.className = "day" + (isOutside ? " outside" : "");
        const num = document.createElement("div");
        num.className = "date-num";
        num.textContent = dateObj.getDate();
        div.appendChild(num);

        if (!isOutside) {
            const dateStr = dateObj.getFullYear() + '-' + 
                            String(dateObj.getMonth() + 1).padStart(2, '0') + '-' + 
                            String(dateObj.getDate()).padStart(2, '0');

            const dayEvents = allEvents.filter(e => e.event_date === dateStr);
            dayEvents.forEach(event => {
                const badge = document.createElement("div");
                badge.className = "event-badge";
                badge.innerHTML = `<span>${event.title}</span><span class="delete-btn" onclick="deleteEvent(${event.id})">&times;</span>`;
                div.appendChild(badge);
            });
        }
        if (dateObj.toDateString() === realToday.toDateString()) div.classList.add("today");
        return div;
    }

    function deleteEvent(id) {
        if (!confirm('Delete this event?')) return;
        $.ajax({
            url: `/events/delete/${id}`, // আপনার ডিলিট রাউট ইউআরএল
            type: "DELETE",
            data: { _token: "{{ csrf_token() }}" },
            success: function() {
                allEvents = allEvents.filter(e => e.id !== id);
                renderCalendar(currentNavDate);
            }
        });
    }

    $('#quickEventForm').on('submit', function(e) {
        e.preventDefault();
        const data = { title: $('#eventTitle').val(), event_date: $('#eventDate').val(), _token: "{{ csrf_token() }}" };
        $.ajax({
            url: "{{ route('event.store') }}",
            type: "POST",
            data: data,
            success: function(res) {
                allEvents.push({ id: res.id, title: data.title, event_date: data.event_date });
                renderCalendar(currentNavDate);
                $('#quickEventForm')[0].reset();
            }
        });
    });

    // Sidebar and Nav logic
    document.getElementById('sidebarDate').textContent = realToday.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    document.getElementById('sidebarDay').textContent = realToday.toLocaleDateString('en-US', { weekday: 'long' });
    document.getElementById('prevMonthBtn').onclick = () => { currentNavDate.setMonth(currentNavDate.getMonth() - 1); renderCalendar(currentNavDate); };
    document.getElementById('nextMonthBtn').onclick = () => { currentNavDate.setMonth(currentNavDate.getMonth() + 1); renderCalendar(currentNavDate); };
    document.getElementById('todayBtn').onclick = () => { currentNavDate = new Date(); renderCalendar(currentNavDate); };

    function updateUpcomingList(y, m) {
        const list = document.getElementById('upcomingList');
        list.innerHTML = "";
        const filtered = allEvents.filter(e => {
            const d = new Date(e.event_date);
            return d.getFullYear() === y && d.getMonth() === m;
        }).sort((a,b) => new Date(a.event_date) - new Date(b.event_date));

        if(filtered.length === 0) { list.innerHTML = "<div class='small muted'>No events</div>"; return; }
        filtered.forEach(e => {
            const item = document.createElement('div');
            item.className = "mb-2 p-2 rounded";
            item.style.background = "rgba(255,255,255,0.05)";
            item.innerHTML = `<div class="small fw-bold" style="color:var(--accent)">${e.event_date}</div><div class="small">${e.title}</div>`;
            list.appendChild(item);
        });
    }

    renderCalendar(currentNavDate);
</script>
@endpush