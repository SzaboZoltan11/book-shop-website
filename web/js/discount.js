const discountsContainer = document.getElementById('discounts')
fetch('/bookshop/web/api/discounts.php')
    .then(v => v.json())
    .then(discounts => {
        discountsContainer.innerHTML = `
            <select name="discount">
                <option value="">
                    Kupon
                </option>
                ${discounts.map(v => `
                    <option value="${v.id}">
                        ${v.discount}%
                    </option>
                `).join('')}
            </select>
        `
    })