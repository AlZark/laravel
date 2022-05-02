document.getElementById('filter_manufacturer_id').addEventListener('change', function (){
    let manufacturerId = this.value || this.options[this.selectedIndex].value
    window.location.href = window.location.href.split('?')[0] + '?manufacturerId=' + manufacturerId
})
