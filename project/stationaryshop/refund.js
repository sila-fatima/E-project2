// =======================================
// REFUND FORM JAVASCRIPT
// =======================================

document.addEventListener("DOMContentLoaded", function () {

    // ===============================
    // Radio Card Active Effect
    // ===============================

    const radioButtons = document.querySelectorAll('input[name="return_method"]');

    radioButtons.forEach(function (radio) {

        radio.addEventListener("change", function () {

            document.querySelectorAll(".return-option").forEach(function (card) {
                card.classList.remove("active-return");
            });

            this.closest(".return-option").classList.add("active-return");

        });

    });

    // ===============================
    // Form Validation
    // ===============================

    const refundForm = document.querySelector("form");

    refundForm.addEventListener("submit", function (e) {

        const customerName = document.querySelector('[name="customer_name"]').value.trim();

        const orderID = document.querySelector('[name="order_id"]').value.trim();

        const returnReason = document.querySelector('[name="return_reason"]').value.trim();

        const refundType = document.querySelector('[name="refund_type"]').value;

        const returnMethod = document.querySelector('input[name="return_method"]:checked');

        // Empty Validation

        if (
            customerName === "" ||
            orderID === "" ||
            returnReason === "" ||
            refundType === "Select Refund Type" ||
            !returnMethod
        ) {

            e.preventDefault();

            alert("Please fill all required fields.");

            return;

        }

    });

}); 
