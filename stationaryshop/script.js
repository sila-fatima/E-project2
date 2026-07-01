  // Cart Toggle Logic (Preserved)
        function toggleCart() {
            const drawer = document.getElementById('cartDrawer');
            const overlay = document.getElementById('drawerOverlay');
            drawer.classList.toggle('open');
            overlay.classList.toggle('open');
        }
    function increaseQty(btn) {
        const group = btn.closest('.qty-group');
        const textInput = group.querySelector('.qty-input');
        const hiddenInput = group.closest('form').querySelector('.proqty-hidden');
 
        let qty = parseInt(textInput.value, 10) || 1;
        qty += 1;
 
        textInput.value = qty;
        hiddenInput.value = qty;
    }
 
    function decreaseQty(btn) {
        const group = btn.closest('.qty-group');
        const textInput = group.querySelector('.qty-input');
        const hiddenInput = group.closest('form').querySelector('.proqty-hidden');
 
        let qty = parseInt(textInput.value, 10) || 1;
        if (qty > 1) {
            qty -= 1;
        }
 
        textInput.value = qty;
        hiddenInput.value = qty;
    }