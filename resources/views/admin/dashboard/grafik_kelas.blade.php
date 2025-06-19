

<div class="col-sm-6 col-xl-3">
  <div class="card overflow-hidden rounded-2"> 
    <div class="card-body pt-3 p-4">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="ti ti-person"></i>
      </div>
        <h4 class="fw-semibold fs-4">Kelas</h4>
        <h6>
          @foreach($jml_kelas as $jml) 
            {{ $jml->jumlah }} 
          @endforeach
          </h6>
        <span class="text-success small pt-1 fw-bold">Pengajar</span>
        <div class="d-flex align-items-center justify-content-between"></div> 
    </div>
  </div>
</div>
  