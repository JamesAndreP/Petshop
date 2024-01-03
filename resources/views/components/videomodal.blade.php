<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Watch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    {{-- <iframe class="embed-responsive-item" src="{{url('/videos/dog.mp4')}}" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe> --}}
                        <video controls>
                            <source src="{{url('/videos/dog.mp4')}}" />
                        </video>
                </div>
            </div>
        </div>
    </div>
</div>