<div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="deal" style="background-image: url('{{ asset($popup_model->image) }}')">
                    <div class="deal-top">
                        <h2 class="text-brand">{{ $popup_model->title }}</h2>
                        <h5>{{ $popup_model->subtitle }}</h5>
                    </div>
                    <div class="deal-content">
                        <h6 class="product-title"><a href="shop-product-right.html">{{ $popup_model->details }}</a></h6>
                        <div class="product-price"><span class="new-price">${{ $popup_model->price }}</span></div>
                    </div>
                    <div class="deal-bottom">
                        <p>Hurry Up! Offer End In:</p>
                        <div class="deals-countdown" id="countdown">
                            <span class="countdown-section"><span id="days" class="countdown-amount hover-up"></span><span class="countdown-period"> days </span></span>
                            <span class="countdown-section"><span id="hours" class="countdown-amount hover-up"></span><span class="countdown-period"> hours </span></span>
                            <span class="countdown-section"><span id="minutes" class="countdown-amount hover-up"></span><span class="countdown-period"> mins </span></span>
                            <span class="countdown-section"><span id="seconds" class="countdown-amount hover-up"></span><span class="countdown-period"> sec </span></span>
                        </div>
{{--                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"><span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span></div>--}}
                        <a href="{{ $popup_model->offerLink }}" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the stored date from your PHP variable
        var offerEndDate = new Date('{{ $popup_model->offerTime }}');

        // Set the time to the end of the day
        offerEndDate.setHours(23, 59, 59, 999);

        var offerEndTime = offerEndDate.getTime();

        // Log the offer end date and time to the console for troubleshooting
        console.log('Offer End Date:', offerEndDate);
        console.log('Offer End Time:', offerEndTime);

        // Update the countdown every second
        var countdownInterval = setInterval(updateCountdown, 1000);

        function updateCountdown() {
            var now = new Date().getTime();
            var timeDifference = offerEndTime - now;

            // Log the current time, time difference, and calculated days, hours, minutes, and seconds
            console.log('Current Time:', now);
            console.log('Time Difference:', timeDifference);

            if (timeDifference <= 0) {
                // If the offer has expired, you can handle this accordingly
                clearInterval(countdownInterval);
                $('#onloadModal').modal('hide'); // Hide the modal using jQuery
            } else {
                // Calculate remaining days, hours, minutes, and seconds
                var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                // Update the countdown elements in the modal
                document.getElementById('days').innerText = days;
                document.getElementById('hours').innerText = hours;
                document.getElementById('minutes').innerText = minutes;
                document.getElementById('seconds').innerText = seconds;
            }
        }
    });

</script>





