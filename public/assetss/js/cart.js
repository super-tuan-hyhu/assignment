document.addEventListener('DOMContentLoaded', (event) => {
    // Color selection
    document.querySelectorAll('.colors ul li a').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.colors ul li a').forEach(function(el) {
                el.classList.remove('active');
            });
            this.classList.add('active');
            document.getElementById('selected-color').value = this.dataset.color;
        });
    });

    // Size selection
    document.getElementById('selected-size').addEventListener('change', function() {
        document.getElementById('selected-size').value = this.value;
    });
});
