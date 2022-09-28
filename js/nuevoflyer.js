var $ = jQuery.noConflict();
function noBand() {
    $('#banda').replaceWith('<input type="text" name="banda" id="banda" size="30" />');
    document.getElementById('bandnotlisted').style.display = "none";
}
const algo = document.querySelector("#file");
let label = document.querySelector("label[for='file']");
algo.addEventListener('change', (event) => {
    label.innerText = algo.value.split(`C:\\fakepath\\`)[1];
});
$(document).ready(function () {
    $('#final').change(function () {
        if (!this.checked) 
            $('#fecha_final_field').fadeOut('slow');
        else 
            $('#fecha_final_field').fadeIn('slow');
            $('#fecha_final').prop("disabled", false);
    });
});