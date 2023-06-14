@foreach ($users_review_details as $review )

<div class=" d-flex flex-wrap d-flex review my-4 justify-content-center text-start  ">

    <div class="col-3 col-md-1 d-flex justify-content-center align-items-center mr-3">
        <img src="{{ asset('website_assets/imgs/productdetails/gir.jpg') }}" alt class="rounded-circle review-image">
    </div>
    <div class="col-12 col-md-7 px-3 align-content-center align-content-md-start">
        <div class="review-customer-name py-2 ">{{ $review->user->firstName . '
            ' .
            $review->user->lastName }}</div>

        <div class="text-success">
            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->star_rating)
                <i class="fa-solid fa-star"></i>
                @elseif ($i - 0.5 === $review->star_rating)
                <i class="fa-solid fa-star-half-stroke flip"></i>
                @else
                <i class="fa-regular fa-star"></i>
                @endif
                @endfor
        </div>

        <div class="review-customer-review py-1"> {{ $review->comments }}
        </div>
        <div class="review-date text-muted text-xsmall">{{
            $review->created_at ? $review->created_at->format('Y-m-d') : '--' }}</div>
    </div>
    <div class="col-12 col-md d-flex justify-content-end align-items-end">
        <div class="review-customer-name text-success ">
            <i class="fa-solid fa-circle-check "></i>
            طلبية مؤكدة
        </div>
    </div>
</div>

@endforeach
