@if(\App\Models\Service::where('status', 1)->count() > 0)

<section class="border-top pt-3 projects" style="background-color:rgba(224, 253, 255, 0.2);">
  <div class="container px-4 mt-2">
      <div class="row mb-2">
          <div class="col-12 text-center">
              <h1 class="sectitle pb-2 text-uppercase sinking-bold fw-bold">We Offer Services</h1>
          </div>
      </div>
      
      <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
        @foreach (\App\Models\Service::where('status', 1)->latest()->limit(9)->get() as $data)
          <div class="feature col">
            <div class="project-box shadow-sm">
              <a href="javascript:void(0);" 
                 class="project-link"
                 data-title="{{ $data->title }}"
                 data-description="{{ $data->description }}"
                 data-image="{{ asset($data->image) }}"
                 style="text-decoration: none;">
                 
                <div class="photo" style="height: 200px; overflow: hidden;">
                  <img src="{{ asset($data->image) }}" 
                       class="img-fluid w-100 h-100" 
                       style="object-fit: cover;">
                  <div class="bottomInfo">
                    <div><span class="iconify" data-icon="clarity:map-marker-solid"></span></div>
                    <div><span class="iconify" data-icon="ant-design:camera-filled"></span></div>
                  </div>
                </div>
                
                <h4 class="title mb-0 py-4">{{ $data->title }}</h4>
              </a>
            </div>
          </div>
        @endforeach
      </div>
  </div>
</section>

<div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0">
      <div class="modal-header border-0">
        <h5 id="modalTitle" class="modal-title fw-bold text-dark"></h5>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <img id="modalImage" class="img-fluid rounded mb-3" style="width: 100%; height: 300px; object-fit: cover;">
        <div id="modalDesc" style="max-height: 400px; overflow-y: auto;"></div>
      </div>
    </div>
  </div>
</div>

<script>
  window.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.project-link');
    links.forEach(function (link) {
      link.onclick = function (e) {
        e.preventDefault();

        const title = this.getAttribute('data-title');
        const desc = this.getAttribute('data-description');
        const image = this.getAttribute('data-image');

        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalDesc').innerHTML = desc;
        document.getElementById('modalImage').setAttribute('src', image);

        const modal = new bootstrap.Modal(document.getElementById('serviceModal'));
        modal.show();
      };
    });
  });
</script>

@endif