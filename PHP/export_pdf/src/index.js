import { exportToPDF } from "./exportToPDF";
import { exportToSpreadsheet } from "./exportToXLSX";


$("#save").on('click', ()=>{
    let id = $('#id').html();
    let name = $('#name').val();
    let description = $('#description').val();
    $.ajax({
        type: "POST",
        url: window.location.origin + window.location.pathname,
        data: {id, name, description},
        success: (html)=>{
            window.location.replace(window.location.origin + window.location.pathname);
        }
    });
    return false;
})

$("#export_excel").on('click', ()=>{
  fetch('http://students.yss.su/PSTGU/2019/gritskova/2021/export_pdf/api/list.php')
    .then(resp => resp.json())
    .then(json => exportToSpreadsheet(json.data, 'Table_by_Kseniya'))
})



$("#export_pdf").on('click', ()=>{
  fetch('http://students.yss.su/PSTGU/2019/gritskova/2021/export_pdf/api/list.php')
    .then(resp => resp.json())
    .then(json => exportToPDF(json.data, 'Table_by_Kseniya'))
  })



