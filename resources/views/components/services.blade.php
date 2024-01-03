<div class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Services</h6>
            <h1 class="display-5 text-uppercase mb-0">Our Excellent Pet Care Services</h1>
        </div>
        <div class="row g-5">
            @foreach($service as $key)
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4 services_box">
                        <i class="flaticon-house display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">{{ $key->service_name }}</h5>
                            <p>{!! $key->service_detail !!}</p>
                            <a class="text-primary text-uppercase" href="/services/{{$key->slug}}">Read More<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4 services_box">
                    <i class="flaticon-house display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">PET GROOMING</h5>
                        <p>WHY BATHE YOUR PETS? <br>
                            It is necessary, bathing your dog is an essential component of routine pet maintenance. The most frequent reasons to bathe a dog with healthy skin and a healthy coat are to get rid of an undesirable odor or to remove dirt buildup on their coat.</p>
                        <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4 services_box">
                    <i class="flaticon-food display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Pet Feeding</h5>
                        <p>Making the right choices requires an understanding of the procedures involved in feeding a dog correctly. The amount of pet food might vary from bag to bag, so if you're unsure of how much to feed, using a dog feeding guide can help you figure it out.</p>
                        <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4 services_box">
                    <i class="flaticon-grooming display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Pet Boarding</h5>
                        <p>What is PET BOARDING? <br> 

What exactly is dog boarding? Fundamentally, it involves boarding your dog or cat for a night or longer at a facility away from home. The clinic offers this kind of services for the comfort of pet parents who wants to make sure their pets are well taking good care at while they’re away for a vacation or at work. </p>
                        <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4 services_box">
                    <i class="flaticon-cat display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Pet Training</h5>
                        <p>Training is an essential part of owning a PET and can be started at any age.  Training boosts self-assurance, stimulates the mind, and deepens the link between people and animals. Dogs never stop learning. Training can be started at any time.  </p>
                        <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4">
                    <i class="flaticon-dog display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Pet Exercise</h5>
                        <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                        <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-6">
                <div class="service-item bg-light d-flex p-4 services_box">
                    <i class="flaticon-vaccine display-1 text-primary me-4"></i>
                    <div>
                        <h5 class="text-uppercase mb-3">Pet Health</h5>
                        <p>The health of your pet and family depends on you giving regular, lifelong veterinary care, regardless of whether you own a dog, OR A CAT. A healthy pet requires frequent veterinary appointments. See your pet's veterinarian for advice on how to maintain your pet's health. Give your pet a healthy diet, clean bedding, fresh water, and lots of exercise. Maintain the vaccination, deworming, and flea and tick prevention schedule for your pet.</p>
                        <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>