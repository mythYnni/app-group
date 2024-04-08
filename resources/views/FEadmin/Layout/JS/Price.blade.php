<script>
    function formatCurrency(input, output) {
        const value = parseFloat(input.value);
        if (!isNaN(value)) {
            const formattedValue = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
            output.innerHTML = formattedValue;
            output.style.display = 'block';
        } else {
            output.style.display = 'none';
        }
    }

    const rentCostInput = document.getElementById('rent_cost');
    const rentCostOutput = document.getElementById('rent_cost_vnd');
    rentCostInput.addEventListener('input', () => formatCurrency(rentCostInput, rentCostOutput));

    const priceInput = document.getElementById('price');
    const priceOutput = document.getElementById('price_vnd');
    priceInput.addEventListener('input', () => formatCurrency(priceInput, priceOutput));
</script>