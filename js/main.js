(function () {
    var i, btnElements = document.getElementsByClassName('btn-installment');

    for (i = 0; i < btnElements.length; i++) {
        btnElements[i].addEventListener('click', handleClick);
    }

    function handleClick() {
        var method = 'GET',
            url = '/get-form-data.php',
            company = this.getAttribute('data-company'),
            params = {
                company: company,
                id: store.product.id,
                name: store.product.name,
                price: store.product.price,
                category: store.product.category
            };

        $.ajax({
            method: method,
            url: url,
            data: params,
            success: function (response) {
                $(response).appendTo('body').submit();
            },
            error: function () {
                alert('error');
            }
        })
    }
})();