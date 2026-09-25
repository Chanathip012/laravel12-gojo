<x-weight>
    <div class="row">
        <!-- ฟอร์มเพิ่มข้อมูล -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white font-weight-bold">บันทึกน้ำหนัก</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success py-2">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('weights.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">วันที่</label>
                            <input type="date" name="recorded_at" class="form-control @error('recorded_at') is-invalid @enderror" value="{{ old('recorded_at', date('Y-m-d')) }}">
                            @error('recorded_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">น้ำหนัก (กิโลกรัม)</label>
                            <input type="number" step="0.1" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- กราฟ Google Chart และ รายการข้อมูล -->
        <div class="col-md-8 mb-4">
            <!-- Google Chart -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white font-weight-bold">กราฟแสดงการเปลี่ยนแปลงน้ำหนัก</div>
                <div class="card-body">
                    <div id="curve_chart" style="width: 100%; height: 300px"></div>
                </div>
            </div>

            <!-- ตารางแสดงและจัดการข้อมูล -->
            <div class="card shadow-sm">
                <div class="card-header bg-white font-weight-bold">ประวัติการบันทึก</div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th>น้ำหนัก (กก.)</th>
                                <th class="text-end">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($weights as $item)
                                <tr>
                                    <td>{{ $item->recorded_at }}</td>
                                    <td>{{ number_format($item->weight, 2) }}</td>
                                    <td class="text-end">
                                        <!-- ปุ่มแก้ไข (เปิด Modal) -->
                                        <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">แก้ไข</button>

                                        <!-- ปุ่มลบ -->
                                        <form action="{{ route('weights.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('ยืนยันการลบ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">ลบ</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal แก้ไขข้อมูล -->
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('weights.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">แก้ไขข้อมูล</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">วันที่</label>
                                                        <input type="date" name="recorded_at" class="form-control" value="{{ $item->recorded_at }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">น้ำหนัก (กิโลกรัม)</label>
                                                        <input type="number" step="0.1" name="weight" class="form-control" value="{{ $item->weight }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                    <button type="submit" class="btn btn-success">บันทึกการแก้ไข</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr><td colspan="3" class="text-center py-3 text-muted">ยังไม่มีข้อมูล</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Google Chart -->
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['วันที่', 'น้ำหนัก (กก.)'],
                @foreach($weights as $item)
                    ['{{ $item->recorded_at }}', {{ $item->weight }}],
                @endforeach
            ]);

            var options = {
                curveType: 'function',
                legend: { position: 'bottom' },
                chartArea: { width: '85%', height: '70%' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
        }
    </script>
</x-weight>