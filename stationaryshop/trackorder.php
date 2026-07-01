<?php
include('navbar.php');
?>

<div class="container-lg py-5">
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <p class="section-label">Order tracking</p>
            <h2 class="mb-4" style="font-size: 36px;">Where is my package?</h2>
            
           <div class="mb-5">
    <!-- Search Bar -->
    <input type="text"
           class="form-control mb-3"
           id="orderIdInput"
           placeholder="e.g. IW-58219">

    <!-- Buttons -->
    <div class="d-flex gap-2 flex-wrap">
        <button class="btn btn-outline-secondary ">Track Order</button>
        <button class="btn btn-outline-secondary ">Track Order</button>
        <button class="btn btn-outline-secondary ">Track Order</button>
        <button class="btn btn-outline-secondary ">Track Order</button>
    </div>
</div>

            <div class="order-card mt-4" id="trackingResultBox">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 border-bottom pb-3 mb-4" style="border-color: var(--line) !important;">
                    <div>
                        <h5 class="mb-1">Order #IW-58219</h5>
                        <p class="text-muted small mb-0">Placed on: June 28, 2026</p>
                    </div>
                    <span class="badge" style="background-color: var(--gold); color: var(--plum);">In Transit</span>
                </div>

                <div class="status-timeline">
                    <div class="timeline-step active">
                        <div class="step-circle">✓</div>
                        <div class="step-label">Confirmed</div>
                    </div>
                    <div class="timeline-step active">
                        <div class="step-circle">✓</div>
                        <div class="step-label">Packed</div>
                    </div>
                    <div class="timeline-step active">
                        <div class="step-circle">🚚</div>
                        <div class="step-label">In Transit</div>
                    </div>
                    <div class="timeline-step">
                        <div class="step-circle">📦</div>
                        <div class="step-label">Delivered</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php include('footer.php'); ?>
</body>
</html>