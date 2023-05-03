<div class="container-fluid bg-image" style="margin: 90px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Why Choose Us?</h6>
                        <h1 class="display-4">{{@$page->sec_title}}</h1>
                    </div>
                    <p class="mb-4 pb-2">{{@$page->sec_dec}}.</p>

                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-warning mr-4">
                            <image src="{{@$page->icon1}}" ></image>
                        </div>
                        <div class="mt-n1">
                            <h4>{{@$page->icon1_title}}</h4>
                            <p class="m-0">{{@$page->icon1_dec}}.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-warning mr-4">
                            <image src="{{@$page->icon2}}" ></image>
                        </div>
                        <div class="mt-n1">
                            <h4>{{@$page->icon2_title}}</h4>
                            <p class="m-0">{{@$page->icon2_dec}}.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-warning mr-4">
                            <image src="{{@$page->icon3}}" ></image>
                        </div>
                        <div class="mt-n1">
                            <h4>{{@$page->icon3_title}}</h4>
                            <p class="m-0">{{@$page->icon3_dec}}.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{@$page->sec_image}}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>