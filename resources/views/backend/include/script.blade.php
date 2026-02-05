<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({duration:700, once:true});

// User dropdown
const userMenu = document.querySelector('.user-menu');
const userTrigger = userMenu.querySelector('.user-trigger');
userTrigger.addEventListener('click', ()=>userMenu.classList.toggle('active'));
document.addEventListener('click', e => { if(!userMenu.contains(e.target)) userMenu.classList.remove('active'); });

// Language switch
const langBtn = document.getElementById('langSwitch');
let currentLang = 'EN';
langBtn.addEventListener('click', () => { currentLang = currentLang==='EN'?'BN':'EN'; langBtn.textContent=currentLang; });

// Mobile sidebar toggle
const sidebar = document.querySelector('.sidebar');
const toggleBtn = document.querySelector('.mobile-sidebar-toggle');
const overlay = document.querySelector('.overlay');

toggleBtn.addEventListener('click', e=>{
  e.stopPropagation();
  sidebar.classList.toggle('show');
  overlay.classList.toggle('show');
});

// Click overlay closes sidebar
overlay.addEventListener('click', ()=>{
  sidebar.classList.remove('show');
  overlay.classList.remove('show');
});

// Prevent sidebar click from closing
sidebar.addEventListener('click', e=>e.stopPropagation());

// Ensure sidebar reset on resize
window.addEventListener('resize', ()=>{
  if(window.innerWidth > 768){
    sidebar.classList.remove('show');
    overlay.classList.remove('show');
  }
});
AOS.init({duration:700, once:true});

    // ===== Donut Chart =====
    new Chart(document.getElementById('donutChart').getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: ['Organic', 'Social', 'Direct'],
        datasets: [{ data: [60,25,15], backgroundColor:['#6c63ff','#2bb7ff','#22c1c3'], borderWidth:0, hoverOffset:6 }]
      },
      options:{ cutout:'70%', plugins:{legend:{display:false}, tooltip:{mode:'index', intersect:false}} }
    });
     // ===== Stacked Bar Chart =====
    new Chart(document.getElementById('stackedBar').getContext('2d'), {
      type:'bar',
      data:{
        labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets:[
          {label:'Current clients', data:[20,30,25,28,22,35,10,40,25,30,28,35], backgroundColor:'#6c63ff'},
          {label:'Subscribers', data:[10,15,20,18,12,18,8,22,15,18,14,20], backgroundColor:'#2bb7ff'},
          {label:'New customers', data:[5,8,12,6,10,12,4,18,8,12,11,15], backgroundColor:'#22c1c3'}
        ]
      },
      options:{
        plugins:{legend:{position:'top', labels:{color:'#cbd7ee'}}},
        scales:{ x:{stacked:true, ticks:{color:'#9fb0d0'}, grid:{display:false}}, y:{stacked:true, ticks:{color:'#9fb0d0'}, grid:{color:'rgba(255,255,255,0.03)'}} },
        responsive:true, maintainAspectRatio:false
      }
    });
      // ===== Line Chart =====
    new Chart(document.getElementById('lineChart').getContext('2d'), {
      type:'line',
      data:{
        labels:['Jan1','Jan8','Jan16','Jan24','Jan31','Feb1','Feb8','Feb16','Feb24'],
        datasets:[{ label:'Completed', data:[10,100,120,280,95,200,160,200,140], borderColor:'#2bb7ff', backgroundColor:'rgba(43,183,255,0.12)', tension:0.35, pointRadius:3, fill:true }]
      },
      options:{ plugins:{legend:{display:false}}, scales:{x:{ticks:{color:'#9fb0d0'}, grid:{display:false}}, y:{ticks:{color:'#9fb0d0'}, grid:{color:'rgba(255,255,255,0.03)'}}}, maintainAspectRatio:false }
    });
// ===== Checkbox row selection =====
    const selectAll = document.getElementById("selectAll");
    const checkboxes = document.querySelectorAll(".row-checkbox");

    function updateRowHighlight(checkbox){
      const row = checkbox.closest("tr");
      row.classList.toggle("selected-row", checkbox.checked);
    }

    checkboxes.forEach(chk => chk.addEventListener("change", () => {
      updateRowHighlight(chk);
      selectAll.checked = [...checkboxes].every(c=>c.checked);
    }));
 selectAll.addEventListener("change", () => {
      checkboxes.forEach(chk => { chk.checked = selectAll.checked; updateRowHighlight(chk); });
    });
    
</script>