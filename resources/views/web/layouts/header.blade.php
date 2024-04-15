{{ Widget::run('menuHeader') }}
<script>
    function showBrandFilter(brandId) {
        window.location.href = '/filter?brand=' + brandId;
    }
</script>
