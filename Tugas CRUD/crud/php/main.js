
let id = $("input[name*='id_karyawan']")
id.attr("readonly","readonly");

$(".btnedit").click(e=>{
    let textvalues = displayData(e);

    ;
    let namakaryawan = $("input[name*='nama_karyawan']");
    let divisi = $("input[name*='divisi']");
    let umur = $("input[name*='umur']");

    id.val(textvalues[0]);
    namakaryawan.val(textvalues[1]);
    divisi.val(textvalues[2]);
    umur.val(textvalues[3]);
})


function displayData(e) {
    let id =0;
    const td =$("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id_karyawan == e.target.dataset.id_karyawan){
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}

