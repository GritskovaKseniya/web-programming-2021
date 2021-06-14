
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

const fileType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
// Desired file extesion
const fileExtension = '.xlsx';

const exportToSpreadsheet = (data, fileName) => {
  //Create a new Work Sheet using the data stored in an Array of Arrays.
  const workSheet = XLSX.utils.aoa_to_sheet(data);
  // Generate a Work Book containing the above sheet.
  const workBook = {
    Sheets: { data: workSheet, cols: [] },
    SheetNames: ["data"],
  };
  // Exporting the file with the desired name and extension.
  const excelBuffer = XLSX.write(workBook, { bookType: "xlsx", type: "array" });
  const fileData = new Blob([excelBuffer], { type: fileType });
  saveAs(fileData, fileName + fileExtension);
}

$("#export_excel").on('click', ()=>{
  fetch('http://students.yss.su/PSTGU/2019/gritskova/2021/2021.02.15/api/list.php')
    .then(resp => resp.json())
    .then(json => exportToSpreadsheet(json.data, 'Table_by_Kseniya'))
})




