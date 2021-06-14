import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;



export const exportToPDF = (data, fileName) => {
  pdfMake.createPdf({
    content: [
      {
        table: {
          headerRows: 1,
          body: data
        }
      }
    ]
  }).download(fileName)
}