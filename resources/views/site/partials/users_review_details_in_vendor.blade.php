@foreach ($users_review_details as $review )
<div class="card d-flex flex-row special-card border-0 my-3">
    <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />

    <div class="card-body d-flex flex-column justify-content-between">
        <div>
            <h5> {{ $review->product->name }} </h5>

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

            <p>
                {{ $review->comments }}
            </p>
        </div>

        <div class="d-flex justify-content-between det-element">
            <p class="date">
                {{
                    $review->product->created_at ? $review->product->created_at->format('Y-m-d') : '--' }}  {{ $review->user->firstName . ' ' . $review->user->lastName }}
            </p>

            <p class="text-success">
                <i class="far fa-check-circle"></i>
                طلبية مؤكدة
            </p>
        </div>
    </div>
</div>
@endforeach
