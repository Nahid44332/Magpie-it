@extends('backend.master')
@section('content')
      <!-- KPI Cards -->
        <div class="cards-row mt-5" data-aos="fade-up">
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="muted">Save Products</div>
                        <div class="kpi">50.8K <span
                                style="color:#2ecc71;font-size:13px;font-weight:600;margin-left:8px">+28.4%</span></div>
                        <div class="kpi-sub muted">since last week</div>
                    </div>
                    <div class="icon-round"><i class="bi bi-heart-fill" style="color:var(--accent)"></i></div>
                </div>
            </div>
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="muted">Stock Products</div>
                        <div class="kpi">23.6K <span
                                style="color:#e74c3c;font-size:13px;font-weight:600;margin-left:8px">-12.6%</span></div>
                        <div class="kpi-sub muted">current stock</div>
                    </div>
                    <div class="icon-round"><i class="bi bi-bag-fill" style="color:#9ad0ff"></i></div>
                </div>
            </div>
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="muted">Sale Products</div>
                        <div class="kpi">756 <span
                                style="color:#2ecc71;font-size:13px;font-weight:600;margin-left:8px">+3.1%</span></div>
                        <div class="kpi-sub muted">monthly sales</div>
                    </div>
                    <div class="icon-round"><i class="bi bi-cart-fill" style="color:#9ad0ff"></i></div>
                </div>
            </div>
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="muted">Average Revenue</div>
                        <div class="kpi">2.3K <span
                                style="color:#2ecc71;font-size:13px;font-weight:600;margin-left:8px">+11.3%</span></div>
                        <div class="kpi-sub muted">per user</div>
                    </div>
                    <div class="icon-round"><i class="bi bi-cash-stack" style="color:#9ad0ff"></i></div>
                </div>
            </div>
        </div>

        <!-- Charts Panels -->
        <div class="panels" data-aos="fade-up">
            <div class="panel">
                <h5>Website Visitors</h5>
                <div class="donut-wrap d-flex">
                    <div style="width:280px">
                        <canvas id="donutChart"></canvas>
                    </div>
                    <div style="flex:1;padding-left:10px">
                        <div class="muted">Traffic Source</div>
                        <ul style="list-style:none;padding:0;margin-top:12px">
                            <li class="muted mb-2"><span
                                    style="display:inline-block;width:10px;height:10px;background:var(--accent);border-radius:50%;margin-right:8px"></span>
                                Organic <span class="float-end muted">80%</span></li>
                            <li class="muted mb-2"><span
                                    style="display:inline-block;width:10px;height:10px;background:#2bb7ff;border-radius:50%;margin-right:8px"></span>
                                Social <span class="float-end muted">60%</span></li>
                            <li class="muted mb-2"><span
                                    style="display:inline-block;width:10px;height:10px;background:#22c1c3;border-radius:50%;margin-right:8px"></span>
                                Direct <span class="float-end muted">50%</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h5>Revenue by customer type</h5>
                        <div style="font-size:20px;font-weight:700;color:#fff">$240.8K <span
                                style="color:#2ecc71;font-size:13px;font-weight:600;margin-left:8px">+14.8%</span></div>
                    </div>
                    <div class="muted">Jan 2024</div>
                </div>
                <div style="height:300px"><canvas id="stackedBar"></canvas></div>
            </div>
        </div>

        <!-- Lower Grid: Products & Tasks -->
        <div class="lower-grid" data-aos="fade-up">
            <div class="panel">
                <h5>Products</h5>
                <div class="products-list">
                    <div class="product-item">
                        <img src="{{asset('backend/assets/img/Screenshot_5.png')}}" alt="iPhone 14 Pro Max" class="product-img">
                        <div>
                            <div style="font-weight:600">iPhone 14 Pro Max</div>
                            <div class="muted">524 in stock</div>
                        </div>
                        <div class="ms-auto muted">$1,099.00</div>
                    </div>
                    <div class="product-item">
                        <img src="{{asset('backend/assets/img/Screenshot_5.png')}}" alt="Apple Watch S8" class="product-img">
                        <div>
                            <div style="font-weight:600">Apple Watch S8</div>
                            <div class="muted">320 in stock</div>
                        </div>
                        <div class="ms-auto muted">$799.00</div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <h5>Completed tasks over time</h5>
                <div class="d-flex gap-3 align-items-center mb-2">
                    <div style="font-size:28px;font-weight:700">257</div>
                    <div class="muted">
                        <span
                            style="background:#28a745;color:#fff;padding:4px 8px;border-radius:8px;font-weight:600">+16.8%</span>
                        this month
                    </div>
                </div>
                <div style="height:150px"><canvas id="lineChart"></canvas></div>
            </div>
        </div>
        <!-- Orders Table -->
        <div class="orders" data-aos="fade-up">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5>Orders Status</h5>
                <button class="btn btn-outline-light btn-sm">View All</button>
            </div>
            <table class="table align-middle text-white mb-0">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Order</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Country</th>
                        <th class="text-end">Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"></td>
                        <td>#1532</td>
                        <td>
                            <div style="font-weight:600">John Carter</div>
                            <div class="muted">hello@johncarter.com</div>
                        </td>
                        <td>Jan 30, 2024</td>
                        <td><span class="status-badge delivered">Delivered</span></td>
                        <td>United States</td>
                        <td class="text-end">$1,099.24</td>
                        <td class="text-end"><i class="bi bi-pencil me-2"></i><i class="bi bi-trash"></i></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"></td>
                        <td>#1531</td>
                        <td>
                            <div style="font-weight:600">Sophie Moore</div>
                            <div class="muted">contact@sophiemoore.com</div>
                        </td>
                        <td>Jan 27, 2024</td>
                        <td><span class="status-badge canceled">Canceled</span></td>
                        <td>United Kingdom</td>
                        <td class="text-end">$5,870.32</td>
                        <td class="text-end"><i class="bi bi-pencil me-2"></i><i class="bi bi-trash"></i></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"></td>
                        <td>#1530</td>
                        <td>
                            <div style="font-weight:600">Matt Cannon</div>
                            <div class="muted">info@mattcannon.com</div>
                        </td>
                        <td>Jan 24, 2024</td>
                        <td><span class="status-badge delivered">Delivered</span></td>
                        <td>Australia</td>
                        <td class="text-end">$13,899.48</td>
                        <td class="text-end"><i class="bi bi-pencil me-2"></i><i class="bi bi-trash"></i></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="row-checkbox"></td>
                        <td>#1529</td>
                        <td>
                            <div style="font-weight:600">Graham Hills</div>
                            <div class="muted">hi@grahamhills.com</div>
                        </td>
                        <td>Jan 21, 2024</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>India</td>
                        <td class="text-end">$1,569.12</td>
                        <td class="text-end"><i class="bi bi-pencil me-2"></i><i class="bi bi-trash"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection